# QuickGigs - Platform Freelance Modern

## Deskripsi Project
QuickGigs adalah platform freelance modern yang terinspirasi dari Fiverr, dibangun dengan Laravel dan menggunakan desain yang gelap, minimalis, dan modern. Platform ini memungkinkan pengguna untuk mencari dan menjual jasa freelance di berbagai kategori.

## Fitur Utama

### 🎨 **Desain Modern & Dark Theme**
- Interface gelap yang nyaman untuk mata
- Desain minimalis dan modern
- Responsive design untuk semua perangkat
- Animasi hover dan transisi yang smooth

### 🔍 **Sistem Pencarian Lengkap**
- Pencarian berdasarkan judul dan deskripsi gig
- Filter berdasarkan kategori, harga, dan waktu pengiriran
- Sorting berdasarkan harga, rating, dan popularitas
- Pagination untuk navigasi yang mudah

### 📱 **Halaman-halaman Utama**
1. **Beranda** - Hero section dengan search bar dan kategori populer
2. **Kategori** - Browse gigs berdasarkan kategori dengan pagination
3. **Detail Gig** - Informasi lengkap tentang layanan freelance
4. **Pencarian Global** - Advanced search dengan multiple filters

### 🗂️ **Struktur Database**
- **Categories** - Kategori layanan (Web Dev, Mobile Dev, Design, dll)
- **Gigs** - Layanan freelance dengan informasi lengkap (title, slug, description, price, rating, dll)
- **Users** - Data pengguna dan freelancer
- **Orders** - Sistem pemesanan (untuk pengembangan future)

## Teknologi yang Digunakan

### Backend
- **Laravel 11** - PHP Framework
- **MySQL** - Database
- **Eloquent ORM** - Database relationships
- **Blade Templating** - View engine

### Frontend
- **Tailwind CSS** - Styling framework
- **Custom Dark Theme** - Palet warna dark-50 sampai dark-900
- **Responsive Design** - Mobile-first approach
- **JavaScript** - Interactive elements

### Arsitektur
- **MVC Pattern** - Model-View-Controller
- **Component-based Views** - Reusable Blade components
- **RESTful Routes** - Clean URL structure

## Instalasi & Setup

1. **Clone Repository**
   ```bash
   git clone [repository-url]
   cd quickGigs
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Setup**
   ```bash
   # Configure database in .env file
   php artisan migrate:fresh --seed
   ```

5. **Run Application**
   ```bash
   php artisan serve
   npm run dev
   ```

## Struktur File Utama

```
app/
├── Models/
│   ├── Category.php      # Model kategori
│   └── Gig.php          # Model gig/layanan
├── Http/Controllers/
│   └── QuickGigsController.php  # Main controller
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php        # Main layout
│   ├── components/
│   │   ├── navigation.blade.php  # Navigation bar
│   │   ├── footer.blade.php     # Footer
│   │   ├── gig-card.blade.php   # Gig card component
│   │   └── pagination.blade.php # Pagination component
│   └── quickgigs/
│       ├── index.blade.php      # Homepage
│       ├── category.blade.php   # Category page
│       ├── show.blade.php       # Gig detail page
│       └── search.blade.php     # Search page
database/
├── migrations/              # Database schema
└── seeders/                # Sample data
```

## Fitur Layout & Component (Modul 2)

### 1. **Layout System**
- `layouts/app.blade.php` - Master layout dengan navigation dan footer
- Consistent header, navigation, dan footer di semua halaman
- SEO-friendly dengan dynamic title dan meta tags

### 2. **Component System**
- **Navigation Component** - Responsive navbar dengan dropdown kategori
- **Footer Component** - Footer dengan links dan informasi
- **Gig Card Component** - Reusable card untuk menampilkan gig
- **Pagination Component** - Custom pagination dengan dark theme

### 3. **Blade Features**
- `@extends` dan `@section` untuk template inheritance
- `@component` dan `<x-component>` untuk reusable components
- `@foreach` dan `@if` untuk dynamic content
- `@include` untuk partial views

## Database Schema

### Tabel Categories
- id, name, slug, description, icon, is_active, created_at, updated_at

### Tabel Gigs
- id, user_id, category_id, title, slug, description, images (JSON), price, delivery_time, revisions, rating, reviews_count, orders_count, is_active, featured, created_at, updated_at

### Tabel Users (Laravel default)
- id, name, email, email_verified_at, password, remember_token, created_at, updated_at

## Sample Data

Database di-seed dengan data sample:
- **6 Kategori** - Web Development, Mobile Development, UI/UX Design, Graphic Design, Content Writing, Digital Marketing
- **8 Gigs** - Sample layanan freelance dengan rating dan harga berbeda
- **Users** - Sample freelancer profiles

## Routes

```php
Route::get('/', 'QuickGigsController@index')->name('quickgigs.index');
Route::get('/search', 'QuickGigsController@search')->name('quickgigs.search');
Route::get('/category/{category}', 'QuickGigsController@category')->name('quickgigs.category');
Route::get('/gig/{gig}', 'QuickGigsController@show')->name('quickgigs.show');
```

## Testing

Aplikasi dapat diakses di http://localhost:8000 setelah menjalankan `php artisan serve`

### Halaman yang dapat ditest:
- **Homepage**: http://localhost:8000
- **Search**: http://localhost:8000/search
- **Category**: http://localhost:8000/category/web-development
- **Gig Detail**: http://localhost:8000/gig/i-will-create-a-modern-responsive-website-with-laravel

### Fitur yang sudah berfungsi:
✅ Homepage dengan hero section dan featured gigs  
✅ Search functionality dengan filters  
✅ Category pages dengan pagination  
✅ Gig detail pages  
✅ Responsive design  
✅ Dark theme consistency  
✅ Component reusability  

## Pengembangan Future

- [ ] Sistem autentikasi pengguna
- [ ] Dashboard seller untuk manage gigs
- [ ] Sistem pembayaran dan order management
- [ ] Rating dan review system yang interaktif
- [ ] Chat system antara buyer dan seller
- [ ] Upload file dan portfolio
- [ ] Email notifications
- [ ] Admin panel

## Screenshots

1. **Homepage** - Hero section dengan search dan featured gigs
2. **Category Page** - Grid gigs dengan filter dan pagination
3. **Gig Detail** - Informasi lengkap gig dengan pricing
4. **Search Page** - Advanced search dengan multiple filters

---

## Posttest Information

**Project**: QuickGigs - Platform Freelance  
**Module**: Modul 2 - Routing dan Blade  
**Features Implemented**:
- Layout inheritance dengan `@extends` dan `@section`
- Reusable components menggunakan `<x-component>`
- Dynamic routing dengan parameter
- Database relationships dan pagination
- Responsive dark theme design

## Penulis
**Farre**  
Framework Practice - Laravel Project  
Posttest Modul 2 - Routing dan Blade

## Lisensi
This project is open-sourced software licensed under the [MIT license](LICENSE).