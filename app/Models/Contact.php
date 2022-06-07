<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'content',
        'contact_id',
        'user_id'
    ];

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('Y/m/d - H:i:s');
    }

    public function getUpdatedAtInJalali()
    {
        return verta($this->updated_at)->format('Y/m/d - H:i:s');
    }

    public function parent()
    {
        return $this->belongsTo(Contact::class,'contact_id');
    }

    public function getParentId()
    {
        return is_null($this->parent) ? 'ندارد' : $this->parent->id;
    }

    public function replies()
    {
        return $this->hasMany(Contact::class,'contact_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserName()
    {
        return is_null($this->user) ? 'مهمان' : $this->user->name;
    }
}
