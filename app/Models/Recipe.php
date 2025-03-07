<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'ingredients', 'steps', 'image', 'rating', 'user_id', 'time'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Calculate the average rating dynamically
    public function updateAverageRating()
    {
        $averageRating = $this->comments()->whereNotNull('rating')->avg('rating');
        $this->rating = round($averageRating, 1);
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
