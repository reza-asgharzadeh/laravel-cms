<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'authority',
        'RefID',
        'payment_type',
        'gateway_name',
        'status_code'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function statusCode(){
        $message = match ($this->status_code) {
            '-9' => 'خطای اعتبار سنجی',
            '-10' => 'ای پی و يا مرچنت كد پذيرنده صحيح نيست',
            '-11' => 'مرچنت کد فعال نیست لطفا با تیم پشتیبانی ما تماس بگیرید',
            '-12' => 'تلاش بیش از حد در یک بازه زمانی کوتاه.',
            '-15' => 'ترمینال شما به حالت تعلیق در آمده با تیم پشتیبانی تماس بگیرید',
            '-16' => 'سطح تاييد پذيرنده پايين تر از سطح نقره اي است.',
            '100' => 'عملیات موفق',
            '-30' => 'اجازه دسترسی به تسویه اشتراکی شناور ندارید',
            '-31' => 'حساب بانکی تسویه را به پنل اضافه کنید مقادیر وارد شده واسه تسهیم درست نیست',
            '-32' => 'دستمزدها معتبر نیست، کل دستمزدها (شناور) حداکثر مقدار اضافه بار بوده است.',
            '-33' => 'درصد های وارد شده درست نیست',
            '-34' => 'مبلغ از کل تراکنش بیشتر است',
            '-35' => 'تعداد افراد دریافت کننده تسهیم بیش از حد مجاز است',
            '-40' => 'پارامترهای اضافی نامعتبر، expire_in معتبر نیست.',
            '-50' => 'مبلغ پرداخت شده با مقدار مبلغ در وریفای متفاوت است',
            '-51' => 'پرداخت ناموفق',
            '-52' => 'خطای غیر منتظره با پشتیبانی تماس بگیرید',
            '-53' => 'اتوریتی برای این مرچنت کد نیست',
            '-54' => 'اتوریتی نامعتبر است',
            '101' => 'تراکنش وریفای شده',
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
}
