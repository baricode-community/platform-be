<?php

namespace Database\Seeders;

use App\Models\Timeline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some demo timeline data
        Timeline::create([
            'title' => 'Peluncuran Platform Baricode',
            'description' => 'Tahap awal peluncuran platform komunitas Baricode dengan fitur-fitur dasar.',
            'status' => 'completed',
            'start_date' => now()->subMonths(3),
            'end_date' => now()->subMonths(2),
            'progress' => 100,
            'notes' => 'Platform berhasil diluncurkan dengan semua fitur dasar sesuai rencana.',
        ]);

        Timeline::create([
            'title' => 'Pengembangan Fitur Dashboard Admin',
            'description' => 'Membuat dashboard admin yang komprehensif untuk mengelola komunitas dan konten.',
            'status' => 'ongoing',
            'start_date' => now()->subMonths(1),
            'end_date' => now()->addMonths(1),
            'progress' => 65,
            'notes' => 'Sedang dalam tahap implementasi fitur-fitur dashboard utama.',
        ]);

        Timeline::create([
            'title' => 'Integrasi Payment Gateway',
            'description' => 'Integrasi dengan berbagai payment gateway untuk mendukung transaksi komunitas.',
            'status' => 'pending',
            'start_date' => now()->addWeeks(2),
            'end_date' => now()->addMonths(2),
            'progress' => 0,
            'notes' => 'Menunggu approval dari pihak payment provider.',
        ]);

        Timeline::create([
            'title' => 'Fitur Komunitas & Forum',
            'description' => 'Mengembangkan sistem forum dan komunitas untuk interaksi antar member.',
            'status' => 'ongoing',
            'start_date' => now()->subWeeks(2),
            'end_date' => now()->addMonths(1),
            'progress' => 45,
            'notes' => 'Backend API sudah selesai, sedang mengembangkan frontend interface.',
        ]);

        Timeline::create([
            'title' => 'Sistem Notifikasi Real-time',
            'description' => 'Implementasi sistem notifikasi real-time menggunakan WebSocket.',
            'status' => 'cancelled',
            'start_date' => now()->subMonths(2),
            'end_date' => now()->subMonths(1),
            'progress' => 20,
            'notes' => 'Dibatalkan karena perubahan prioritas dan resource constraints.',
        ]);

        Timeline::create([
            'title' => 'Optimization & Performance Testing',
            'description' => 'Melakukan optimization dan performance testing untuk memastikan aplikasi berjalan dengan lancar.',
            'status' => 'pending',
            'start_date' => now()->addMonths(2),
            'end_date' => now()->addMonths(3),
            'progress' => 0,
            'notes' => 'Dijadwalkan setelah fitur-fitur utama selesai.',
        ]);

        // Create additional random timelines
        Timeline::factory()->count(5)->create();
    }
}

