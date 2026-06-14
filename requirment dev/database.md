# Requirement Database Bank Sampah

## 1. Gambaran Umum

Dokumen ini menjadi acuan awal untuk pembuatan model dan migration Laravel 13 untuk aplikasi website dan operasional Bank Sampah.

Struktur database pada dokumen ini disesuaikan dengan ERD yang kamu kirim, lalu dirapikan agar aman dipakai pada Laravel 13, Eloquent model, relasi data, dan kebutuhan admin panel.

Fokus utama sistem:

- master unit,
- master kategori,
- master barang,
- data warga,
- transaksi setor sampah,
- transaksi tarik saldo,
- buku transaksi,
- FAQ website,
- artikel edukasi,
- profile lembaga,
- lokasi bank sampah.

## 2. Konsep Database

### 2.1 Pola aplikasi

Struktur database ini cocok sebagai aplikasi **single-tenant**.

Artinya:

- satu instance aplikasi melayani satu organisasi Bank Sampah,
- belum ada `tenant_id`, `company_id`, atau multi-cabang kompleks,
- seluruh data operasional berada dalam satu ruang data yang sama.

Jika nanti dibutuhkan multi-cabang atau multi-lembaga, hampir semua tabel domain perlu tambahan kolom pemisah seperti:

- `tenant_id`,
- `branch_id`,
- `company_id`.

### 2.2 Pendekatan implementasi Laravel

Untuk implementasi Laravel 13, database ini sebaiknya dibagi ke 4 kelompok:

- tabel autentikasi: `users`,
- tabel master: `unit`, `kategori`, `barang`, `warga`,
- tabel transaksi: `setor_header`, `setor_detail`, `tarik_saldo`, `buku_transaksi`,
- tabel konten website: `faq`, `artikel`, `profile`, `lokasi`.

### 2.3 Pendekatan penamaan tabel

Karena kamu minta database mengikuti ERD yang sudah dibuat, dokumen ini mempertahankan nama tabel sesuai diagram:

- `unit`
- `kategori`
- `barang`
- `warga`
- `setor_header`
- `setor_detail`
- `tarik_saldo`
- `buku_transaksi`
- `faq`
- `artikel`
- `profile`
- `lokasi`

Catatan:

- ini berbeda dari gaya Laravel plural default,
- tetap aman dipakai selama `$table` pada model ditulis eksplisit,
- keuntungan pendekatan ini adalah sinkron dengan ERD dan lebih mudah dibaca oleh tim non-developer.

### 2.4 Base migration dan trait model

Project ini sudah memiliki trait yang sebaiknya dipakai untuk seluruh tabel domain operasional dan konten.

Trait migration:

- `App\Traits\BaseModelSoftDeleteDefault`

Isi field bawaan dari trait tersebut:

- `active` boolean default true
- `created_by` unsignedBigInteger default 1
- `updated_by` unsignedBigInteger nullable
- `deleted_by` unsignedBigInteger nullable
- `created_at`
- `updated_at`
- `deleted_at`

Pola migration:

```php
use App\Traits\BaseModelSoftDeleteDefault;

return new class extends Migration
{
    use BaseModelSoftDeleteDefault;

    public function up(): void
    {
        Schema::create('nama_tabel', function (Blueprint $table) {
            $table->id();
            // kolom domain
            $this->base($table);
        });
    }
};
```

Trait model:

- `App\Traits\AuditedBySoftDelete`

Standar model domain:

- model memakai `AuditedBySoftDelete`
- model memakai `SoftDeletes`
- model boleh memakai `HasFactory`
- model **jangan** memakai `fillable`
- model wajib memakai `protected $guarded = ['id'];`

Contoh pola model:

```php
use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NamaModel extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'nama_tabel';

    protected $guarded = ['id'];
}
```

Pengecualian:

- tabel `users` tidak wajib memakai `BaseModelSoftDeleteDefault`
- model `User` tidak wajib memakai `AuditedBySoftDelete`
- `users` boleh mengikuti struktur autentikasi standar Laravel 13

### 2.5 Catatan penting dari ERD

