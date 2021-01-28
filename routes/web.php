<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'index');

// Member Routes
Route::resource('members', MemberController::class)->parameters([
    'members' => 'code'
]);