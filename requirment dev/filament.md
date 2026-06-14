# Requirement Filament Resource Bank Sampah

## 1. Tujuan

Dokumen ini menjadi acuan pembuatan seluruh resource admin menggunakan Filament untuk aplikasi Bank Sampah.

Kondisi project saat dokumen ini dibuat:

- model domain Bank Sampah sudah tersedia,
- migration utama sudah tersedia,
- seeder utama sudah tersedia,
- Filament **belum** terpasang di project ini,
- panel admin nantinya akan memakai Filament sebagai admin interface utama,
- tidak ada login user publik, hanya admin internal.

Scope tahap ini:

- install Filament lalu buat panel admin,
- generate resource memakai artisan,
- fokus pada resource, form, table, dan page yang memang dipakai,
- resource mengikuti struktur Filament 5,
- sebagian resource boleh memakai `infolist` bila memang dibutuhkan,
- theme admin memakai warna hijau yang sesuai dengan identitas Bank Sampah.

## 2. Panel Yang Akan Dipakai

Seluruh resource masuk ke panel `admin`.

Konfigurasi panel yang disarankan:

- panel id: `admin`
- panel path: `/admin`
- login panel: `/admin/login`
- dashboard panel: `/admin`

Lokasi provider yang disarankan:

- `app/Providers/Filament/AdminPanelProvider.php`

Implikasinya:

- semua resource otomatis berada di bawah panel `admin`,
- sidebar utama aplikasi berasal dari navigasi resource Filament,
- resource akan ditemukan otomatis lewat:
  - `app/Filament/Resources`
  - namespace `App\Filament\Resources`

## 3. Model Yang Akan Dibuatkan Resource

Model domain yang saat ini tersedia dan akan dibuatkan resource:

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
- `User`

Catatan:

- seluruh model domain selain `User` sudah dibuat untuk tabel domain project ini,
- seluruh model domain saat ini sudah memakai soft delete,
- `User` saat ini belum memakai `SoftDeletes` dan belum memakai trait audit,
- bila `UserResource` mau dibuat dengan `--soft-deletes`, maka model `User` dan migration `users` perlu disesuaikan dulu,
- bila tidak ingin mengubah `users`, maka `UserResource` dibuat tanpa asumsi soft delete.

## 4. Command Generate Resource

Semua command mengikuti preferensi:

- pakai `php artisan make:filament-resource`
- pakai `--generate`
- pakai `--soft-deletes` untuk model yang memang mendukung soft delete

Daftar command utama:

```bash
php artisan make:filament-resource Unit --generate --soft-deletes
php artisan make:filament-resource Kategori --generate --soft-deletes
php artisan make:filament-resource Barang --generate --soft-deletes
php artisan make:filament-resource Warga --generate --soft-deletes
php artisan make:filament-resource SetorHeader --generate --soft-deletes
php artisan make:filament-resource SetorDetail --generate --soft-deletes
php artisan make:filament-resource TarikSaldo --generate --soft-deletes
php artisan make:filament-resource BukuTransaksi --generate --soft-deletes
php artisan make:filament-resource Faq --generate --soft-deletes
php artisan make:filament-resource Artikel --generate --soft-deletes
php artisan make:filament-resource Profile --generate --soft-deletes
php artisan make:filament-resource Lokasi --generate --soft-deletes
```

Command untuk `User`:

```bash
php artisan make:filament-resource User --generate
```

Catatan:

- `User` sementara tidak dipaksa `--soft-deletes` sampai model dan tabel `users` benar-benar disesuaikan,
- seluruh command dijalankan langsung, bukan manual create file satu-satu,
- hasil generate Filament 5 boleh dirapikan setelah command selesai.

## 5. Standar Struktur Resource

Setelah command dijalankan, setiap resource akan dirapikan mengikuti pola umum seperti ini:

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages\CreateBarang;
use App\Filament\Resources\BarangResource\Pages\EditBarang;
use App\Filament\Resources\BarangResource\Pages\ListBarangs;
use App\Filament\Resources\BarangResource\Pages\ViewBarang;
use App\Models\Barang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-archive-box';

    protected static string|UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Barang';

    protected static ?string $modelLabel = 'Barang';

    protected static ?string $pluralModelLabel = 'Barang';

    public static function form(Schema $schema): Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return $table;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBarangs::route('/'),
            'create' => CreateBarang::route('/create'),
            'edit' => EditBarang::route('/{record}/edit'),
            'view' => ViewBarang::route('/{record}'),
        ];
    }
}
```

## 6. Properti Yang Wajib Ada di Semua Resource

Properti ini dipakai di semua resource:

```php
protected static ?string $model = ModelName::class;

protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

protected static string|UnitEnum|null $navigationGroup = 'Nama Group';

protected static ?string $navigationLabel = 'Label';

protected static ?string $modelLabel = 'Label';

protected static ?string $pluralModelLabel = 'Label';
```

Tambahan aturan:

- setiap resource wajib memakai icon yang berbeda,
- jangan pakai icon yang sama untuk semua resource,
- pemilihan icon tetap mengutamakan keterbacaan di sidebar.

## 7. Standar Page Yang Dipakai

Page default yang dipakai di sebagian besar resource:

- `List`
- `Create`
- `Edit`

Aturan khusus:

- `Barang` memakai `View` page,
- `SetorHeader` disarankan memakai `View` page,
- `Profile` boleh memakai `View` page karena cenderung singleton,
- `BukuTransaksi` tidak wajib punya `View` page kalau table sudah cukup,
- `User` default cukup `List`, `Create`, dan `Edit`.

Aturan infolist:

- `Barang` wajib memakai `infolist`,
- `SetorHeader` disarankan memakai `infolist`,
- `Profile` disarankan memakai `infolist` bila ada `View` page,
- resource lain default-nya tidak perlu `infolist` kecuali nanti ada kebutuhan tambahan.

## 8. Rekomendasi Navigation Group

Supaya sidebar panel `admin` rapi, resource dikelompokkan seperti ini:

### 8.1 Master Data

- `Unit`
- `Kategori`
- `Barang`
- `Warga`
- `Lokasi`

### 8.2 Transaksi

- `SetorHeader`
- `SetorDetail`
- `TarikSaldo`
- `BukuTransaksi`

### 8.3 Konten

- `Faq`
- `Artikel`
- `Profile`

### 8.4 Sistem

- `User`

## 9. Rekomendasi Label dan Icon Per Resource

| Model | Navigation Label | Model Label | Plural Model Label | Navigation Group | Navigation Icon |
| --- | --- | --- | --- | --- | --- |
| `Unit` | `Unit` | `Unit` | `Unit` | `Master Data` | `heroicon-o-scale` |
| `Kategori` | `Kategori` | `Kategori` | `Kategori` | `Master Data` | `heroicon-o-squares-2x2` |
| `Barang` | `Barang` | `Barang` | `Barang` | `Master Data` | `heroicon-o-archive-box` |
| `Warga` | `Warga` | `Warga` | `Warga` | `Master Data` | `heroicon-o-user-group` |
| `Lokasi` | `Lokasi` | `Lokasi` | `Lokasi` | `Master Data` | `heroicon-o-map-pin` |
| `SetorHeader` | `Setor Sampah` | `Setor Sampah` | `Setor Sampah` | `Transaksi` | `heroicon-o-arrow-down-tray` |
| `SetorDetail` | `Detail Setor` | `Detail Setor` | `Detail Setor` | `Transaksi` | `heroicon-o-list-bullet` |
| `TarikSaldo` | `Tarik Saldo` | `Tarik Saldo` | `Tarik Saldo` | `Transaksi` | `heroicon-o-banknotes` |
| `BukuTransaksi` | `Buku Transaksi` | `Buku Transaksi` | `Buku Transaksi` | `Transaksi` | `heroicon-o-receipt-percent` |
| `Faq` | `FAQ` | `FAQ` | `FAQ` | `Konten` | `heroicon-o-question-mark-circle` |
| `Artikel` | `Artikel` | `Artikel` | `Artikel` | `Konten` | `heroicon-o-newspaper` |
| `Profile` | `Profile` | `Profile` | `Profile` | `Konten` | `heroicon-o-building-office-2` |
| `User` | `User` | `User` | `User` | `Sistem` | `heroicon-o-users` |

## 10. Standar Implementasi Tahap Berikutnya

Setelah command generate dijalankan, penyesuaian yang akan dilakukan:

- rapikan resource class agar konsisten dengan Filament 5,
- sesuaikan `navigationGroup`, `navigationLabel`, `modelLabel`, dan `pluralModelLabel`,
- pastikan setiap resource memakai icon berbeda,
- rapikan `form schema`,
- rapikan `table schema`,
- tambahkan `View` page + `infolist` khusus untuk `Barang`,
- tambahkan `View` page + `infolist` untuk `SetorHeader` dan `Profile` bila dibutuhkan,
- aktifkan query tanpa `SoftDeletingScope`,
- pertahankan dukungan soft delete pada table action dan filter,
- sesuaikan `UserResource` dengan kondisi model `User` yang aktual.

## 11. Standar Kolom Audit di Table

Semua table resource domain wajib menambahkan kolom audit berikut:

```php
TextColumn::make('createdBy.name')
    ->label('Dibuat Oleh')
    ->badge()
    ->description(fn ($record) => $record->created_at?->format('d M Y H:i'))
    ->sortable(),

