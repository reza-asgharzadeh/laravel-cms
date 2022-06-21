<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'coupon_id',
        'amount',
        'order_code',
        'order_status'
    ];

    public function getOrderStatus(){
        $message = match ($this->order_status) {
            0 => 'پرداخت ناموفق',
            1 => 'پرداخت موفق'
        };
        return $message;
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class,'order_id');
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }
}
