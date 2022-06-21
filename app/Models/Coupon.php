<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'type',
        'value',
        'cart_value',
        'quantity',
        'used',
        'expiry_date',
        'is_approved'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function is_approved(){
        return $this->is_approved ? 'فعال' : 'غیرفعال';
    }
}
