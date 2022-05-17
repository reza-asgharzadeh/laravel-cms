<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'downloadUrl',
        'description',
        'keywords',
        'time',
        'display',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function display(){
        if($this->display == 0) return "نمایش در صورت خرید دوره" ;
        if($this->display == 1) return "نمایش برای همه" ;
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