Beberapa hal dari ERD perlu ditetapkan secara eksplisit sebelum migration final:

- semua tabel pada ERD memakai `id` sebagai primary key dan ini sudah cocok untuk Laravel,
- `barang.kategori_id` dan `barang.unit_id` adalah foreign key utama pada master barang,
- `setor_header` dan `setor_detail` membentuk relasi transaksi setor 1:N,
- `buku_transaksi` memakai `ref_id` dan `ref_type`, sehingga secara konsep cocok dianggap sebagai referensi transaksi fleksibel,
- `profile.kontak` dan `profile.misi` sudah cocok sebagai JSON,
- kolom nominal yang di ERD memakai `DOUBLE` lebih aman di Laravel diarahkan ke `decimal(15,2)` atau `decimal(18,2)`.

Dokumen ini tetap menghormati struktur ERD, tetapi memberi rekomendasi teknis agar implementasi Laravel lebih stabil.

## 3. Daftar Tabel

## 3.1 Tabel `users`

Fungsi:
Menyimpan akun login admin atau operator sistem Bank Sampah.

Kolom utama:

- `id`
- `name` varchar(255)
- `email` varchar(255) unique
- `password` varchar(255)

Kolom bawaan Laravel yang tetap dipakai:

- `email_verified_at` nullable
- `remember_token` nullable
- `created_at`
- `updated_at`

Catatan:

- tabel ini tidak muncul di ERD, tetapi tetap wajib untuk panel admin Laravel,
- cukup gunakan struktur standar Laravel 13.

## 3.2 Tabel `unit`

Fungsi:
Master satuan barang atau sampah.

Kolom utama:

- `id`
- `nama` varchar(128)
- `deskripsi` text nullable

Relasi:

- satu `unit` memiliki banyak `barang`.

Catatan:

- contoh nilai unit: `kg`, `gram`, `pcs`, `karung`,
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `Unit` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.3 Tabel `kategori`

Fungsi:
Master kategori untuk barang atau konten yang memerlukan pengelompokan.

Kolom utama:

- `id`
- `nama` varchar(128)
- `type` varchar(128)
- `deskripsi` text nullable

Relasi:

- satu `kategori` memiliki banyak `barang`,
- satu `kategori` dapat memiliki banyak `artikel`.

Catatan:

- `type` bisa dipakai untuk membedakan kategori barang dan kategori artikel bila ingin satu tabel bersama,
- bila nanti ingin lebih bersih, kategori barang dan artikel bisa dipisah.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `Kategori` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.4 Tabel `barang`

Fungsi:
Menyimpan daftar barang atau sampah yang diterima oleh Bank Sampah.

Kolom utama:

- `id`
- `kategori_id` foreign key ke `kategori.id`
- `unit_id` foreign key ke `unit.id`
- `nama` varchar(255)
- `foto` varchar(255)
- `harga` decimal(15,2)
- `deskripsi` text nullable

Relasi:

- banyak `barang` dimiliki satu `kategori`,
- banyak `barang` dimiliki satu `unit`,
- satu `barang` dapat memiliki banyak `setor_detail`.

Catatan:

- ERD menulis `DOUBLE`, tetapi untuk uang atau harga lebih aman gunakan `decimal`,
- `foto` cukup simpan path file string.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `Barang` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.5 Tabel `warga`

Fungsi:
Menyimpan data nasabah atau anggota Bank Sampah.

Kolom utama:

- `id`
- `nama` varchar(255)
- `no_tlpn` varchar(18)
- `alamat` text nullable

Relasi:

- satu `warga` memiliki banyak `setor_header`,
- satu `warga` memiliki banyak `tarik_saldo`,
- satu `warga` memiliki banyak `buku_transaksi`.

Catatan:

- `no_tlpn` sebaiknya string agar nol di depan tidak hilang,
- nanti bisa ditambah `kode_warga`, `email`, atau `status` bila diperlukan.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `Warga` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.6 Tabel `setor_header`

Fungsi:
Menyimpan header transaksi setor sampah.

Kolom utama:

