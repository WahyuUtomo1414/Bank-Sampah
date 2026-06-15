# Front End Bank Sampah

## Tujuan Frontend

Frontend Bank Sampah harus terasa modern, bersih, hangat, dan mudah dipercaya. Arah visual utamanya adalah **Eco Modern Community**: rapi seperti platform institusi yang profesional, tetapi tetap ramah, ringan, dan dekat dengan isu lingkungan serta aktivitas warga.

Frontend ini **wajib mobile-first**, artinya desain, slicing, dan implementasi class dimulai dari layar kecil terlebih dahulu, lalu diperluas ke tablet dan desktop.

## Stack Frontend

- Laravel Blade
- Tailwind CSS versi baru
- Vite
- Blade component untuk section dan shared UI

Catatan implementasi:

- Jangan gunakan `cdn.tailwindcss.com` untuk hasil akhir project.
- Gunakan Tailwind CSS versi baru lewat package build project.
- Styling harus dipusatkan lewat token theme, utility class, dan reusable component.
- Semua utility class default harus mewakili layout mobile.
- Variant breakpoint seperti `md:` dan `lg:` hanya dipakai untuk enhancement ke layar yang lebih besar.

## Theme Token

### Warna

```yaml
surface: '#f7fbf7'
surface-dim: '#dfe9df'
surface-bright: '#ffffff'
surface-container-lowest: '#ffffff'
surface-container-low: '#f2f8f2'
surface-container: '#e8f5e9'
surface-container-high: '#dff0e1'
surface-container-highest: '#d2e7d6'
on-surface: '#16301b'
on-surface-variant: '#47604c'
inverse-surface: '#1f2a21'
inverse-on-surface: '#eff8f0'
outline: '#7f9b84'
outline-variant: '#c8ddca'
surface-tint: '#2f7d32'
primary: '#2f7d32'
on-primary: '#ffffff'
primary-container: '#4caf50'
on-primary-container: '#103916'
inverse-primary: '#9ad29e'
secondary: '#5f7a63'
on-secondary: '#ffffff'
secondary-container: '#dce9de'
on-secondary-container: '#27442c'
tertiary: '#8bc34a'
on-tertiary: '#17310f'
tertiary-container: '#e8f5d9'
on-tertiary-container: '#29461d'
error: '#ba1a1a'
on-error: '#ffffff'
error-container: '#ffdad6'
on-error-container: '#93000a'
background: '#f7fbf7'
on-background: '#16301b'
surface-variant: '#e3efe4'
earth-accent: '#a1887f'
```

### Typography

```yaml
display-xl:
  fontFamily: Plus Jakarta Sans
  fontSize: 64px
  fontWeight: '800'
  lineHeight: 72px
  letterSpacing: -0.02em
display-lg:
  fontFamily: Plus Jakarta Sans
  fontSize: 48px
  fontWeight: '700'
  lineHeight: 56px
  letterSpacing: -0.01em
headline-lg:
  fontFamily: Plus Jakarta Sans
  fontSize: 32px
  fontWeight: '700'
  lineHeight: 40px
headline-lg-mobile:
  fontFamily: Plus Jakarta Sans
  fontSize: 28px
  fontWeight: '700'
  lineHeight: 36px
headline-md:
  fontFamily: Plus Jakarta Sans
  fontSize: 24px
  fontWeight: '600'
  lineHeight: 32px
body-lg:
  fontFamily: Inter
  fontSize: 18px
  fontWeight: '400'
  lineHeight: 28px
body-md:
  fontFamily: Inter
  fontSize: 16px
  fontWeight: '400'
  lineHeight: 24px
body-sm:
  fontFamily: Inter
  fontSize: 14px
  fontWeight: '400'
  lineHeight: 20px
label-bold:
  fontFamily: Inter
  fontSize: 12px
  fontWeight: '700'
  lineHeight: 16px
  letterSpacing: 0.05em
```

### Radius

```yaml
sm: 0.25rem
DEFAULT: 0.5rem
md: 0.75rem
lg: 1rem
xl: 1.5rem
full: 9999px
```

### Spacing

```yaml
base: 8px
container-max: 1280px
gutter: 24px
margin-desktop: 64px
margin-mobile: 20px
section-gap: 120px
```

## Brand & Style Direction

Bank Sampah dibangun untuk platform publik dan admin pendukung kegiatan lingkungan yang menggabungkan kejelasan informasi, rasa aman, dan semangat komunitas. UI harus memberi kesan:

- bersih dan mudah dipahami
- ramah, tidak kaku
- segar dan hidup
- informatif tetapi tidak padat
- kuat di CTA utama seperti setor, lihat lokasi, dan baca edukasi

Prinsip tampilannya:

- dominasi background terang untuk clarity
- aksen hijau dipakai untuk brand moment, CTA, dan state aktif
- headline harus tegas dan mudah dibaca
- whitespace harus cukup lega agar konten edukasi tetap nyaman dikonsumsi

## Prinsip Warna

