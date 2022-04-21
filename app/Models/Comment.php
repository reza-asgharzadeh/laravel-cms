<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'is_approved',
        'comment_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class,'comment_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class);
    }

    public function approvedReplies()
    {
        return $this->replies()->where('is_approved',true);
    }

    public function getProfile()
    {
        return asset('profiles/images/' . $this->user->profile);
    }

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function is_approved(){
        return $this->is_approved ? 'تایید شده' : 'تایید نشده';
    }
}
