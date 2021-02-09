<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'index')->name('index');

Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

// Member Routes
Route::resource('member', MemberController::class)->parameters([
    'member' => 'code'
]);

// Portfolio Routes
Route::resource('portfolio', PortfolioController::class);