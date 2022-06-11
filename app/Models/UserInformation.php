<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

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
