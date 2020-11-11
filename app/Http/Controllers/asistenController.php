<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class asistenController extends Controller
{
    //
    public function show(){
        $asisten = Team::get();
        return view('profile.team', ['team'=>$asisten]);
    }
}
 