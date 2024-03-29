<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInformation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'birthday',
        'job',
        'about_me',
        'website',
        'github',
        'linkedin',
        'telegram',
        'instagram',
        'twitter',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
