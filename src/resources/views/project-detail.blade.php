<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Awal Project - Focus Timer</title>
    @vite(['resources/css/app.css'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #0a0a0a; color: #fff; line-height: 1.6; }
        .container { max-width: 1000px; margin: 0 auto; padding: 2rem; }
        h1 { color: #ff3366; border-bottom: 2px solid #ff3366; padding-bottom: 1rem; margin-bottom: 2rem; }
        h2 { color: #ff3366; margin: 2rem 0 1rem 0; }
        h3 { margin: 1.5rem 0 1rem 0; color: #ddd; }
        .tech-stack { display: flex; flex-wrap: wrap; gap: 0.5rem; margin: 1rem 0; }
        .tech { background: rgba(255,51,102,0.1); color: #ff3366; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.875rem; }
        .diagram { background: #111; padding: 1.5rem; border-radius: 12px; margin: 1rem 0; border: 1px solid #333; overflow-x: auto; }
        .diagram pre { color: #0f0; font-family: monospace; font-size: 12px; }
        .back-btn { display: inline-block; margin-top: 2rem; padding: 0.75rem 1.5rem; background: #ff3366; color: white; text-decoration: none; border-radius: 30px; transition: 0.3s; }
        .back-btn:hover { background: #e62e5c; }
        ul, ol { margin-left: 1.5rem; margin-bottom: 1rem; }
        li { margin-bottom: 0.5rem; color: #ccc; }
        p { margin-bottom: 1rem; color: #ccc; }
        hr { border-color: #333; margin: 2rem 0; }
        .back-to-home { text-align: center; margin-top: 3rem; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📋 Laporan Awal Project Akhir</h1>
        
        <h2>🎯 Judul Project</h2>
        <p><strong>Rancang Bangun Aplikasi Pengatur Jadwal Belajar (Focus Timer)</strong></p>
        <p>Aplikasi web untuk membantu mahasiswa mengelola tugas akademik dan meningkatkan fokus belajar menggunakan teknik Pomodoro.</p>

        <h2>📊 Analisis Masalah & Kebutuhan Sistem</h2>
        
        <h3>Masalah yang Ditemukan:</h3>
        <ul>
            <li>Mahasiswa sulit fokus saat belajar (gangguan gadget, lingkungan)</li>
            <li>Perilaku prokrastinasi tinggi (menunda-nunda tugas)</li>
            <li>Tidak ada sistem manajemen tugas yang terstruktur</li>
            <li>Kesulitan mengatur waktu belajar yang efektif</li>
        </ul>
        
        <h3>Kebutuhan Sistem:</h3>
        <ul>
            <li>✅ Manajemen tugas (CRUD) - menambah, edit, hapus tugas</li>
            <li>✅ Timer fokus dengan teknik Pomodoro (25 menit fokus, 5 menit istirahat)</li>
            <li>✅ Notifikasi pengingat waktu belajar</li>
            <li>✅ Dashboard statistik fokus (total menit belajar per hari)</li>
            <li>✅ Admin panel untuk monitoring aktivitas siswa</li>
            <li>✅ API untuk integrasi aplikasi mobile</li>
        </ul>

        <h2>🏗️ Arsitektur & Tech Stack</h2>
        <div class="tech-stack">
            <span class="tech">Laravel 11</span>
            <span class="tech">Livewire 3</span>
            <span class="tech">Filament Admin Panel</span>
            <span class="tech">MariaDB</span>
            <span class="tech">REST API (Sanctum)</span>
            <span class="tech">Tailwind CSS</span>
            <span class="tech">Flutter (Mobile)</span>
        </div>
        <p><strong>Arsitektur:</strong> MVC (Model-View-Controller) dengan Laravel sebagai backend dan Livewire untuk komponen interaktif.</p>

        <h2>📐 Rencana Perancangan</h2>
        
        <h3>Entity Relationship Diagram (ERD)</h3>
        <div class="diagram">
            <pre style="color: #0f0; font-family: monospace; font-size: 12px;">
┌─────────────────┐     ┌─────────────────┐     ┌─────────────────────┐
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
└─────────────────┘     └─────────────────┘
            </pre>
        </div>

        <h3>Flowchart Sistem</h3>
        <div class="diagram">
            <pre style="color: #0f0; font-family: monospace; font-size: 12px;">
                              ┌─────────────┐
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
                        └───────────────┘
            </pre>
        </div>

        <h2>📱 Fitur Utama</h2>
        <ul>
            <li>✅ Task Manager (CRUD tugas belajar)</li>
            <li>✅ Focus Timer (teknik Pomodoro 25/5 menit)</li>
            <li>✅ Reminder & Notifikasi pengingat belajar</li>
            <li>✅ Dashboard Statistik Fokus harian</li>
            <li>✅ Admin Panel (Filament) untuk monitoring</li>
            <li>✅ REST API untuk integrasi mobile (Flutter)</li>
        </ul>

        <h2>📊 Target Luaran</h2>
        <ul>
            <li>Aplikasi web Focus Timer yang fully functional</li>
            <li>Dokumentasi API lengkap</li>
            <li>Admin panel untuk monitoring</li>
            <li>Source code di GitHub</li>
            <li>Aplikasi mobile (Flutter) sebagai bonus</li>
        </ul>

        <div class="back-to-home">
            <a href="/" class="back-btn">← Kembali ke Portfolio</a>
        </div>
    </div>
</body>
</html>