TextColumn::make('updatedBy.name')
    ->label('Diubah Oleh')
    ->badge()
    ->description(fn ($record) => $record->updated_at?->format('d M Y H:i'))
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true),

TextColumn::make('deletedBy.name')
    ->label('Dihapus Oleh')
    ->badge()
    ->description(fn ($record) => $record->deleted_at?->format('d M Y H:i'))
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true),
```

Catatan:

- karena relasi audit berasal dari trait model, kolom ini mengandalkan method:
  - `createdBy`
  - `updatedBy`
  - `deletedBy`
- untuk `UserResource`, kolom audit hanya dipakai penuh bila model `User` juga sudah memakai trait audit.

## 12. Catatan Khusus Resource Tertentu

### 12.1 Barang

Resource `Barang` perlu:

- form untuk master data barang,
- table untuk listing barang,
- `View` page,
- `infolist` untuk menampilkan detail barang,
- relasi tampil yang nyaman ke `kategori` dan `unit`,
- field penting:
  - `kategori_id`
  - `unit_id`
  - `kode`
  - `nama`
  - `foto`
  - `harga`
  - `deskripsi`
  - `active`

### 12.2 Setor Header

Resource `SetorHeader` perlu:

- form transaksi setor,
- relasi ke `warga`,
- field:
  - `kode`
  - `tanggal_transaksi`
  - `total_harga`
  - `deskripsi`
- kemungkinan relation manager atau repeater untuk `setor_detail`.

### 12.3 Setor Detail

Resource `SetorDetail` perlu:

- relasi ke `setor_header`,
- relasi ke `barang`,
- field:
  - `jumlah`
  - `subtotal`

### 12.4 Tarik Saldo

Resource `TarikSaldo` perlu menampilkan:

- `warga`
- `total`
- `tanggal_transaksi`
- `deskripsi`
- `active`

### 12.5 Buku Transaksi

Resource `BukuTransaksi` perlu menampilkan:

- `ref_id`
- `ref_type`
- `warga`
- `tanggal_transaksi`
- `total_harga`
- `deskripsi`

### 12.6 Profile

Resource `Profile` perlu:

- form untuk profil utama lembaga,
- field upload untuk `logo`,
- field JSON untuk `kontak` dan `misi`,
- kemungkinan dibatasi hanya satu record aktif.

### 12.7 Artikel

Resource `Artikel` perlu:

- relasi ke `kategori`,
- field:
  - `judul`
  - `slug`
  - `konten`
  - `thumbnail`
  - `foto`
- upload image dan editor konten yang nyaman.

### 12.8 User

Resource `User` perlu menampilkan:

- `name`
- `email`
- `created_at`
- `updated_at`

Catatan:

- karena saat ini `User` belum soft delete, resource ini perlu diperlakukan terpisah,
- bila nanti `User` ingin ikut pola audit dan soft delete, model dan migration perlu diubah terlebih dahulu.

## 13. Catatan Teknis Filament 5

Agar sesuai dengan Filament 5:

- resource menggunakan `Filament\Schemas\Schema` untuk `form()` dan `infolist()` bila diperlukan,
- resource menggunakan `Filament\Tables\Table` untuk `table()`,
- page class mengikuti hasil generate Filament 5,
- jangan pakai pola lama Filament v3 atau v4 bila struktur class hasil generate berbeda.

## 14. Requirement Theme Admin via Filament Hook

Admin panel perlu memakai theme hijau yang sesuai dengan identitas Bank Sampah.

Pendekatan yang dipakai:

- custom style dimasukkan lewat Filament render hook,
- file hook view disimpan terpisah agar mudah dirawat,
- warna utama memakai hijau daun dan hijau tua,
- sidebar dan topbar perlu konsisten dengan tema Bank Sampah.

Lokasi file yang disarankan:

- `resources/views/filament/hooks/admin-theme.blade.php`

Provider panel akan meregister hook ke panel `admin`.

Contoh pendekatan hook di provider:

```php
use Filament\View\PanelsRenderHook;

