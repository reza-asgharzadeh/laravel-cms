<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function courses()
    {
        return $this->morphedByMany(Course::class, 'taggable');
    }
}
