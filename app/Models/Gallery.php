<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{   
    protected $fillable = [
        'image', 'is_archive'
    ];

    protected $casts=[
        'is_archive'
    ];
    use HasFactory;
}
