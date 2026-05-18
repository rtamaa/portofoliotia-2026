<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - Portfolio</title>

    @vite(['resources/css/app.css'])

    <style>
        body {
            background: #0a0a0a;
            color: #fff;
            font-family: Inter, sans-serif;
            line-height: 1.7;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 2rem;
        }

        h1 {
            color: #ff3366;
            border-bottom: 2px solid #ff3366;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        h2 {
            color: #ff3366;
            margin-top: 2rem;
        }

        h3 {
            color: #ddd;
            margin-top: 1rem;
        }

        .card {
            background: #111;
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid #222;
            margin: 1rem 0;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            background: rgba(255,51,102,0.15);
            color: #ff3366;
            font-size: 12px;
            margin-right: 5px;
            margin-top: 5px;
        }

        .diagram {
            background: #111;
            padding: 1rem;
            border-radius: 10px;
            border: 1px solid #333;
            overflow-x: auto;
        }

        .diagram pre {
            color: #0f0;
            font-size: 12px;
        }

        img {
            width: 100%;
            border-radius: 12px;
            border: 1px solid #333;
        }

        .back-btn {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            background: #ff3366;
            color: white;
            border-radius: 30px;
            text-decoration: none;
        }

        .back-btn:hover {
            background: #e62e5c;
        }
    </style>
</head>

<body>
<div class="container">

    <h1>{{ $project->title }}</h1>

    {{-- DESCRIPTION --}}
    <div class="card">
        <h2>Deskripsi</h2>
        <p>{{ $project->description }}</p>
    </div>

    {{-- DETAIL --}}
    <div class="card">
        <h2>Detail Project</h2>
        <p><b>Category:</b> {{ $project->category }}</p>
        <p><b>Client:</b> {{ $project->client }}</p>
        <p><b>Year:</b> {{ $project->year }}</p>
        <p><b>Role:</b> {{ $project->role }}</p>
    </div>

    {{-- TAGS (SAFE JSON) --}}
    <div class="card">
        <h2>Tags</h2>

        @php
            $tags = is_array($project->tags)
                ? $project->tags
                : json_decode($project->tags ?? '[]', true);
        @endphp

        @foreach($tags as $tag)
            <span class="badge">{{ $tag }}</span>
        @endforeach
    </div>

    {{-- ERD --}}
    <div class="card">
        <h2>📐 ERD Sistem</h2>
        <img src="{{ asset('assets/images/erd.jpg') }}" alt="ERD">
    </div>

    {{-- FLOWCHART --}}
    <div class="card">
        <h2>🔄 Flowchart Sistem</h2>

        <div class="diagram">
<pre>
START
  ↓
LOGIN
  ↓
DASHBOARD
  ↓
CRUD TASK
  ↓
FOCUS TIMER
  ↓
UPDATE STATISTIK
  ↓
SELESAI
</pre>
        </div>
    </div>

    {{-- BACK --}}
    <a href="/" class="back-btn">← Kembali</a>

</div>
</body>
</html>