<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\RandomUniqueCode;
use App\Models\Payment;

class PaymentController extends Controller
{
    public static function storeSuccessRequest($result){
        Payment::create([
            'user_id' => auth()->user()->id,
            'order_id' => OrderController::$order->id,
            'amount' => OrderController::$amount,
            'authority' => $result['data']["authority"],
            'RefID' => null,
            'order_code' => RandomUniqueCode::randomString(6),
            'payment_type' => '0',
            'gateway_name' => 'zarinpal',
            'status_code' => $result['data']['code']
        ]);
    }

    public static function storeErrorRequest($result){
        Payment::create([
            'user_id' => auth()->user()->id,
            'order_id' => OrderController::$order->id,
            'amount' => OrderController::$amount,
            'authority' => $result['data']["authority"],
            'RefID' => null,
            'order_code' => RandomUniqueCode::randomString(6),
            'payment_type' => '0',
            'gateway_name' => 'zarinpal',
            'status_code' => $result['errors']['code']
        ]);
    }

    public static function storeSuccessCallBack($result,$Authority){
        Payment::create([
            'user_id' => auth()->user()->id,
            'order_id' => OrderController::$order->id,
            'amount' => OrderController::$amount,
            'authority' => $Authority,
            'RefID' => $result['data']['ref_id'],
            'order_code' => RandomUniqueCode::randomString(6),
            'payment_type' => '0',
            'gateway_name' => 'zarinpal',
            'status_code' => $result['data']['code'],
        ]);
    }

    public static function storeErrorCallBack($result,$Authority){
        Payment::create([
            'user_id' => auth()->user()->id,
            'order_id' => OrderController::$order->id,
            'amount' => OrderController::$amount,
            'authority' => $Authority,
            'RefID' => $result['data']['ref_id'],
            'order_code' => RandomUniqueCode::randomString(6),
            'payment_type' => '0',
            'gateway_name' => 'zarinpal',
            'status_code' => $result['errors']['code'],
        ]);
    }
}
