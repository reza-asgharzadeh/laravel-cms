<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'profile',
        'role_id',
        'email_verified_at',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedAtInJalali()
    {
        return verta($this->created_at)->format('h:i:s - Y/m/d');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getProfile()
    {
        return asset('profiles/images/' . $this->profile);
    }

    public function lastLoginDateTime()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function questions(){
        return $this->hasMany(Question::class,'user_id');
    }

    public function tickets(){
        return $this->hasMany(Ticket::class,'user_id');
    }

    public function getRoleName()
    {
        if($this->role_id == 1) return "مدیر" ;
        if($this->role_id == 2) return "کاربر عادی" ;
    }
}
