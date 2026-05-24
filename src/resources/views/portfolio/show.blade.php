<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }}</title>

    @vite(['resources/css/app.css'])
</head>
<body>

<div class="max-w-5xl mx-auto py-10">

    <h1 class="text-4xl font-bold mb-5">
        {{ $project->title }}
    </h1>

    @if($project->thumbnail)
        <img
            src="{{ asset('storage/' . $project->thumbnail) }}"
            class="w-full rounded-xl mb-10"
        >
    @endif

    <div class="space-y-10">

        <div>
            <h2 class="text-2xl font-bold mb-3">Background</h2>
            {!! $project->background !!}
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-3">Objective</h2>
            {!! $project->objective !!}
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-3">Features</h2>
            {!! $project->features !!}
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-3">Tech Stack</h2>
            {!! $project->tech_stack !!}
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-3">Database Design</h2>
            {!! $project->database_design !!}
        </div>

        @if($project->erd)
            <img
                src="{{ asset('storage/' . $project->erd) }}"
                class="rounded-xl"
            >
        @endif

        <div>
            <h2 class="text-2xl font-bold mb-3">Flowchart</h2>
            {!! $project->flowchart_desc !!}
        </div>

        @if($project->flowchart)
            <img
                src="{{ asset('storage/' . $project->flowchart) }}"
                class="rounded-xl"
            >
        @endif

        <div>
            <h2 class="text-2xl font-bold mb-3">Documentation</h2>
            {!! $project->documentation !!}
        </div>

        <div>
            <h2 class="text-2xl font-bold mb-3">Conclusion</h2>
            {!! $project->conclusion !!}
        </div>

    </div>

</div>

</body>
</html>