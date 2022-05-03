<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coupon_id',
        'amount',
        'order_code',
        'order_status'
    ];

    public function getOrderStatus(){
        $message = match ($this->order_status) {
            0 => 'ناموفق',
            1 => 'موفق'
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
