<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);

        Message::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim',
        ]);
    }
}