- `id`
- `warga_id` foreign key ke `warga.id`
- `kode` varchar(128)
- `tanggal_transaksi` date
- `total_harga` decimal(15,2)
- `deskripsi` text nullable

Relasi:

- banyak `setor_header` dimiliki satu `warga`,
- satu `setor_header` memiliki banyak `setor_detail`,
- satu `setor_header` dapat direferensikan oleh `buku_transaksi`.

Catatan:

- `kode` sebaiknya unique agar mudah dipakai sebagai nomor transaksi,
- `total_harga` bisa dihitung dari akumulasi `setor_detail.subtotal`.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `SetorHeader` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.7 Tabel `setor_detail`

Fungsi:
Menyimpan rincian item dari transaksi setor sampah.

Kolom utama:

- `id`
- `setor_header_id` foreign key ke `setor_header.id`
- `barang_id` foreign key ke `barang.id`
- `jumlah` integer
- `subtotal` decimal(15,2)

Relasi:

- banyak `setor_detail` dimiliki satu `setor_header`,
- banyak `setor_detail` dimiliki satu `barang`.

Catatan:

- `subtotal` umumnya hasil `jumlah x harga barang saat transaksi`,
- harga barang sebaiknya dibekukan ke subtotal transaksi, bukan selalu mengandalkan harga master terkini.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `SetorDetail` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.8 Tabel `tarik_saldo`

Fungsi:
Menyimpan transaksi penarikan saldo oleh warga.

Kolom utama:

- `id`
- `warga_id` foreign key ke `warga.id`
- `total` decimal(15,2)
- `tanggal_transaksi` date
- `deskripsi` text nullable

Relasi:

- banyak `tarik_saldo` dimiliki satu `warga`,
- satu `tarik_saldo` dapat direferensikan oleh `buku_transaksi`.

Catatan:

- bila nanti dibutuhkan approval, bisa tambah kolom `status`,
- pencatatan kas keluar akan lebih mudah bila sinkron dengan `buku_transaksi`.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `TarikSaldo` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.9 Tabel `buku_transaksi`

Fungsi:
Menyimpan mutasi atau buku besar transaksi warga.

Kolom utama:

- `id`
- `ref_id` unsignedBigInteger
- `ref_type` varchar(128)
- `tanggal_transaksi` date
- `warga_id` foreign key ke `warga.id`
- `total_harga` decimal(15,2)
- `deskripsi` text nullable

Relasi:

- banyak `buku_transaksi` dimiliki satu `warga`,
- `ref_id` dan `ref_type` mengarah ke sumber transaksi seperti `setor_header` atau `tarik_saldo`.

Catatan:

- struktur ini mirip pola polymorphic ringan,
- `ref_type` sebaiknya dibakukan, misalnya `setor` dan `tarik_saldo`,
- bila nanti butuh histori saldo yang sangat ketat, dapat ditambah kolom `jenis`, `debit`, `kredit`, dan `saldo_akhir`.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `BukuTransaksi` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.10 Tabel `faq`

Fungsi:
Menyimpan daftar pertanyaan umum dan jawabannya untuk website Bank Sampah.

Kolom utama:

- `id`
- `pertanyaan` varchar(255)
- `jawaban` text

Relasi:

- tabel ini berdiri sendiri.

Catatan:

- cocok dipakai pada homepage dan halaman FAQ,
- bisa ditambah `sort_order` atau `is_featured` bila nanti perlu pengurutan.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `Faq` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.11 Tabel `artikel`

Fungsi:
Menyimpan artikel edukasi, berita, atau konten kampanye lingkungan.

Kolom utama:

- `id`
- `kategori_id` foreign key ke `kategori.id`
- `judul` varchar(255)
- `slug` varchar(255) unique
- `konten` text
- `thumbnail` varchar(255)
- `foto` varchar(255)

Relasi:

- banyak `artikel` dimiliki satu `kategori`.

Catatan:

- `foto` bisa dipakai sebagai banner tambahan atau gambar isi,
- jika artikel punya banyak galeri, nanti lebih baik dibuat tabel child sendiri.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `Artikel` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.12 Tabel `profile`

