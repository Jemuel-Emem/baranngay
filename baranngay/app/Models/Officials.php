<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officials extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'fullname',
        'purok',
        'gender',
        'age',
        'status'
    ];
}


