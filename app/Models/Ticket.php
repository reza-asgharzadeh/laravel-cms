<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'file',
        'content',
        'user_id',
        'ticket_id',
        'code',
        'status'
    ];

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function getParentName()
    {
        return is_null($this->parent) ? 'ندارد' : $this->parent->subject;
    }

    public function Children()
    {
        return $this->hasMany(Ticket::class,'ticket_id');
    }
}
