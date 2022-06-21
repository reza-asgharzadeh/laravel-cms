<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'downloadUrl',
        'description',
        'keywords',
        'time',
        'display',
        'chapter_id'
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
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
