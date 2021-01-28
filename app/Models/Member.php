<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name', 'code', 'position', 'generation', 
        'batch_year', 'status', 'socmed',
    ];

    //Tell laravel to fetch text values and set them as arrays
    protected $casts = [
        'socmed' => 'array',
    ];

    use HasFactory;
}
