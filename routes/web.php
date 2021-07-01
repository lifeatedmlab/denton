<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\BatchYearController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
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
        // Achievement Routes
        Route::resource('achievement', AchievementController::class);
        // Batch Year Routes
        Route::resource('batch_year', BatchYearController::class);
        // Gallery Routes
        Route::resource('gallery', GalleryController::class);
        // User Routes
        Route::resource('user', UserController::class)->parameters([
            'user' => 'code'
        ]);
        
    });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