Fungsi:
Menyimpan data profil utama organisasi Bank Sampah.

Kolom utama:

- `id`
- `logo` varchar(255)
- `nama` varchar(128)
- `alamat` varchar(255)
- `kontak` json
- `visi` varchar(255)
- `misi` json
- `deskripsi` text nullable

Relasi:

- tabel ini berdiri sendiri,
- secara aplikasi biasanya hanya memiliki satu record aktif.

Catatan:

- `kontak` cocok untuk menyimpan nomor telepon, WhatsApp, email, dan sosial media,
- `misi` cocok sebagai array daftar poin misi.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `Profile` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 3.13 Tabel `lokasi`

Fungsi:
Menyimpan titik atau daftar lokasi Bank Sampah.

Kolom utama:

- `id`
- `nama` varchar(128)
- `google_maps` text

Relasi:

- tabel ini berdiri sendiri.

Catatan:

- `google_maps` dapat berisi URL embed, share link, atau query maps,
- bila nanti diperlukan lebih detail, bisa ditambah `alamat`, `latitude`, dan `longitude`.
- tabel ini wajib memakai `BaseModelSoftDeleteDefault`,
- model `Lokasi` wajib memakai `AuditedBySoftDelete`, `SoftDeletes`, dan `protected $guarded = ['id'];`.

## 4. Ringkasan Relasi

Relasi utama database:

- `unit` 1:N `barang`
- `kategori` 1:N `barang`
- `kategori` 1:N `artikel`
- `warga` 1:N `setor_header`
- `setor_header` 1:N `setor_detail`
- `barang` 1:N `setor_detail`
- `warga` 1:N `tarik_saldo`
- `warga` 1:N `buku_transaksi`
- `buku_transaksi` mereferensikan transaksi sumber lewat `ref_id` dan `ref_type`
- `faq`, `profile`, dan `lokasi` berdiri sendiri

## 5. Konsep Alur Data

### 5.1 Master data

Admin mengelola:

- `unit`
- `kategori`
- `barang`
- `warga`
- `faq`
- `artikel`
- `profile`
- `lokasi`

### 5.2 Alur setor sampah

Alur dasar:

1. admin memilih atau membuat `warga`,
2. admin membuat `setor_header`,
3. admin menambahkan beberapa `setor_detail`,
4. sistem menghitung `subtotal` per item,
5. sistem menjumlahkan ke `setor_header.total_harga`,
6. sistem membuat catatan pada `buku_transaksi`.

### 5.3 Alur tarik saldo

Alur dasar:

1. admin memilih `warga`,
2. admin membuat transaksi `tarik_saldo`,
3. sistem mencatat pengurangan saldo pada `buku_transaksi`,
4. histori transaksi dapat ditampilkan per warga.

### 5.4 Alur konten website

Alur dasar:

1. admin mengisi `profile`,
2. admin mengisi `lokasi`,
3. admin menambah `faq`,
4. admin menambah `artikel`,
5. konten tampil di website publik.

## 6. Catatan Sinkronisasi Sebelum Buat Migration

Beberapa hal perlu dipastikan sebelum implementasi migration Laravel 13:

- apakah `kategori.type` akan dipakai untuk membedakan kategori `barang` dan `artikel`,
- apakah `foto` pada `artikel` memang gambar kedua selain `thumbnail`,
- apakah `lokasi` hanya satu titik utama atau bisa banyak cabang,
- apakah `buku_transaksi` perlu kolom saldo berjalan,
- apakah `tarik_saldo` memerlukan `status` approval,
- apakah `setor_header.kode` wajib unique,
- apakah nominal tetap ingin mengikuti `DOUBLE` dari ERD atau diganti `decimal`,
- pastikan semua tabel domain selain `users` memakai helper `$this->base($table)`,
- pastikan semua model domain selain `User` memakai `protected $guarded = ['id'];`.

## 7. Rekomendasi Implementasi Laravel 13

Agar konsisten saat masuk ke tahap migration dan model:

