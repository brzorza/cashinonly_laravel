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

    // Relation to user
    public function user(){
        return $this->belongsTo(User::class, 'author_id');
    }
}
