<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'RefID',
        'total',
        'payment_type',
        'gateway_name',
        'status'
    ];

    public function paymentable()
    {
        return $this->morphTo();
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function statusCode(){
        $message = match ($this->status) {
            0  => 'پرداخت نشده',
            1 => 'پرداخت شده',
        };
        return $message;
    }

    public function paymentType(){
        $message = match ($this->payment_type) {
            'gateway' => 'درگاه پرداخت',
            'card' => 'کارت به کارت',
            'wallet' => 'کیف پول',
            'cash' => 'نقدی',
        };
        return $message;
    }

    public function gatewayName(){
        $message = match ($this->gateway_name) {
            'zarinpal' => 'زرین پال',
            default => 'نا مشخص'
        };
        return $message;
    }
}
