<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'file_path',
        'file_type',
        'file_size',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
