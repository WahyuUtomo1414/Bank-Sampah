# Requirement Integrasi Data Backend ke Blade

## 1. Tujuan

Dokumen ini menjadi acuan integrasi data dari:

- database,
- model Eloquent,
- controller Laravel,
- ke frontend Blade Bank Sampah.

Fokus utama dokumen ini adalah memastikan alur data tetap rapi, mudah dirawat, dan konsisten dengan arsitektur project yang sudah disusun.

## 2. Prinsip Utama

Project ini **tidak boleh menaruh logic PHP di Blade**.

Artinya:

- Blade tidak boleh berisi query database,
- Blade tidak boleh berisi `@php`,
- Blade tidak boleh berisi pemanggilan model langsung,
- Blade tidak boleh berisi perhitungan bisnis,
- Blade tidak boleh berisi transformasi data mentah dari database,
- Blade tidak boleh berisi mapping atau formatting data kompleks.

Blade hanya boleh dipakai untuk:

- render data yang sudah siap tampil,
- `@foreach`,
- `@if`,
- `@forelse`,
- `@include`,
- `@extends`,
- `@section`,
- pemanggilan component Blade,
- pemanggilan helper tampilan sederhana yang memang aman untuk view.

## 3. Aturan Wajib

### 3.1 Semua logic ada di controller

Semua kebutuhan data halaman wajib disiapkan di controller.

Controller bertanggung jawab untuk:

- mengambil data dari model,
- memfilter data,
- mengurutkan data,
- membatasi jumlah data,
- memilih data aktif saja,
- menggabungkan beberapa sumber data,
- membentuk struktur array yang siap dipakai view,
- menentukan fallback jika data kosong,
- mengirim data final ke Blade.

### 3.2 Blade hanya menerima data siap render

Setiap file Blade harus menerima data yang sudah final.

Contoh benar:

```php
return view('pages.home', [
    'profileSummary' => $profileSummary,
    'stats' => $stats,
    'jenisSampah' => $jenisSampah,
    'artikelTerbaru' => $artikelTerbaru,
]);
```

Contoh yang tidak boleh:

```blade
@php
    $artikel = \App\Models\Artikel::where('active', true)->latest()->get();
@endphp
```

### 3.3 Component Blade juga tidak boleh berisi logic bisnis

Blade component diperlakukan sebagai layer presentasi saja.

Component hanya menerima data dari page Blade atau langsung dari controller melalui page Blade.

Component tidak boleh:

- query ke model,
- menghitung struktur data,
- menentukan business rule,
- membentuk JSON atau array kompleks.

## 4. Alur Integrasi Yang Wajib Dipakai

Struktur alur data:

1. database menyimpan data mentah,
2. model Eloquent membaca data,
3. controller mengambil dan menyusun data,
4. controller mengirim data final ke page Blade,
5. page Blade membagi data ke component,
6. component hanya merender tampilan.

```text
Database
   ↓
Model
   ↓
Controller
   ↓
Page Blade
   ↓
Component Blade
```

## 5. Standar Data Yang Dikirim ke View

Data yang dikirim ke Blade harus:

- sudah diberi nama yang jelas,
- sudah sesuai kebutuhan section,
- tidak mengharuskan Blade membaca relasi mentah berulang-ulang,
- tidak mengharuskan Blade melakukan parsing JSON manual,
- tidak mengharuskan Blade menyusun ulang struktur list.

Contoh:

```php
$artikelTerbaru = Artikel::query()
    ->with('kategori')
    ->where('active', true)
    ->latest()
    ->limit(3)
    ->get()
    ->map(function (Artikel $artikel): array {
        return [
            'judul' => $artikel->judul,
            'slug' => $artikel->slug,
            'ringkasan' => str($artikel->konten)->stripTags()->limit(140)->toString(),
            'thumbnail' => $artikel->thumbnail,
            'kategori' => $artikel->kategori?->nama,
            'tanggal' => optional($artikel->created_at)?->format('d M Y'),
        ];
    })
    ->all();
```

Dengan pola ini, Blade tinggal render.

## 6. Aturan Khusus JSON / Cast Array

Beberapa field di project ini memakai JSON / cast array, misalnya:

- `profile.kontak`
- `profile.misi`

Aturan wajib:

- parsing dan penyesuaian struktur dilakukan di controller,
- Blade tidak boleh mengecek bentuk data mentah JSON,
- Blade tidak boleh membuat fallback struktur sendiri.

Contoh benar di controller:

```php
$profileSummary = [
    'nama' => $profile->nama,
    'alamat' => $profile->alamat,
    'visi' => $profile->visi,
    'misiItems' => $profile->misi ?? [],
    'kontak' => [
        'telepon' => $profile->kontak['telepon'] ?? null,
        'whatsapp' => $profile->kontak['whatsapp'] ?? null,
        'email' => $profile->kontak['email'] ?? null,
        'instagram' => $profile->kontak['instagram'] ?? null,
    ],
];
```

Contoh benar di Blade:

```blade
@foreach ($profileSummary['misiItems'] as $misiItem)
    <li>{{ $misiItem }}</li>
@endforeach
```

## 7. Pola Per Halaman

### 7.1 Home

`HomeController@index` menyiapkan:

- profile lembaga ringkas,
- counter statistik,
- daftar jenis sampah atau barang unggulan,
- daftar artikel terbaru,
- FAQ preview,
- lokasi singkat,
- CTA utama.

