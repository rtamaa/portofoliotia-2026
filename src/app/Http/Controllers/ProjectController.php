<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function show(string $slug)
    {
        $project = Project::with('report')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('project.detail', [
            'project' => $project,
            'report' => $project->report,
        ]);
    }
}