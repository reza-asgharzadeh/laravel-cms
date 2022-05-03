<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Order;

class TransactionController extends Controller
{
    public int $amount;
    public int $order_id;

    public function unpaidOrders(Order $order)
    {
        $this->amount = $order->amount;
        $this->order_id = $order->id;
        return $this->request();
    }

    public function newOrders()
    {
        OrderController::store();
        $this->amount = OrderController::$order->amount;
        $this->order_id = OrderController::$order->id;
        return $this->request();
    }

    public function request()
    {
        $merchant_id = env('MERCHANT_ID');
        $amount = $this->amount * 10;
        $order_id = $this->order_id;

        $data = array("merchant_id" => $merchant_id,
            "amount" => $amount,
            "callback_url" => route('callback'),
            "description" => "خرید دوره با شناسه سفارش $order_id",
            "metadata" => ["email" => auth()->user()->email, "mobile" => auth()->user()->mobile],
        );

        $jsonData = json_encode($data);
        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true, JSON_PRETTY_PRINT);
        curl_close($ch);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if (empty($result['errors'])) {
                if ($result['data']['code'] == 100) {
                    PaymentController::storeSuccessRequest($result);
                    return redirect('https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
                }
            } else {
                PaymentController::storeErrorRequest($result);
            }
        }
    }

    public function callback()
    {
        $amount = $this->amount * 10;
        $merchant_id = env('MERCHANT_ID');
        $Authority = $_GET['Authority'];

        $data = array("merchant_id" => $merchant_id, "authority" => $Authority, "amount" => $amount);
        $jsonData = json_encode($data);
        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if ($result['data']['code'] == 100) {
                session()->forget(['coupon','coupon_id','discount','payable','wallet','newWalletValue']);
                OrderController::update();
                PaymentController::storeSuccessCallBack($result,$Authority);
            } else {
                PaymentController::storeErrorCallBack($result,$Authority);
            }
        }
    }
}
