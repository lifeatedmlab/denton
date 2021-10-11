<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{   
    protected $fillable = [
        'name', 'image', 'description', 'year', 'user'
    ];

    public function setUserAttribute($value)
    {
        $this->attributes['user'] = json_encode($value);
    }

    use HasFactory;
}
