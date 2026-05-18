<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Project 1: Focus Timer (Laporan Akhir - UTS)
        Project::create([
            'title' => 'Rancang Bangun Aplikasi Pengatur Jadwal Belajar',
            'category' => 'Focus Timer & Task Management',
            'description' => 'Aplikasi web pengatur jadwal belajar berbasis focus timer yang mengintegrasikan teknik Pomodoro untuk membantu mahasiswa mengelola tugas akademik, meningkatkan fokus belajar, dan mengurangi perilaku prokrastinasi.',
            'client' => 'Tugas Akhir - Universitas Esa Unggul',
            'year' => 2026,
            'role' => 'Full-stack Developer',
            'tags' => json_encode(['Laravel 11', 'Livewire 3', 'Filament Admin', 'REST API', 'Pomodoro Timer']),
            'image_url' => 'https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800&h=1000&fit=crop',
            'detail_url' => '/project/focus-timer',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // Project 2: E-Commerce Platform
        Project::create([
            'title' => 'E-Commerce Platform Modern',
            'category' => 'Web Development',
            'description' => 'Platform e-commerce modern dengan fitur manajemen produk, keranjang belanja, dan pembayaran online.',
            'client' => 'UMKM Fashion',
            'year' => 2025,
            'role' => 'Full-stack Developer',
            'tags' => json_encode(['Laravel', 'Livewire', 'Midtrans', 'MySQL']),
            'image_url' => 'https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800&h=1000&fit=crop',
            'detail_url' => '/project/ecommerce',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // Project 3: Sistem Informasi Perpustakaan
        Project::create([
            'title' => 'Sistem Informasi Perpustakaan Digital',
            'category' => 'Information System',
            'description' => 'Sistem manajemen perpustakaan digital dengan fitur peminjaman buku online dan manajemen anggota.',
            'client' => 'SMA Negeri 1 Jakarta',
            'year' => 2025,
            'role' => 'Lead Developer',
            'tags' => json_encode(['Laravel', 'Filament', 'MySQL', 'Barcode Scanner']),
            'image_url' => 'https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800&h=1000&fit=crop',
            'detail_url' => '/project/library',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // Project 4: Aplikasi Mobile Konsultasi Kesehatan
        Project::create([
            'title' => 'Aplikasi Mobile Konsultasi Kesehatan',
            'category' => 'Mobile Development',
            'description' => 'Aplikasi mobile untuk konsultasi kesehatan online, jadwal dokter, dan rekam medis digital.',
            'client' => 'Startup Kesehatan',
            'year' => 2026,
            'role' => 'Mobile Developer',
            'tags' => json_encode(['Flutter', 'Dart', 'REST API', 'Laravel']),
            'image_url' => 'https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800&h=1000&fit=crop',
            'detail_url' => '/project/health-app',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // Project 5: Company Profile with CMS
        Project::create([
            'title' => 'Company Profile with CMS',
            'category' => 'Web Development',
            'description' => 'Website company profile dinamis dengan Content Management System (CMS).',
            'client' => 'PT. Teknologi Nusantara',
            'year' => 2025,
            'role' => 'Web Developer',
            'tags' => json_encode(['Laravel', 'Filament', 'MySQL', 'TinyMCE']),
            'image_url' => 'https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800&h=1000&fit=crop',
            'detail_url' => '/project/cms',
            'sort_order' => 5,
            'is_active' => true,
        ]);
    }
}