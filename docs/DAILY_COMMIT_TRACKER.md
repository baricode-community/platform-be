# Daily Commit Tracker - Documentation

## Overview
Daily Commit Tracker adalah fitur untuk memantau progress belajar pengguna setiap hari dan membangun kebiasaan coding yang konsisten.

## Features
- ✅ Setiap user dapat membuat catatan harian
- ✅ Catatan berisi: Judul, Pesan, Kesan, Level Keberhasilan (1-10)
- ✅ Catatan dapat diedit selama hari belum selesai
- ✅ Otomatis membuat catatan baru saat berganti hari
- ✅ ID menggunakan string random 5 karakter (mixed case)
- ✅ Dashboard dengan akses cepat ke fitur
- ✅ History untuk melihat semua catatan
- ✅ Livewire untuk interaksi real-time

## File Structure Created

### Models
- `app/Models/DailyCommitTracker.php` - Model untuk daily commit tracker

### Controllers
- `app/Http/Controllers/DailyCommitTrackerController.php` - Controller untuk mengelola daily commit tracker

### Livewire Components
- `app/Livewire/DailyCommitTrackerForm.php` - Form component untuk membuat/edit catatan

### Database
- `database/migrations/2025_12_22_000000_create_daily_commit_trackers_table.php` - Migration untuk tabel daily_commit_trackers
- `database/factories/DailyCommitTrackerFactory.php` - Factory untuk membuat data dummy
- `database/seeders/DailyCommitTrackerSeeder.php` - Seeder untuk membuat data awal

### Views
- `resources/views/pages/daily-commit-tracker/index.blade.php` - Halaman utama tracker
- `resources/views/pages/daily-commit-tracker/history.blade.php` - Halaman history
- `resources/views/pages/daily-commit-tracker/show.blade.php` - Halaman detail/edit
- `resources/views/livewire/daily-commit-tracker-form.blade.php` - Form Livewire view

### Routes
- `GET /daily-commit-tracker/` - Halaman utama tracker
- `GET /daily-commit-tracker/show/{date}` - Halaman detail/edit
- `GET /daily-commit-tracker/history` - Halaman history

## Database Schema

```sql
CREATE TABLE daily_commit_trackers (
    id VARCHAR(5) PRIMARY KEY,
    user_id BIGINT FOREIGN KEY,
    title VARCHAR(255) NOT NULL,
    message LONGTEXT NOT NULL,
    impression LONGTEXT NOT NULL,
    success_level INT DEFAULT 5,
    tracked_date DATE NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    UNIQUE(user_id, tracked_date)
)
```

## How It Works

1. **User Membuat Catatan**: User masuk ke halaman Daily Commit Tracker dan mengisi form dengan:
   - Judul catatan
   - Pesan/catatan panjang
   - Kesan pribadi
   - Level keberhasilan (1-10)

2. **Form Validation**: Semua field harus diisi dengan validasi dari Livewire

3. **Save/Update**: 
   - Jika user sudah punya catatan untuk hari ini, catatan akan diupdate
   - Jika belum ada, catatan baru akan dibuat
   - ID otomatis di-generate sebagai string random 5 karakter

4. **Edit Sebelum Hari Berganti**:
   - Catatan dapat diedit kapan saja sampai hari berganti
   - Tombol Edit hanya muncul untuk catatan hari ini

5. **History**:
   - User dapat melihat semua catatan yang pernah dibuat
   - Catatan ditampilkan dengan pagination
   - Dilengkapi dengan badges untuk menunjukkan level keberhasilan

## Display Features

### Dashboard Integration
- Card baru di halaman dashboard dengan warna orange/amber
- Direct link ke halaman Daily Commit Tracker

### Main Page
- Form interaktif menggunakan Livewire
- Slider untuk memilih level keberhasilan (1-10)
- Real-time validation
- Sidebar dengan statistik dan tips

### History Page
- Daftar semua catatan dengan pagination
- Color-coded success badges
- Informasi tanggal dan waktu
- Link untuk edit catatan hari ini

### Show Page
- Menampilkan detail catatan spesifik
- Option untuk edit jika hari ini
- Informasi metadata (dibuat, diupdate)
- Navigation links

## Seeding
Seeder membuat 7 catatan dummy untuk setiap user yang ada di database untuk demonstrasi.

Total data yang dibuat saat ini:
- 76 Users
- 532 Daily Commit Tracker records

## Usage

### Access Points
1. **Dashboard**: Click "Daily Commit Tracker" card
2. **Direct URL**: `/daily-commit-tracker/`
3. **History**: `/daily-commit-tracker/history`

### Create/Update Entry
1. Go to `/daily-commit-tracker/`
2. Fill the form with required information
3. Adjust success level using slider
4. Click "Simpan Catatan" button

### View History
1. Click "Lihat History" link
2. Browse through paginated entries
3. Click "Edit" button if entry is from today

## Key Implementation Details

- **ID Generation**: Using `Str::random(5)` in the model's boot method
- **Unique Constraint**: One entry per user per date
- **Dates**: Stored as date, not datetime, for daily uniqueness
- **Livewire Integration**: Form uses wire:model and wire:submit for reactivity
- **Responsive Design**: Tailwind CSS for mobile-friendly layout
- **Animations**: Smooth transitions and fade-in effects
