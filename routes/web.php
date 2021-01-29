<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'index')->name('index');

Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
Route::view('/portfolio', 'admin.portfolio.index')->name('portfolio');

// Member Routes
Route::resource('member', MemberController::class)->parameters([
    'member' => 'code'
]);