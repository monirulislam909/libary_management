<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'cover',  // Validate as image file
        'isbn',
        'copies',
        'available_copy',
    ];
}
