<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Models\Payment;

class PaymentController extends Controller
{
    public static function storeSuccessRequest($result){
        Payment::create([
            'order_id' => OrderController::$order->id,
            'authority' => $result['data']["authority"],
            'RefID' => null,
            'gateway_name' => 'zarinpal',
            'status_code' => $result['data']['code']
        ]);
    }

    public static function storeErrorRequest($result){
        Payment::create([
            'order_id' => OrderController::$order->id,
            'authority' => $result['data']["authority"],
            'RefID' => null,
            'gateway_name' => 'zarinpal',
            'status_code' => $result['errors']['code']
        ]);
    }

    public static function storeSuccessCallBack($result,$Authority){
        Payment::create([
            'order_id' => OrderController::$order->id,
            'authority' => $Authority,
            'RefID' => $result['data']['ref_id'],
            'gateway_name' => 'zarinpal',
            'status_code' => $result['data']['code'],
        ]);
    }

    public static function storeErrorCallBack($result,$Authority){
        Payment::create([
            'order_id' => OrderController::$order->id,
            'authority' => $Authority,
            'RefID' => $result['data']['ref_id'],
            'gateway_name' => 'zarinpal',
            'status_code' => $result['errors']['code'],
        ]);
    }
}
