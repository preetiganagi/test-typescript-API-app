<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Tutorial
{
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'description',
        'published',
    ];

}
