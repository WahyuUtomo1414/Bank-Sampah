# Arsitektur Website Bank Sampah

## Tujuan Dokumen

Dokumen ini menjelaskan struktur project Laravel 13 yang sedang dipakai, arah pengembangan website Bank Sampah dari backend ke frontend, dan aturan implementasi halaman berbasis layout dan component.

Dokumen ini disusun untuk kebutuhan project website Bank Sampah dengan karakter visual utama:

- tema warna hijau,
- nuansa ramah lingkungan,
- layout mobile-first,
- struktur yang siap dikembangkan ke halaman publik dan panel admin berbasis Filament.

## Konteks Project Saat Ini

Project saat ini masih berupa instalasi dasar Laravel 13 dengan struktur bawaan, namun sudah memiliki trait audit dan soft delete yang bisa dipakai untuk migration dan model domain.

Struktur penting yang sudah tersedia:

- Laravel 13
- route dasar di `routes/web.php`
- view awal di `resources/views/welcome.blade.php`
- trait `BaseModelSoftDeleteDefault`
- trait `AuditedBySoftDelete`

Catatan implementasi:

- tidak ada login user publik,
- hanya ada admin internal,
- panel admin tidak perlu dirancang manual di dokumen ini karena nanti memakai Filament.

## Struktur Folder Project Saat Ini

```text
Bank Sampah/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── Controller.php
│   ├── Models/
│   │   └── User.php
│   ├── Providers/
│   │   └── AppServiceProvider.php
│   └── Traits/
│       ├── AuditedBySoftDelete.php
│       └── BaseModelSoftDeleteDefault.php
├── bootstrap/
│   ├── app.php
│   ├── cache/
│   └── providers.php
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   ├── seeders/
│   └── database.sqlite
├── public/
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   └── views/
│       └── welcome.blade.php
├── routes/
│   ├── console.php
│   └── web.php
├── storage/
├── tests/
├── vendor/
├── .env
├── artisan
├── composer.json
├── package.json
└── vite.config.js
```

## Arah Pengembangan yang Disarankan

Project ini sebaiknya memakai pola:

- 1 controller = 1 domain halaman utama
- 1 halaman = kumpulan section/component
- `navbar` dan `footer` dibuat sebagai layout bersama
- semua page publik memakai tema hijau yang konsisten
- semua page dan component wajib dibangun dengan pendekatan mobile-first
- area publik dibuat sederhana dan fokus informatif
- kebutuhan admin diserahkan ke Filament

## Struktur Pengembangan yang Disarankan

```text
app/
└── Http/
    └── Controllers/
        ├── HomeController.php
        ├── AboutController.php
        ├── ArtikelController.php
        ├── FaqController.php
        ├── LokasiController.php
        └── KontakController.php

app/
└── Models/
    ├── User.php
    ├── Unit.php
    ├── Kategori.php
    ├── Barang.php
    ├── Warga.php
    ├── SetorHeader.php
    ├── SetorDetail.php
    ├── BukuTransaksi.php
    ├── TarikSaldo.php
    ├── Faq.php
    ├── Artikel.php
    ├── Profile.php
    └── Lokasi.php

resources/
└── views/
    ├── layouts/
    │   ├── app.blade.php
    │   └── public.blade.php
    ├── components/
    │   ├── layout/
    │   │   ├── navbar.blade.php
    │   │   └── footer.blade.php
    │   ├── common/
    │   │   ├── section-header.blade.php
    │   │   ├── button-primary.blade.php
    │   │   ├── button-secondary.blade.php
    │   │   ├── stat-card.blade.php
    │   │   ├── empty-state.blade.php
    │   │   └── badge-status.blade.php
    │   ├── home/
    │   ├── about/
    │   ├── artikel/
    │   ├── faq/
    │   ├── lokasi/
    │   └── kontak/
    ├── pages/
    │   ├── home.blade.php
    │   ├── about.blade.php
    │   ├── artikel/
    │   │   ├── index.blade.php
    │   │   └── show.blade.php
    │   ├── faq.blade.php
    │   ├── lokasi.blade.php
    │   └── kontak.blade.php
```

## Domain Halaman Website Publik

Website publik Bank Sampah sebaiknya fokus pada informasi, edukasi, dan konversi.

Halaman publik yang disarankan:

