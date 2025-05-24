<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'code',
        'duration',
        'extra_buttons',
    ];

    protected $casts = [
        'extra_buttons' => 'boolean',
    ];
}
