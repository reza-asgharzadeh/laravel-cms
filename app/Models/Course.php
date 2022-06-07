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
        'description',
        'keywords',
        'banner',
        'img_alt',
        'price',
        'content',
        'pre_course',
        'time',
        'course_status',
        'course_level',
        'user_id',
        'offer_id',
        'is_approved',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBanner()
    {
        return asset('course/banner/' . $this->banner);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Chapter::class);
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

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function offer(){
        return $this->belongsTo(Offer::class);
    }

    public function getRelatedCoursesAttribute()
    {
        $course = $this;
        return $this->whereHas('tags', function ($q) use ($course) {
            return $q->whereIn('name', $course->tags->pluck('name'));
        })
            ->where('id', '!=', $course->id) // So you won't fetch same course
            ->get();
    }
}