- `primary` dan `primary-container` jadi warna utama untuk CTA, highlight, active state, icon penting, dan brand moment.
- `on-surface` dan hijau gelap dipakai untuk headline utama agar tetap profesional dan kuat.
- `surface`, `background`, dan `surface-container-low` dipakai untuk area baca, card, dan pemisah section.
- `tertiary` dipakai terbatas untuk aksen ramah lingkungan, badge, atau sorotan data ringan.
- `earth-accent` boleh dipakai tipis untuk nuansa natural.
- `error` hanya untuk validasi dan state gagal.

## Prinsip Tipografi

- Semua hero memakai `display-xl` atau `display-lg`.
- Heading section memakai `headline-lg` desktop dan `headline-lg-mobile` di mobile.
- Subheading dan judul card memakai `headline-md`.
- Body text standar memakai `body-md`.
- Penjelasan intro atau narasi edukatif besar memakai `body-lg`.
- Label kecil, badge, dan nav link memakai `label-bold` dengan uppercase bila relevan.
- Ukuran teks default harus nyaman dibaca di mobile tanpa perlu override tambahan.

## Prinsip Layout

Frontend menggunakan **Fluid-Fixed Hybrid Grid**:

- Mobile: 4 kolom, gutter 16px, outer margin 20px
- Desktop: 12 kolom, gutter 24px, outer margin 64px
- Tablet: 8 kolom, gutter 20px, outer margin 40px

Aturan layout:

- content utama dibatasi `max-width: 1280px`
- background boleh full bleed
- section harus punya napas besar
- hindari komponen terlalu padat
- hero, statistik, dan CTA boleh sedikit bermain layering agar terasa hidup
- semua section harus stack vertikal secara natural di mobile
- multi-column layout baru aktif mulai tablet atau desktop
- jangan ada horizontal scroll di viewport mobile
- margin, padding, gap, dan ukuran card default harus dioptimalkan untuk satu tangan dan layar sempit

## Standar Mobile-First

Aturan implementasi mobile-first yang wajib diikuti:

- desain dimulai dari lebar mobile, bukan desktop
- class tanpa prefix breakpoint dianggap final untuk mobile
- tablet dimulai dari `md:`
- desktop dimulai dari `lg:` atau `xl:` sesuai kebutuhan
- hindari pola `hidden md:block` bila konten mobile belum punya pengganti yang jelas
- semua section harus tetap terbaca penuh walau gambar, dekorasi, atau badge disederhanakan di mobile

Contoh pola class yang benar:

```html
<section class="px-5 py-16 md:px-10 lg:px-16">
<div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
<h1 class="text-4xl leading-tight md:text-5xl lg:text-6xl">
```

Contoh pola yang harus dihindari:

```html
<section class="lg:px-16 md:px-10 px-5">
<div class="grid grid-cols-3 md:grid-cols-2">
```

Masalah dari pola yang dihindari:

- base layout terlalu diasumsikan desktop
- urutan breakpoint tidak menunjukkan prioritas mobile
- grid bisa rusak di layar kecil

## Elevation & Depth

Depth tidak dibangun dari shadow keras. Gunakan:

- tonal layering antar surface
- border tipis hijau muda atau netral terang
- ambient shadow lembut
- shadow hijau sangat halus untuk hover state
- backdrop blur untuk navbar

Standar elevation:

- card normal: `0 4px 20px rgba(0,0,0,0.05)` atau border halus
- hover card: `0 12px 32px rgba(47, 125, 50, 0.12)`
- sticky nav: blur `20px` dengan background semi transparan

## Shape Language

Karakter bentuk harus ramah dan modern:

- button dan input: radius 8px
- card utama: radius 16px
- card besar / feature panel: bisa 24px
- chip dan avatar: pill / full rounded

Jangan terlalu banyak sudut tajam, karena platform ini harus terasa nyaman dan approachable.

## Komponen Inti

### Navbar

- sticky di atas
- background semi transparan
- wajib pakai backdrop blur
- active link punya indikator hijau atau underline halus
- implementasi sebagai layout global, bukan per halaman
- di mobile harus pakai pola sederhana: brand, toggle, dan panel menu yang ringan
- link desktop tidak boleh jadi satu-satunya pola navigasi

### Footer

- shared layout global
- isi ringkasan lembaga, quick links, kontak, dan CTA
- visual lebih tenang dari hero tetapi tetap konsisten
- di mobile harus stack per blok, bukan dipaksa multi-column kecil

### Buttons

- primary: hijau utama dengan teks putih, minimum tinggi 48px
- secondary: hijau gelap atau charcoal lembut dengan teks putih
- ghost: border 1.5px warna gelap
- hover memberi efek lift atau glow hijau lembut
- di mobile tombol utama harus full-width atau mudah dijangkau jika konteksnya CTA penting

### Cards

- background putih
- radius 16px
- border hijau abu muda halus
- gambar mengikuti radius atas
- hover halus, bukan agresif
- card list default harus 1 kolom di mobile kecuali ada alasan kuat untuk 2 kolom

