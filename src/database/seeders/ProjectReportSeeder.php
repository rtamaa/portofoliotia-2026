<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectReport;

class ProjectReportSeeder extends Seeder
{
    public function run(): void
    {
        ProjectReport::updateOrCreate(
            ['id' => 1],
            [
                'title' => 'Rancang Bangun Aplikasi Pengatur Jadwal Belajar (Focus Timer)',
                'description' => 'Aplikasi web untuk membantu mahasiswa mengelola tugas akademik dan meningkatkan fokus belajar menggunakan teknik Pomodoro.',
                'problem_analysis' => "Mahasiswa sulit fokus saat belajar (gangguan gadget, lingkungan)\nPerilaku prokrastinasi tinggi (menunda-nunda tugas)\nTidak ada sistem manajemen tugas yang terstruktur\nKesulitan mengatur waktu belajar yang efektif",
                'requirements' => "✅ Manajemen tugas (CRUD) - menambah, edit, hapus tugas\n✅ Timer fokus dengan teknik Pomodoro (25 menit fokus, 5 menit istirahat)\n✅ Notifikasi pengingat waktu belajar\n✅ Dashboard statistik fokus (total menit belajar per hari)\n✅ Admin panel untuk monitoring aktivitas siswa\n✅ API untuk integrasi aplikasi mobile",
                'architecture' => 'MVC (Model-View-Controller) dengan Laravel sebagai backend dan Livewire untuk komponen interaktif.',
                'tech_stack' => 'Laravel 11, Livewire 3, Filament Admin Panel, MariaDB, REST API (Sanctum), Tailwind CSS, Flutter (Mobile)',
                'erd_diagram' => '┌─────────────────┐     ┌─────────────────┐     ┌─────────────────────┐
│     users       │     │     tasks       │     │   focus_sessions    │
├─────────────────┤     ├─────────────────┤     ├─────────────────────┤
│ id (PK)         │◄────│ user_id (FK)    │     │ id (PK)             │
│ name            │     │ id (PK)         │     │ task_id (FK)        │
│ email           │     │ title           │     │ user_id (FK)        │
│ display_name    │     │ description     │     │ started_at          │
│ password        │     │ focus_minutes   │     │ ended_at            │
│ created_at      │     │ is_completed    │     │ duration_actual     │
└─────────────────┘     │ completed_at    │     │ is_completed        │
                        │ sort_order      │     │ is_cancelled        │
                        └─────────────────┘     └─────────────────────┘

┌─────────────────┐     ┌─────────────────┐
│   reminders     │     │  notifications  │
├─────────────────┤     ├─────────────────┤
│ id (PK)         │     │ id (PK)         │
│ user_id (FK)    │     │ user_id (FK)    │
│ task_id (FK)    │     │ title           │
│ title           │     │ body            │
│ remind_at       │     │ read_at         │
│ is_sent         │     │ created_at      │
└─────────────────┘     └─────────────────┘',

'flowchart_diagram' => '      ┌─────────────┐
                              │   MULAI     │
                              └──────┬──────┘
                                     │
                                     ▼
                              ┌─────────────┐
                              │   LOGIN     │
                              └──────┬──────┘
                                     │
                                     ▼
                              ┌─────────────┐
                              │  DASHBOARD  │
                              └──────┬──────┘
                                     │
                    ┌────────────────┼────────────────┐
                    │                │                │
                    ▼                ▼                ▼
            ┌───────────┐    ┌───────────┐    ┌───────────┐
            │ TAMBAH    │    │ FOCUS     │    │ LIHAT     │
            │ TUGAS     │    │ TIMER     │    │ STATISTIK │
            └─────┬─────┘    └─────┬─────┘    └─────┬─────┘
                  │                │                │
                  ▼                ▼                │
            ┌───────────┐    ┌───────────┐         │
            │ LIST      │    │ PILIH     │         │
            │ TUGAS     │    │ TUGAS     │         │
            └─────┬─────┘    └─────┬─────┘         │
                  │                │                │
                  ▼                ▼                │
            ┌───────────┐    ┌───────────┐         │
            │ Tandai    │    │ START     │         │
            │ SELESAI   │    │ TIMER     │         │
            └───────────┘    └─────┬─────┘         │
                                  │                │
                                  ▼                │
                            ┌───────────┐         │
                            │ TIMER     │         │
                            │ BERJALAN  │         │
                            └─────┬─────┘         │
                                  │                │
                    ┌─────────────┼─────────────┐  │
                    │             │             │  │
                    ▼             ▼             ▼  │
              ┌─────────┐  ┌─────────┐  ┌─────────┐│
              │ TIMER   │  │ KLIK    │  │ TIMER   ││
              │ HABIS   │  │ STOP    │  │ RESET   ││
              └────┬────┘  └────┬────┘  └─────────┘│
                   │            │                  │
                   ▼            ▼                  │
            ┌───────────┐ ┌───────────┐            │
            │ FOKUS +1  │ │ FOKUS 0   │            │
            │ (SELESAI) │ │ (BATAL)   │            │
            └───────────┘ └───────────┘            │
                   │            │                  │
                   └────────────┼──────────────────┘
                                │
                                ▼
                        ┌───────────────┐
                        │  UPDATE       │
                        │  STATISTIK    │
                        └───────┬───────┘
                                │
                                ▼
                        ┌───────────────┐
                        │   SELESAI     │
                        └───────────────┘',
                'features' => "✅ Task Manager (CRUD tugas belajar)\n✅ Focus Timer (teknik Pomodoro 25/5 menit)\n✅ Reminder & Notifikasi pengingat belajar\n✅ Dashboard Statistik Fokus harian\n✅ Admin Panel (Filament) untuk monitoring\n✅ REST API untuk integrasi mobile (Flutter)",
                'target_outputs' => "✅ Aplikasi web Focus Timer yang fully functional\n✅ Dokumentasi API lengkap\n✅ Admin panel untuk monitoring\n✅ Source code di GitHub\n✅ Aplikasi mobile (Flutter) sebagai bonus",
            ]
        );
    }
}