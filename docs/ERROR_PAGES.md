# Error Pages Documentation

Dokumentasi lengkap tentang error pages yang telah diimplementasikan di aplikasi Baricode.

## Daftar Error Pages

Semua error page menggunakan layout `base.blade.php` dan memiliki design yang konsisten dengan navigasi kembali ke halaman utama.

### 1. **404 - Not Found**
- **File**: `resources/views/errors/404.blade.php`
- **Warna**: Red/Pink Gradient
- **Deskripsi**: Ditampilkan ketika user mencoba mengakses halaman yang tidak ditemukan
- **Tombol Aksi**: 
  - Kembali ke Halaman Utama (route: `home`)
  - Tombol Kembali (history.back())

### 2. **500 - Internal Server Error**
- **File**: `resources/views/errors/500.blade.php`
- **Warna**: Orange/Red Gradient
- **Deskripsi**: Ditampilkan ketika terjadi error di server
- **Fitur**: Menampilkan Error ID (UUID) untuk tracking
- **Tombol Aksi**:
  - Kembali ke Halaman Utama (route: `home`)
  - Tombol Muat Ulang (location.reload())

### 3. **403 - Forbidden**
- **File**: `resources/views/errors/403.blade.php`
- **Warna**: Yellow/Orange Gradient
- **Deskripsi**: Ditampilkan ketika user tidak memiliki izin mengakses resource
- **Tombol Aksi**:
  - Kembali ke Halaman Utama (route: `home`)
  - Tombol Kembali (history.back())

### 4. **401 - Unauthorized**
- **File**: `resources/views/errors/401.blade.php`
- **Warna**: Blue/Cyan Gradient
- **Deskripsi**: Ditampilkan ketika user harus login untuk mengakses resource
- **Tombol Aksi**:
  - Login Sekarang (route: `login`)
  - Kembali ke Halaman Utama (route: `home`)
- **Info Tambahan**: Link untuk register jika belum punya akun

### 5. **429 - Too Many Requests**
- **File**: `resources/views/errors/429.blade.php`
- **Warna**: Purple/Pink Gradient
- **Deskripsi**: Ditampilkan ketika user membuat terlalu banyak request dalam waktu singkat
- **Fitur**: Auto reload dalam 3 detik
- **Tombol Aksi**:
  - Muat Ulang dalam 3 detik
  - Kembali ke Halaman Utama (route: `home`)

### 6. **503 - Service Unavailable**
- **File**: `resources/views/errors/503.blade.php`
- **Warna**: Red Gradient
- **Deskripsi**: Ditampilkan ketika server sedang dalam pemeliharaan
- **Tombol Aksi**:
  - Coba Lagi (location.reload())
  - Kembali ke Halaman Utama (route: `home`)

### 7. **419 - Token Mismatch / Session Expired**
- **File**: `resources/views/errors/419.blade.php`
- **Warna**: Indigo/Purple Gradient
- **Deskripsi**: Ditampilkan ketika sesi berakhir atau CSRF token tidak valid
- **Tombol Aksi**:
  - Muat Ulang Halaman (location.reload())
  - Kembali ke Halaman Utama (route: `home`)

### 8. **422 - Unprocessable Entity**
- **File**: `resources/views/errors/422.blade.php`
- **Warna**: Green/Emerald Gradient
- **Deskripsi**: Ditampilkan ketika data yang dikirim tidak valid
- **Tombol Aksi**:
  - Kembali dan Perbaiki (history.back())
  - Kembali ke Halaman Utama (route: `home`)

### 9. **405 - Method Not Allowed**
- **File**: `resources/views/errors/405.blade.php`
- **Warna**: Cyan/Blue Gradient
- **Deskripsi**: Ditampilkan ketika HTTP method tidak diizinkan untuk resource
- **Tombol Aksi**:
  - Kembali (history.back())
  - Ke Halaman Utama (route: `home`)

