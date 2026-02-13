# Timeline Komunitas Baricode

Fitur Timeline untuk menampilkan progress dan aktivitas komunitas Baricode dengan status (tertunda, berlangsung, selesai, dibatalkan).

## 📁 Struktur File

```
app/
├── Models/
│   └── Timeline.php                          # Model Timeline
├── Http/Controllers/Web/General/
│   └── TimelineController.php                # Controller untuk timeline views
└── Filament/Resources/Timelines/
    ├── TimelineResource.php                   # Filament Resource
    ├── Schemas/TimelineForm.php               # Form schema
    └── Tables/TimelinesTable.php              # Table columns

database/
├── migrations/
│   └── 2026_02_13_112105_create_timelines_table.php
├── factories/
│   └── TimelineFactory.php
└── seeders/
    └── TimelineSeeder.php

resources/views/timelines/
├── index.blade.php                           # Daftar timeline
└── show.blade.php                            # Detail timeline
```

## 🗄️ Database Schema

### Tabel `timelines`

| Kolom | Tipe | Keterangan |
|-------|------|-----------|
| `id` | bigint | Primary key |
| `title` | string | Judul timeline |
| `description` | text | Deskripsi timeline |
| `status` | enum | Status: pending, ongoing, completed, cancelled |
| `start_date` | date | Tanggal mulai |
| `end_date` | date | Tanggal selesai |
| `progress` | integer | Persentase progress (0-100) |
| `notes` | text | Catatan tambahan |
| `created_at` | timestamp | Waktu dibuat |
| `updated_at` | timestamp | Waktu update terakhir |
| `deleted_at` | timestamp | Soft delete |

## 🎨 Fitur Timeline

### Model Timeline

```php
// Accessor untuk label status
$timeline->status_label; // "Berlangsung", "Selesai", dll

// Accessor untuk warna status
$timeline->status_color; // "info", "success", dll
```

### Status & Warna

| Status | Label | Warna |
|--------|-------|-------|
| pending | Tertunda | warning (kuning) |
| ongoing | Berlangsung | info (biru) |
| completed | Selesai | success (hijau) |
| cancelled | Dibatalkan | danger (merah) |

## 🛠️ Filament Admin Panel

### Fitur Admin

- **Buat Timeline**: Form lengkap dengan validation
- **Edit Timeline**: Update data timeline
- **Hapus Timeline**: Soft delete timeline
- **Filter**: Filter berdasarkan status
- **Export**: Export data timeline

### Form Fields

- Title (required)
- Description (optional)
- Status (required)
- Progress % (0-100)
- Start Date (optional)
- End Date (optional)
- Notes (optional)

### Table Columns

- Title
- Description
- Status (dengan badge warna)
- Progress (progress bar)
- Created At
- Actions (Edit, Delete)

## 👁️ Frontend Views

### Page 1: Daftar Timeline (`/timelines`)

**Fitur:**
- Filter berdasarkan status
- Tampil list timeline dengan card yang interaktif
- Progress bar visual
- Pagination

**Filter Tersedia:**
- Semua
- Tertunda
- Berlangsung
- Selesai
- Dibatalkan

### Page 2: Detail Timeline (`/timelines/{id}`)

**Fitur:**
- Informasi lengkap timeline
- Progress bar yang lebih detail
- Durasi timeline
- Waktu relatif (e.g., "2 jam yang lalu")
- Catatan tambahan
- Metadata (created, updated)

## 📝 Menggunakan Timeline

### Setup Awal

1. **Jalankan Migration**
```bash
php artisan migrate
```

2. **Jalankan Seeder (opsional)**
```bash
php artisan db:seed --class=TimelineSeeder
```

Ini akan membuat 6 timeline demo dengan berbagai status.

### Membuat Timeline Baru

#### Via Filament Admin
1. Buka admin panel
2. Navigasi ke "Timeline Komunitas"
3. Klik "Create"
4. Isi form dan submit

#### Via Tinker
```php
php artisan tinker
Timeline::create([
    'title' => 'Judul Timeline',
    'description' => 'Deskripsi...',
    'status' => 'pending',
    'start_date' => '2026-02-15',
    'end_date' => '2026-03-15',
    'progress' => 50,
    'notes' => 'Catatan...'
]);
```

### Query Timeline

```php
// Semua timeline
Timeline::all();

// Filter by status
Timeline::where('status', 'ongoing')->get();

// Timeline yang sedang berjalan dan belum selesai
Timeline::where('status', 'ongoing')
    ->where('progress', '<', 100)
    ->get();

// Timeline dengan progress > 50%
Timeline::where('progress', '>', 50)->get();

// Urutkan by latest
Timeline::latest()->get();
```

## 🔗 Routes

### Frontend Routes
```php
GET  /timelines              # Daftar timeline
GET  /timelines?status=ongoing # Filter by status
GET  /timelines/{id}         # Detail timeline
```

### Admin Routes (Filament)
```
GET  /admin/timelines              # Daftar (admin)
GET  /admin/timelines/create       # Buat (admin)
POST /admin/timelines              # Store (admin)
GET  /admin/timelines/{id}/edit    # Edit (admin)
PUT  /admin/timelines/{id}         # Update (admin)
DELETE /admin/timelines/{id}       # Delete (admin)
```

## 🎨 Styling

Timeline menggunakan **Tailwind CSS** dengan custom warna untuk setiap status:

```css
/* Border Colors */
border-l-yellow-500  /* pending */
border-l-blue-500    /* ongoing */
border-l-green-500   /* completed */
border-l-red-500     /* cancelled */

/* Badge Colors */
bg-yellow-100 text-yellow-800  /* pending */
bg-blue-100 text-blue-800      /* ongoing */
bg-green-100 text-green-800    /* completed */
bg-red-100 text-red-800        /* cancelled */
```

## 🚀 Features yang Bisa Ditambahkan

- [ ] Attachment/File untuk setiap timeline
- [ ] Comments/Discussion per timeline
- [ ] Timeline activity log
- [ ] Email notification saat status berubah
- [ ] API endpoint untuk timeline
- [ ] Mobile-responsive improvements
- [ ] Timeline analytics/statistics
- [ ] Bulk import timeline dari CSV
- [ ] Timeline versioning/history

## 📚 Referensi

- [Laravel Eloquent](https://laravel.com/docs/eloquent)
- [Filament Admin Panel](https://filamentphp.com/)
- [Tailwind CSS](https://tailwindcss.com/)