`resources/views/pages/home.blade.php` hanya:

- memanggil layout,
- memanggil component home,
- meneruskan data ke component.

### 7.2 Tentang Kami

`AboutController@index` menyiapkan:

- profile lembaga lengkap,
- visi,
- misi list,
- deskripsi lembaga,
- kontak singkat,
- section pendukung jika ada.

Blade hanya render data final tersebut.

### 7.3 Artikel

`ArtikelController@index` menyiapkan:

- daftar artikel aktif,
- kategori artikel jika dipakai,
- artikel unggulan bila dibutuhkan,
- data card artikel yang sudah siap tampil.

Blade tidak boleh menyusun ulang card artikel dari relasi mentah.

### 7.4 Detail Artikel

`ArtikelController@show` menyiapkan:

- detail artikel,
- kategori artikel,
- gambar utama,
- artikel terkait,
- CTA lanjutan jika dibutuhkan.

Semua struktur detail harus sudah final sebelum masuk Blade.

### 7.5 FAQ

`FaqController@index` menyiapkan:

- daftar FAQ aktif,
- CTA bantuan lanjutan bila dipakai.

Blade FAQ hanya render list dan CTA.

### 7.6 Lokasi

`LokasiController@index` menyiapkan:

- daftar lokasi aktif,
- link atau embed maps,
- panduan setor singkat jika dipakai.

Blade lokasi hanya render data yang sudah siap.

### 7.7 Kontak

`KontakController@index` menyiapkan:

- profile lembaga,
- telepon,
- WhatsApp,
- email,
- daftar lokasi bila dipakai,
- link maps bila dipakai.

Blade kontak hanya render form dan info kontak.

## 8. Aturan Query dan Relasi

Supaya performa tetap baik:

- controller wajib memakai eager loading jika butuh relasi,
- hindari query di dalam loop Blade,
- hindari akses relasi berulang tanpa `with()`,
- data list sebaiknya dibatasi sesuai kebutuhan halaman.

Contoh:

```php
$artikel = Artikel::query()
    ->with('kategori')
    ->where('active', true)
    ->latest()
    ->get();
```

## 9. Aturan Naming Data View

Nama variabel yang dikirim ke view harus:

- singkat,
- jelas,
- konsisten,
- sesuai nama section.

Contoh yang disarankan:

- `$profileSummary`
- `$profileDetail`
- `$stats`
- `$jenisSampah`
- `$artikelTerbaru`
- `$artikelDetail`
- `$artikelTerkait`
- `$faqs`
- `$lokasiList`
- `$contactInfo`

Hindari nama terlalu umum seperti:

- `$data`
- `$items`
- `$result`

kecuali memang scope-nya sangat kecil dan jelas.

## 10. Aturan Blade Page

Setiap page Blade sebaiknya hanya berisi:

```blade
@extends('layouts.public')

@section('content')
    @include('components.home.hero', ['hero' => $hero])
    @include('components.home.statistik-ringkas', ['stats' => $stats])
    @include('components.home.artikel-terbaru', ['artikelTerbaru' => $artikelTerbaru])
@endsection
```

Tidak boleh ada:

- query,
- transformasi array,
- generate slug,
- pengecekan struktur JSON rumit,
- formatting data bisnis.

## 11. Aturan Component Blade

Component Blade harus:

- fokus ke satu section,
- menerima data yang sudah siap,
- tidak memanggil model,
- tidak memproses struktur data besar.

Contoh benar:

```blade
@foreach ($artikelTerbaru as $artikel)
    @include('components.artikel.card', ['artikel' => $artikel])
@endforeach
```

Contoh yang tidak boleh:

```blade
@foreach (\App\Models\Artikel::all() as $artikel)
    ...
@endforeach
```

## 12. Rekomendasi Struktur Controller

Untuk menjaga controller tetap rapi, penyusunan data bisa dibagi ke private method.

Contoh:

```php
class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'profileSummary' => $this->getProfileSummary(),
            'stats' => $this->getStats(),
            'jenisSampah' => $this->getJenisSampah(),
            'artikelTerbaru' => $this->getArtikelTerbaru(),
        ]);
    }

    private function getProfileSummary(): array
    {
        // siapkan data final untuk view
    }
}
```

Jika nanti logic makin besar, pemindahan ke service class diperbolehkan.

## 13. Larangan Langsung di Blade

Berikut daftar yang tidak boleh ada di Blade:

- `@php`
- `App\Models\...`
- `DB::table(...)`
- `request()->...` untuk logic bisnis
- `collect(...)->map(...)` untuk membentuk data utama halaman
- `json_decode(...)`
- `Str::slug(...)`
- perhitungan business rule

## 14. Standar Akhir Implementasi

Standar final integrasi data Bank Sampah:

- model hanya mengelola relasi, cast, dan lifecycle model,
- controller menyiapkan seluruh data halaman,
- Blade page hanya menyusun layout dan include component,
- component Blade hanya merender UI,
- tidak ada PHP logic mentah di Blade,
- tidak ada query database di Blade,
- tidak ada parsing JSON mentah di Blade.

---

Dokumen ini menjadi aturan utama integrasi backend ke frontend Blade di Bank Sampah. Semua pengembangan halaman berikutnya wajib mengikuti pola ini agar project tetap bersih, konsisten, dan mudah dirawat.
