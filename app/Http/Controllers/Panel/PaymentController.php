<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\RandomUniqueCode;
use App\Models\Course;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function payment(Course $course)
    {
        $merchant_id = env('MERCHANT_ID');
        $price = $course->price * 10;
        $course_name = $course->name;

        $data = array("merchant_id" => $merchant_id,
            "amount" => $price,
            "callback_url" => "http://localhost:8000/payment/course/checker",
            "description" => $course_name,
            "metadata" => [ "email" => "info@email.com","mobile"=>"09121111111"],
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
                    return redirect('https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
                }
            } else {
//                echo'Error Code: ' . $result['errors']['code'];
//                echo'message: ' .  $result['errors']['message'];
                Payment::create([
                    'user_id' => auth()->user()->id,
                    'course_id' => $course->id,
                    'amount' => $price,
                    'authority' => $result['data']["authority"],
                    'RefID' => $result['data']['ref_id'],
                    'order_code' => RandomUniqueCode::randomString(6),
                    'payment_type' => '0',
                    'gateway_name' => 'zarinpal',
                    'status_code' => $result['errors']['code']
                ]);
            }
        }
    }

    public function checker(Course $course)
    {
        $price = $course->price * 10;
        $merchant_id = env('MERCHANT_ID');
        $Authority = $_GET['Authority'];

        $data = array("merchant_id" => $merchant_id, "authority" => $Authority, "amount" => $price);
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
//                echo 'Transation success. RefID:' . $result['data']['ref_id'];
                Payment::create([
                    'user_id' => auth()->user()->id,
                    'course_id' => $course->id,
                    'amount' => $price,
                    'authority' => $Authority,
                    'RefID' => $result['data']['ref_id'],
                    'order_code' => RandomUniqueCode::randomString(6),
                    'payment_type' => '0',
                    'gateway_name' => 'zarinpal',
                    'status_code' => $result['data']['code'],
                ]);
            } else {
//                echo'code: ' . $result['errors']['code'];
//                echo'message: ' .  $result['errors']['message'];
                Payment::create([
                    'user_id' => auth()->user()->id,
                    'course_id' => $course->id,
                    'amount' => $price,
                    'authority' => $Authority,
                    'RefID' => $result['data']['ref_id'],
                    'order_code' => RandomUniqueCode::randomString(6),
                    'payment_type' => '0',
                    'gateway_name' => 'zarinpal',
                    'status_code' => $result['errors']['code'],
                ]);
            }
        }
    }
}