$panel->renderHook(
    PanelsRenderHook::HEAD_END,
    fn (): string => view('filament.hooks.admin-theme')->render(),
);
```

## 15. CSS Theme Hijau yang Diinginkan

Berikut baseline theme yang perlu dipakai dan disesuaikan ke warna hijau:

```blade
<style>
    :root {
        --bank-hijau-900: #1f5a24;
        --bank-hijau-800: #2f7d32;
        --bank-hijau-700: #4caf50;
        --bank-hijau-100: #dff3e2;
    }

    .fi-topbar {
        background-image: linear-gradient(
            to right,
            var(--bank-hijau-800) 0,
            var(--bank-hijau-800) 20rem,
            #ffffff 20rem,
            #ffffff 100%
        );
    }

    .fi-topbar-start {
        color: #ffffff;
    }

    .fi-topbar .fi-icon-btn,
    .fi-topbar .fi-topbar-open-sidebar-btn,
    .fi-topbar .fi-topbar-close-sidebar-btn {
        color: #ffffff;
    }

    .fi-sidebar,
    .fi-sidebar-header-ctn,
    .fi-sidebar-header,
    .fi-sidebar-nav,
    .fi-sidebar-footer {
        background: var(--bank-hijau-800) !important;
    }

    .fi-sidebar-header-ctn {
        border-bottom-color: rgba(255, 255, 255, 0.08) !important;
    }

    .fi-sidebar-group-label,
    .fi-sidebar-item-label,
    .fi-sidebar-item-btn,
    .fi-sidebar-group-btn,
    .fi-sidebar-group-collapse-btn,
    .fi-sidebar-group-dropdown-trigger-btn,
    .fi-sidebar-item-icon,
    .fi-sidebar-group svg,
    .fi-sidebar-item svg,
    .fi-sidebar-open-collapse-sidebar-btn,
    .fi-sidebar-close-collapse-sidebar-btn {
        color: #ffffff !important;
        stroke: currentColor;
    }

    .fi-sidebar-group-btn,
    .fi-sidebar-item-btn,
    .fi-sidebar-group-dropdown-trigger-btn {
        border-radius: 0.9rem;
    }

    .fi-sidebar-item-btn:hover,
    .fi-sidebar-group-btn:hover,
    .fi-sidebar-group-dropdown-trigger-btn:hover,
    .fi-sidebar-item.fi-active .fi-sidebar-item-btn,
    .fi-sidebar-item.fi-sidebar-item-has-active-child-items .fi-sidebar-item-btn {
        background: rgba(255, 255, 255, 0.16) !important;
    }

    .fi-sidebar-group {
        border-color: rgba(255, 255, 255, 0.08);
    }

    .fi-sidebar-item-grouped-border,
    .fi-sidebar-item-grouped-border-part,
    .fi-sidebar-item-grouped-border-part-not-first,
    .fi-sidebar-item-grouped-border-part-not-last {
        background: rgba(255, 255, 255, 0.25) !important;
    }

    .fi-sidebar .fi-badge {
        background: rgba(255, 255, 255, 0.14) !important;
        color: #ffffff !important;
    }

    .fi-sidebar .fi-sidebar-item.fi-active .fi-badge,
    .fi-sidebar .fi-sidebar-item.fi-sidebar-item-has-active-child-items .fi-badge {
        background: rgba(255, 255, 255, 0.2) !important;
    }

    @media (max-width: 1024px) {
        .fi-topbar {
            background: #ffffff;
        }

        .fi-topbar-start,
        .fi-topbar .fi-icon-btn,
        .fi-topbar .fi-topbar-open-sidebar-btn,
        .fi-topbar .fi-topbar-close-sidebar-btn {
            color: inherit;
        }
    }
</style>
```

Catatan:

- struktur CSS mengikuti contoh yang kamu kasih,
- warna diubah dari oranye ke hijau,
- implementasinya wajib lewat Filament hook, bukan ditempel manual di layout acak.

## 16. Ringkasan Eksekusi

Tahap implementasi yang diinginkan:

1. install Filament 5 bila belum ada,
2. buat `AdminPanelProvider`,
3. register panel `admin`,
4. buat hook view untuk theme hijau,
5. register hook theme ke panel,
6. jalankan semua command `php artisan make:filament-resource ... --generate`,
7. aktifkan `--soft-deletes` untuk semua model domain yang sudah mendukungnya,
8. buat `UserResource` dengan perlakuan khusus sesuai kondisi model `User`,
9. rapikan semua resource sesuai aturan navigation, icon, soft delete, dan audit column,
10. tambahkan `View` dan `infolist` minimal untuk `Barang`.

---

Dokumen ini menjadi blueprint implementasi resource Filament 5 untuk aplikasi Bank Sampah pada panel `admin`, dengan theme hijau berbasis Filament hook dan resource yang disesuaikan dengan model yang saat ini sudah ada di project.