### Input Fields

- background `surface-container-low`
- border awal transparan atau outline lembut
- focus state jadi 2px hijau
- placeholder pakai Inter medium
- field dan tombol submit harus nyaman disentuh di mobile

### Chips & Tags

- pill shape
- background hijau 10%
- text hijau gelap
- dipakai untuk kategori, metadata, dan filter

## Aturan Per Halaman

### Home

Kesan:

- paling hangat
- paling kuat di hero dan CTA
- paling jelas menunjukkan manfaat Bank Sampah

Section wajib:

- hero besar
- statistik ringkas
- layanan atau manfaat utama
- alur setor sampah
- jenis sampah yang diterima
- artikel terbaru
- FAQ ringkas
- lokasi singkat
- CTA besar

Aturan mobile-first:

- hero stack vertikal
- statistik jadi grid kecil 1 atau 2 kolom
- CTA utama harus muncul cepat tanpa scroll terlalu jauh
- section manfaat dan alur tetap enak dibaca per blok di layar sempit

### Tentang Kami

Kesan:

- lebih naratif
- lebih tenang dari home
- fokus pada trust dan identitas lembaga

Section wajib:

- hero brand story
- cerita lembaga
- visi misi
- nilai lingkungan
- CTA

Aturan mobile-first:

- narasi harus dipotong jadi blok pendek
- visual pendukung tidak boleh menggeser teks utama terlalu ke bawah

### Artikel

Kesan:

- edukatif
- rapi
- nyaman dibaca

Section wajib:

- hero / intro
- artikel unggulan
- grid artikel
- pagination

Aturan mobile-first:

- daftar artikel default 1 kolom
- metadata artikel tetap singkat dan mudah discan
- pagination tetap mudah disentuh di layar kecil

### Detail Artikel

Kesan:

- editorial
- fokus ke keterbacaan
- bersih dan lega

Section wajib:

- hero artikel
- konten utama
- artikel terkait
- CTA lanjut baca atau kontak

Aturan mobile-first:

- konten utama harus jadi prioritas
- sidebar desktop harus turun jadi stack biasa di mobile
- jangan membuat area baca terlalu sempit

### FAQ

Kesan:

- cepat dipahami
- ramah
- membantu

Section wajib:

- hero pendek
- list FAQ
- CTA bantuan lanjutan

Aturan mobile-first:

- accordion atau list harus nyaman disentuh
- pertanyaan tidak boleh terlalu rapat

### Lokasi

Kesan:

- jelas
- praktis
- memudahkan warga datang atau setor

Section wajib:

- hero
- daftar lokasi
- peta / embed maps
- panduan setor

Aturan mobile-first:

- list lokasi stack vertikal
- embed map tetap aman tanpa overflow
- CTA arah lokasi harus mudah ditekan

### Kontak

Kesan:

- jelas
- mudah dihubungi
- tidak terlalu formal

Section wajib:

- hero pendek
- info kontak
- form inquiry
- konteks alamat atau lokasi

Aturan mobile-first:

- info kontak dan form harus stack
- input field full width
- CTA submit harus mudah dijangkau

## Aturan Implementasi Tailwind CSS Versi Baru

- Simpan token warna, spacing, radius, dan typography sebagai theme project.
- Gunakan utility class langsung di Blade component, bukan inline `<style>` besar per halaman.
- Komponen yang sering dipakai boleh dibungkus dengan class semantic tambahan di `resources/css/app.css`.
- Gunakan Vite untuk build asset.
- Font yang dipakai: `Plus Jakarta Sans` dan `Inter`.
- Hindari style duplikat antar page; pecah jadi component reusable.
- Urutan penulisan class harus dimulai dari base mobile lalu breakpoint besar.
- Jangan membangun layout desktop dulu lalu menambal versi mobile di bawahnya.
- Semua component harus dites minimal di viewport sekitar 360px, 768px, dan 1280px.

## Larangan Implementasi

- Jangan pakai Tailwind CDN untuk final production.
- Jangan ulang navbar/footer di tiap file page.
- Jangan jadikan satu file Blade berisi seluruh halaman besar tanpa component.
- Jangan overuse warna hijau terang; pakai hanya di momen penting.
- Jangan bikin spacing rapat yang merusak kesan bersih dan premium.
- Jangan buat elemen penting hanya muncul di desktop tanpa fallback mobile.
- Jangan pakai grid multi-kolom sebagai default base mobile.
- **Wajib menggunakan Bahasa Indonesia untuk seluruh teks di website. Jangan menggunakan bahasa Inggris kecuali untuk istilah teknis yang tidak ada padanannya.**

## Ringkasan Arah FE

Frontend Bank Sampah harus terasa seperti platform lingkungan yang modern, ramah, jelas, dan mudah dipercaya. Struktur teknisnya harus rapi, reusable, dan mudah di-scale, dengan Blade component per section dan Tailwind CSS versi baru sebagai fondasi styling utama.
