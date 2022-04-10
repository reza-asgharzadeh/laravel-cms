<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'meta_description',
        'banner',
        'img_alt',
        'content',
        'user_id'
    ];

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBanner()
    {
        return asset('articles/banner/' . $this->banner);
    }

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('h:i:s - Y/m/d');
    }

    public function getUpdatedAtInJalali()
    {
        return verta($this->updated_at)->format('h:i:s - Y/m/d');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
