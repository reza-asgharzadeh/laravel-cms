<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'slug',
        'banner',
        'img_alt',
        'content',
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

    public function getBanner()
    {
        return asset('images/pages/'. $this->slug ."/". $this->banner);
    }

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function getUpdatedAtInJalali()
    {
        return verta($this->updated_at)->format('Y/m/d');
    }
}
