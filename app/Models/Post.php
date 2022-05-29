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
        'description',
        'keywords',
        'banner',
        'img_alt',
        'content',
        'user_id',
        'is_approved'
    ];

    public function is_approved()
    {
        $message = match ($this->is_approved) {
            0 => 'پیش نویس',
            1 => 'منتشر شده',
        };
        return $message;
    }

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
        return verta($this->created_at)->format('Y/m/d');
    }

    public function getUpdatedAtInJalali()
    {
        return verta($this->updated_at)->format('Y/m/d');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function getRelatedPostsAttribute()
    {
        $post = $this;
        return $this->whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('name', $post->tags->pluck('name'));
        })
            ->where('id', '!=', $post->id) // So you won't fetch same post
            ->get();
    }
}
