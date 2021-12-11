<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'meta_description',
        'banner',
        'img_alt',
        'price',
        'content',
        'pre_course',
        'time',
        'course_status',
        'course_level',
        'user_id'
    ];

    public function getStatus()
    {
        if($this->course_status == 0) return "در حال برگزاری" ;
        if($this->course_status == 1) return "اتمام دوره" ;
    }

    public function getLevel()
    {
        if($this->course_level == 0) return "مقدماتی" ;
        if($this->course_level == 1) return "پیشرفته" ;
        if($this->course_level == 2) return "مقدماتی تا پیشرفته" ;
    }

    public function getBanner()
    {
        return asset('courses/banner/' . $this->banner);
    }

//    public function tags()
//    {
//        return $this->belongsToMany(Tag::class);
//    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function getUpdatedAtInJalali()
    {
        return verta($this->updated_at)->format('Y/m/d');
    }

    public function getPrice()
    {
        return $this->price == 0 ? 'رایگان' : $this->price;
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

//    public function hasManycomments()
//    {
//        return $this->hasMany(Comment::class);
//    }
}