| Halaman | Route | Controller | Method |
|---|---|---|---|
| Home | `/` | `HomeController` | `index` |
| Tentang Kami | `/tentang-kami` | `AboutController` | `index` |
| Artikel | `/artikel` | `ArtikelController` | `index` |
| Detail Artikel | `/artikel/{slug}` | `ArtikelController` | `show` |
| FAQ | `/faq` | `FaqController` | `index` |
| Lokasi | `/lokasi` | `LokasiController` | `index` |
| Kontak | `/kontak` | `KontakController` | `index` |

## Mapping Controller ke Component Halaman Publik

### 1. HomeController

File page:

- `resources/views/pages/home.blade.php`

Component section:

- `components/home/hero.blade.php`
- `components/home/statistik-ringkas.blade.php`
- `components/home/layanan-bank-sampah.blade.php`
- `components/home/alur-setor.blade.php`
- `components/home/jenis-sampah.blade.php`
- `components/home/artikel-terbaru.blade.php`
- `components/home/faq-ringkas.blade.php`
- `components/home/lokasi-singkat.blade.php`
- `components/home/cta-daftar.blade.php`

Data backend yang ideal:

- profil singkat bank sampah
- statistik warga, transaksi, dan total sampah
- kategori atau jenis barang yang diterima
- artikel terbaru
- FAQ unggulan
- lokasi utama

### 2. AboutController

File page:

- `resources/views/pages/about.blade.php`

Component section:

- `components/about/hero.blade.php`
- `components/about/cerita.blade.php`
- `components/about/visi-misi.blade.php`
- `components/about/nilai-lingkungan.blade.php`
- `components/about/cta-relawan.blade.php`

Data backend yang ideal:

- nama lembaga
- deskripsi
- visi
- misi
- kontak singkat

### 3. ArtikelController@index

File page:

- `resources/views/pages/artikel/index.blade.php`

Component section:

- `components/artikel/hero.blade.php`
- `components/artikel/featured.blade.php`
- `components/artikel/grid.blade.php`
- `components/artikel/card.blade.php`
- `components/artikel/pagination.blade.php`

Data backend yang ideal:

- daftar artikel
- kategori artikel
- artikel unggulan
- metadata pagination

### 4. ArtikelController@show

File page:

- `resources/views/pages/artikel/show.blade.php`

Component section:

- `components/artikel/detail-hero.blade.php`
- `components/artikel/content.blade.php`
- `components/artikel/sidebar.blade.php`
- `components/artikel/related-post.blade.php`

Data backend yang ideal:

- judul
- slug
- konten
- thumbnail
- foto tambahan bila diperlukan
- artikel terkait

### 5. FaqController

File page:

- `resources/views/pages/faq.blade.php`

Component section:

- `components/faq/hero.blade.php`
- `components/faq/list.blade.php`
- `components/faq/contact-cta.blade.php`

Data backend yang ideal:

- list pertanyaan
- jawaban
- CTA bantuan lanjutan

### 6. LokasiController

File page:

- `resources/views/pages/lokasi.blade.php`

Component section:

- `components/lokasi/hero.blade.php`
- `components/lokasi/list.blade.php`
- `components/lokasi/map.blade.php`
- `components/lokasi/panduan.blade.php`

Data backend yang ideal:

- nama lokasi
- embed atau link Google Maps
- petunjuk setor

### 7. KontakController

File page:

- `resources/views/pages/kontak.blade.php`

Component section:

- `components/kontak/hero.blade.php`
- `components/kontak/info.blade.php`
- `components/kontak/form.blade.php`
- `components/kontak/map.blade.php`

Data backend yang ideal:

- alamat
- nomor telepon
- WhatsApp
- email
- lokasi

## Catatan Panel Admin

Panel admin tidak perlu dijelaskan detail di dokumen arsitektur ini karena implementasinya akan memakai Filament.

Fokus dokumen ini adalah:

- arsitektur website publik,
- struktur controller dan Blade untuk frontend,
- kesiapan integrasi data dari model Laravel ke tampilan website.

## Layout Global

### Layout Publik

File:

- `resources/views/layouts/public.blade.php`

Isi layout:

- `<head>` global
- loader font
- Vite assets
- warna tema hijau
- `navbar`
- slot content halaman
- `footer`
- script global

### Shared Components

Component global yang dipakai lintas halaman:

- `components/layout/navbar.blade.php`
- `components/layout/footer.blade.php`
- `components/common/button-primary.blade.php`
- `components/common/button-secondary.blade.php`
- `components/common/section-header.blade.php`
- `components/common/stat-card.blade.php`
- `components/common/badge-status.blade.php`

