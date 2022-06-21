<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'answer_status',
        'best_answer'
    ];

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function children(){
        return $this->hasMany(Answer::class,'question_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
