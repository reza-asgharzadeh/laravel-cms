<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'content',
        'user_id',
        'question_id'
    ];

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
