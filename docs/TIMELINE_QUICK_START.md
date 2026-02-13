# 🚀 Timeline - Quick Start

## Akses Langsung

```
Frontend List:    http://yourapp.local/timelines
Frontend Detail:  http://yourapp.local/timelines/1
Admin Panel:      http://yourapp.local/admin/timelines
```

## Struktur Database

```sql
CREATE TABLE timelines (
    id              BIGINT PRIMARY KEY
    title           VARCHAR(255)
    description     TEXT
    status          ENUM('pending', 'ongoing', 'completed', 'cancelled')
    start_date      DATE
    end_date        DATE
    progress        INT (0-100)
    notes           TEXT
    created_at      TIMESTAMP
    updated_at      TIMESTAMP
    deleted_at      TIMESTAMP
)
```

## Model Usage

```php
use App\Models\Timeline;

// Get all
Timeline::all();

// Filter
Timeline::where('status', 'ongoing')->get();
Timeline::where('progress', '>', 50)->get();

// Create
Timeline::create([
    'title' => 'New Timeline',
    'description' => 'Description',
    'status' => 'pending',
    'progress' => 0
]);

// Update
$timeline->update(['progress' => 100, 'status' => 'completed']);

// Delete (soft)
$timeline->delete();
```

## Admin Panel

**Features:**
- ✅ CRUD operations
- ✅ Filter by status
- ✅ Progress tracking
- ✅ Soft delete
- ✅ Form validation

**Fields:**
- Title (required)
- Description (optional)
- Status (required)
- Progress % (0-100)
- Dates (optional)
- Notes (optional)

## Frontend Features

**List Page (/timelines):**
- Filter buttons (All, Pending, Ongoing, Completed, Cancelled)
- Progress bars
- Status badges
- Pagination
- Click to view details

**Detail Page (/timelines/{id}):**
- Full information
- Timeline duration
- Relative dates
- Notes section
- Metadata

## Status Colors

| Status | Color | Indonesian |
|--------|-------|-----------|
| pending | 🟡 Yellow | Tertunda |
| ongoing | 🔵 Blue | Berlangsung |
| completed | 🟢 Green | Selesai |
| cancelled | 🔴 Red | Dibatalkan |

## Demo Data

Seeder membuat:
- 6 timeline hardcoded (berbagai status & progress)
- 5 timeline random (dari factory)
- Total: 11 timelines

## Routes

```
GET  /timelines                    # List
GET  /timelines?status=ongoing     # Filtered
GET  /timelines/{id}               # Detail

Admin:
GET    /admin/timelines
GET    /admin/timelines/create
POST   /admin/timelines
GET    /admin/timelines/{id}/edit
PUT    /admin/timelines/{id}
DELETE /admin/timelines/{id}
```

## Files Reference

| Component | File |
|-----------|------|
| Model | `app/Models/Timeline.php` |
| Controller | `app/Http/Controllers/Web/General/TimelineController.php` |
| Admin Form | `app/Filament/Resources/Timelines/Schemas/TimelineForm.php` |
| Admin Table | `app/Filament/Resources/Timelines/Tables/TimelinesTable.php` |
| List View | `resources/views/timelines/index.blade.php` |
| Detail View | `resources/views/timelines/show.blade.php` |
| Factory | `database/factories/TimelineFactory.php` |
| Seeder | `database/seeders/TimelineSeeder.php` |

## Common Operations

### Create Timeline via Admin
1. Go to `/admin/timelines`
2. Click "Create"
3. Fill form
4. Save

### Edit Timeline
1. Go to `/admin/timelines`
2. Find timeline, click "Edit"
3. Update data
4. Save

### View Timeline
1. Go to `/timelines`
2. Filter by status if needed
3. Click timeline card to view details

### Delete Timeline
1. Go to `/admin/timelines`
2. Click "..." on timeline row
3. Click "Delete"
4. Confirm

## Query Examples

```php
// Get all timelines with progress >= 50%
Timeline::where('progress', '>=', 50)->get();

// Get overdue timelines
Timeline::where('end_date', '<', now())
    ->where('status', '!=', 'completed')
    ->get();

// Count by status
Timeline::groupBy('status')
    ->selectRaw('status, count(*) as count')
    ->get();

// Get recent changes
Timeline::latest('updated_at')->limit(10)->get();

// Get timelines starting soon
Timeline::where('start_date', '>', now())
    ->where('start_date', '<', now()->addDays(7))
    ->get();
```

## Troubleshooting

**Issue: Routes not working**
→ Run `php artisan route:list` to verify
→ Check routes/web/general.php

**Issue: Admin page blank**
→ Run `php artisan config:cache`
→ Refresh browser

**Issue: Soft delete not working**
→ Check model uses SoftDeletes trait
→ Run migrations again if needed

**Issue: Data not showing**
→ Check database connection
→ Run `php artisan tinker` to verify data exists

## Next Steps

Optional enhancements:
- [ ] Add attachments per timeline
- [ ] Add comments/discussions
- [ ] Email notifications
- [ ] API endpoints
- [ ] Export to PDF/CSV
- [ ] Activity logging
- [ ] Timeline statistics

---

**Status:** ✅ Ready to use!

For more details see: `docs/TIMELINE_README.md`
