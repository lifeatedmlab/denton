<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'index')->name('index');
Route::view('/our-team', 'our-team')->name('our-team');
Route::view('/portfolio', 'portfolio')->name('portfolio');

Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
Route::view('/dashboardd', 'dashboard')->name('dashboardd');


Route::prefix('admin')->group(function(){

    // Member Routes
    Route::resource('member', MemberController::class)->parameters([
        'member' => 'code'
        ]);
        
        // Portfolio Routes
        Route::resource('portfolio', PortfolioController::class);
    });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
