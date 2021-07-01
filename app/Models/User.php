<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    
    protected $fillable = [
        'name','code','nim','generation','batch_year','status','password','socmed','email','profile_photo_path',
    ];
    
    protected $casts = [
        'socmed' => 'array'
    ];

    use HasFactory;
    
}
