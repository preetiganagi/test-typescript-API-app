<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'ingredients', 'steps', 'image', 'rating'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
