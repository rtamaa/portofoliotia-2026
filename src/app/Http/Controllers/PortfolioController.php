<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::active()
            ->ordered()
            ->get();

        return view('home', compact('projects'));
    }

    public function showProject(Project $project)
    {
        return view('portfolio.show', compact('project'));
    }

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|min:3|max:200',
            'message' => 'required|min:10|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        Message::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim! Terima kasih.',
        ]);
    }
}