<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alert extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['expiry_date'];

    protected $fillable = [
        'title',
        'btn_txt',
        'link',
        'title_color',
        'btn_color',
        'btn_bg_color',
        'btn_bg_hover_color',
        'bg_color',
        'expiry_date',
        'is_approved'
    ];

    public function is_approved(){
        return $this->is_approved ? 'فعال' : 'غیرفعال';
    }
}