### 10. **410 - Gone**
- **File**: `resources/views/errors/410.blade.php`
- **Warna**: Red/Rose Gradient
- **Deskripsi**: Ditampilkan ketika resource telah dihapus secara permanen
- **Tombol Aksi**:
  - Kembali ke Halaman Utama (route: `home`)
  - Kembali (history.back())

### 11. **413 - Payload Too Large**
- **File**: `resources/views/errors/413.blade.php`
- **Warna**: Amber/Yellow Gradient
- **Deskripsi**: Ditampilkan ketika file upload terlalu besar
- **Tombol Aksi**:
  - Kembali (history.back())
  - Ke Halaman Utama (route: `home`)

### 12. **Default Error**
- **File**: `resources/views/errors/default.blade.php`
- **Warna**: Gray/Slate Gradient
- **Deskripsi**: Fallback untuk error yang tidak memiliki template spesifik
- **Fitur**: Menampilkan kode error dinamis
- **Tombol Aksi**:
  - Kembali ke Halaman Utama (route: `home`)
  - Kembali (history.back())

### 13. **Server Error**
- **File**: `resources/views/errors/server.blade.php`
- **Warna**: Fuchsia/Purple Gradient
- **Deskripsi**: Ditampilkan untuk kesalahan konfigurasi server
- **Tombol Aksi**:
  - Muat Ulang (location.reload())
  - Ke Halaman Utama (route: `home`)

### 14. **Generic Error**
- **File**: `resources/views/errors/generic.blade.php`
- **Warna**: Teal/Cyan Gradient
- **Deskripsi**: Template generic untuk halaman yang tidak valid
- **Tombol Aksi**:
  - Kembali ke Halaman Utama (route: `home`)
  - Kembali (history.back())

## Fitur Umum Semua Error Pages

1. **Layout Base**: Semua error pages menggunakan `x-layouts.base` component
2. **Responsive Design**: Fully responsive untuk desktop, tablet, dan mobile
3. **Dark Mode**: Mendukung dark mode dengan colors yang sesuai
4. **Gradien Colors**: Setiap error page memiliki warna gradient unik untuk identifikasi
5. **Tombol Navigasi**: Semua halaman memiliki tombol untuk kembali ke halaman utama
6. **Info Tambahan**: Footer dengan informasi support
7. **Animasi**: Tombol memiliki hover effect dan scale animation

## Routing Configuration

Pastikan Laravel menggunakan error pages ini secara otomatis. File `config/errors.php` tidak perlu konfigurasi tambahan karena Laravel akan secara otomatis mencari file dengan nama status code di folder `resources/views/errors/`.

### Cara Kerja Automatic Error Handling:
- Laravel akan mencari file dengan nama `{status_code}.blade.php` di folder errors
- Jika tidak ditemukan, akan menggunakan `default.blade.php`
- Jika custom exception handling diatur, gunakan `server.blade.php` atau `generic.blade.php`

## Testing Error Pages

Untuk testing, Anda dapat membuat routes khusus untuk testing:

```php
// Di routes/web.php atau routes/api.php
Route::get('/error/404', function() {
    abort(404);
});

Route::get('/error/500', function() {
    abort(500);
});

Route::get('/error/403', function() {
    abort(403);
});
```

## Customization

### Mengubah Warna Gradient
Edit file error page dan ubah class gradient:
- `from-red-500` menjadi warna yang diinginkan
- `to-pink-500` menjadi warna yang diinginkan

### Mengubah Route Home
Edit link `route('home')` menjadi route yang diinginkan

### Menambah Error Page Baru
1. Buat file baru di `resources/views/errors/{status_code}.blade.php`
2. Gunakan template yang sama dengan error pages lain
3. Ubah kode error, warna, dan deskripsi sesuai kebutuhan

## Notes Penting

1. ✅ Semua error pages sudah menggunakan layout `base.blade.php`
2. ✅ Semua error pages memiliki styling yang konsisten
3. ✅ Semua error pages memiliki tombol navigasi ke halaman utama
4. ✅ Error pages mendukung dark mode
5. ✅ Error pages fully responsive

## Support

Jika ada masalah dengan error pages, hubungi tim development atau buat issue di repository.
