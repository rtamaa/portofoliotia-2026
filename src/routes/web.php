<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\MessageController;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/project/{project:slug}', [PortfolioController::class, 'showProject'])->name('project.show');
Route::post('/contact/send', [MessageController::class, 'store'])->name('contact.send');

Route::get('/login', function () {
    return redirect('/admin');
})->name('login');