<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasRoles;
    protected $fillable = [
        'name','code','nim','generation','batch_year','status','password','socmed','email','profile_photo_path',
    ];
    
    protected $casts = [
        'socmed' => 'array'
    ];

    use HasFactory;
    
}
