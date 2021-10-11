<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\BatchYearController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermOfOfficeController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'index')->name('index');
Route::view('/our-team', 'our-team')->name('our-team');
Route::view('/portfolio', 'portfolio')->name('portfolio');



Route::middleware(['auth','role:Admin'])->prefix('admin')->group(function(){
    Route::view('/', 'admin.dashboard')->name('dashboard');

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
        // Profile Routes
        Route::resource('profile', ProfileController::class);

        Route::resource('term_of_office', TermOfOfficeController::class);
        Route::resource('position', PositionController::class);
        Route::resource('division', DivisionController::class);
    });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
