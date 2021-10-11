<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchYear extends Model
{
    public $timestamps=false;

    protected $fillable = [
        'year','is_active'
    ];

    protected $casts= [
        'is_active' => 'boolean',
    ];
    use HasFactory;
}
