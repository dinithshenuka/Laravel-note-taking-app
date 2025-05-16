<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // Allow mass assignment on these fields
    protected $fillable = [
        'title',
        'content',
    ];
}