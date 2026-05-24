<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SocialLink;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('home', [

            'projects' => Project::where('is_active', true)->latest()->get(),

            'services' => Service::where('is_active', true)
                ->orderBy('order')
                ->get(),

            'socials' => SocialLink::where('is_active', true)->get(),

            'setting' => Setting::first(),

        ]);
    }

    public function showProject(Project $project)
    {
        return view('portfolio.show', compact('project'));
    }
}