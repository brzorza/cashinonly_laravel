<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'anonymous',
        'author_id',
    ];

    protected $hidden = [
        'id',
        'author_id',
    ];

}