Catatan:

- CRUD admin, login admin, table admin, form admin, dan filter data akan ditangani oleh Filament,
- karena itu arsitektur Blade manual difokuskan ke frontend publik saja.

## Arah Visual dan Tema

Project ini sebaiknya memakai identitas visual hijau agar sesuai dengan tema Bank Sampah dan isu lingkungan.

Panduan visual:

- warna utama: hijau daun
- warna sekunder: hijau tua, hijau muda, krem, putih
- aksen: warna tanah atau kuning lembut untuk highlight data
- hindari nuansa neon yang terlalu agresif
- icon dan ilustrasi sebaiknya menekankan daur ulang, kebersihan, komunitas, dan edukasi

Contoh arah variable warna:

```css
:root {
  --color-primary: #2f7d32;
  --color-primary-dark: #1f5a24;
  --color-primary-soft: #e8f5e9;
  --color-accent: #8bc34a;
  --color-earth: #a1887f;
  --color-surface: #f7fbf7;
  --color-text: #16301b;
}
```

## Standar Mobile-First

Project ini wajib memakai pendekatan mobile-first pada level page dan component.

Aturan utamanya:

- tampilan default tanpa prefix breakpoint adalah tampilan mobile
- penyesuaian tablet dan desktop dilakukan dengan `md:`, `lg:`, dan `xl:`
- semua CTA utama harus tetap mudah diakses di layar kecil
- section statistik, card barang, artikel, dan FAQ harus aman tanpa horizontal scroll
- navbar publik wajib punya versi mobile menu yang jelas

Implikasi ke struktur Blade:

- page hanya menyusun component yang sudah mobile-ready
- jangan membuat default layout desktop lalu dipaksa turun ke mobile
- grid list mulai dari `grid-cols-1`
- spacing, ukuran font, dan alignment dimulai dari mobile lalu ditingkatkan bertahap

## Alur Backend ke Frontend

```text
Route
-> Controller
-> Service / Query / Model
-> Data array / view model
-> Blade page
-> Blade components per section
-> HTML + Tailwind CSS
```

Penjelasan:

- `routes/web.php` mendefinisikan route publik.
- controller fokus menyiapkan data, bukan menampung HTML besar.
- query yang mulai panjang sebaiknya dipindah ke service.
- Blade page hanya menyusun section.
- detail visual diletakkan di component.

## Aturan Implementasi

- Jangan taruh seluruh HTML halaman di satu file besar.
- Setiap section visual utama harus jadi component terpisah.
- Navbar dan footer wajib lewat layout global.
- Nama component mengikuti domain halaman.
- Data dummy awal boleh hardcoded, tetapi strukturnya harus siap diganti data database.
- Satu controller fokus pada satu tanggung jawab domain.
- Semua class visual default harus mengutamakan mobile.
- Semua halaman publik harus konsisten dengan tema hijau.
- Data dari tabel ERD harus mudah dipetakan ke modul admin dan halaman publik.

## Pemetaan Data ERD ke Fitur Website

| Tabel | Fungsi di Sistem | Potensi Tampilan |
|---|---|---|
| `profile` | identitas utama lembaga | home, tentang, footer |
| `lokasi` | titik lokasi bank sampah | halaman lokasi, kontak |
| `faq` | pertanyaan umum | halaman FAQ, section homepage |
| `artikel` | konten edukasi | list artikel dan detail artikel |
| `kategori` | klasifikasi barang atau artikel | filter master data dan artikel |
| `barang` | daftar sampah/barang diterima | halaman edukasi jenis sampah, sumber data Filament |
| `warga` | anggota atau nasabah | data operasional Filament |
| `setor_header` | transaksi setor | data operasional Filament |
| `setor_detail` | detail item setor | data operasional Filament |
| `tarik_saldo` | transaksi penarikan saldo | data operasional Filament |
| `buku_transaksi` | pencatatan mutasi | data operasional Filament |
| `unit` | satuan barang | data master Filament |

## Prioritas Pengerjaan

1. Buat `layouts/public.blade.php`.
2. Buat `navbar` dan `footer`.
3. Ubah halaman `/` dari `welcome.blade.php` ke struktur page + component.
4. Bangun halaman publik: tentang, artikel, FAQ, lokasi, kontak.
5. Sambungkan model dan migration sesuai ERD Bank Sampah.
6. Setelah struktur frontend rapi, lanjut ke panel admin lewat Filament.