- gunakan nama model:
  - `User`
  - `Unit`
  - `Kategori`
  - `Barang`
  - `Warga`
  - `SetorHeader`
  - `SetorDetail`
  - `TarikSaldo`
  - `BukuTransaksi`
  - `Faq`
  - `Artikel`
  - `Profile`
  - `Lokasi`
- tulis `protected $table` eksplisit pada semua model domain yang memakai nama tabel ERD,
- `artikel.slug` harus unique,
- `setor_header.kode` sebaiknya unique,
- semua foreign key diberi index,
- field JSON seperti `profile.kontak` dan `profile.misi` diberi cast `array`,
- nilai uang disarankan memakai `decimal`, bukan `double`,
- upload path seperti `foto`, `thumbnail`, dan `logo` cukup simpan string path,
- semua migration tabel domain memakai `use BaseModelSoftDeleteDefault;`,
- semua model domain memakai `use AuditedBySoftDelete, HasFactory, SoftDeletes;`,
- semua model domain memakai `protected $guarded = ['id'];`.

## 8. Rekomendasi Struktur Model

### 8.1 Unit

Relasi:

- `hasMany(Barang::class)`

### 8.2 Kategori

Relasi:

- `hasMany(Barang::class)`
- `hasMany(Artikel::class)`

### 8.3 Barang

Relasi:

- `belongsTo(Kategori::class)`
- `belongsTo(Unit::class)`
- `hasMany(SetorDetail::class)`

### 8.4 Warga

Relasi:

- `hasMany(SetorHeader::class)`
- `hasMany(TarikSaldo::class)`
- `hasMany(BukuTransaksi::class)`

### 8.5 SetorHeader

Relasi:

- `belongsTo(Warga::class)`
- `hasMany(SetorDetail::class)`

### 8.6 SetorDetail

Relasi:

- `belongsTo(SetorHeader::class)`
- `belongsTo(Barang::class)`

### 8.7 TarikSaldo

Relasi:

- `belongsTo(Warga::class)`

### 8.8 BukuTransaksi

Relasi:

- `belongsTo(Warga::class)`

Catatan:

- relasi ke sumber transaksi dapat dibuat manual berdasarkan `ref_id` dan `ref_type`,
- bila nanti ingin lebih rapi, bisa dipertimbangkan morph relation.

### 8.9 Faq

Relasi:

- tidak ada relasi wajib

### 8.10 Artikel

Relasi:

- `belongsTo(Kategori::class)`

### 8.11 Profile

Cast yang disarankan:

- `kontak` => `array`
- `misi` => `array`

### 8.12 Lokasi

Relasi:

- tidak ada relasi wajib

## 9. Rekomendasi Urutan Migration

Urutan aman pembuatan migration:

1. `users`
2. `unit`
3. `kategori`
4. `warga`
5. `faq`
6. `profile`
7. `lokasi`
8. `barang`
9. `artikel`
10. `setor_header`
11. `setor_detail`
12. `tarik_saldo`
13. `buku_transaksi`

## 10. Kesimpulan

Blueprint database Bank Sampah saat ini berpusat pada domain operasional transaksi sampah dan warga, didukung oleh tabel master dan konten website.

Struktur inti mengikuti ERD yang kamu buat, yaitu:

- `unit`
- `kategori`
- `barang`
- `warga`
- `setor_header`
- `setor_detail`
- `tarik_saldo`
- `buku_transaksi`
- `faq`
- `artikel`
- `profile`
- `lokasi`

Untuk implementasi Laravel 13, penyesuaian teknis yang paling penting adalah:

- tetap memakai nama tabel sesuai ERD,
- menulis `$table` eksplisit di model,
- memakai trait audit dan soft delete bawaan project,
- mengubah nominal dari `DOUBLE` ke `decimal`,
- memberi cast `array` untuk field JSON.

Tahap berikutnya setelah dokumen ini adalah:

1. finalisasi keputusan field teknis yang belum pasti,
2. buat migration Laravel,
3. buat model Eloquent,
4. sambungkan relasi dan cast,
5. lanjut ke CRUD admin dan tampilan website publik.
