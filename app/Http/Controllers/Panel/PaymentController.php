<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('view-payments');

        if(isset($request->status_code)) {
            $payments = match ($request->status_code) {
                '0' => Payment::where('status_code', '!=' ,100)->paginate(10),
                '1' => Payment::where('status_code',100)->paginate(10),
            };
        } else {
            $payments = Payment::paginate(10);
        }

        return view('panel.payments.index',compact('payments'));
    }

    public static function storeSuccessRequest($result)
    {
        Payment::create([
            'order_id' => OrderController::$order->id,
            'authority' => $result['data']["authority"],
            'RefID' => null,
            'gateway_name' => 'zarinpal',
            'status_code' => $result['data']['code']
        ]);
    }

    public static function storeErrorRequest($result)
    {
        Payment::create([
            'order_id' => OrderController::$order->id,
            'authority' => $result['data']["authority"],
            'RefID' => null,
            'gateway_name' => 'zarinpal',
            'status_code' => $result['errors']['code']
        ]);
    }

    public static function storeSuccessCallBack($result,$Authority)
    {
        Payment::create([
            'order_id' => OrderController::$order->id,
            'authority' => $Authority,
            'RefID' => $result['data']['ref_id'],
            'gateway_name' => 'zarinpal',
            'status_code' => $result['data']['code'],
        ]);
    }

    public static function storeErrorCallBack($result,$Authority)
    {
        Payment::create([
            'order_id' => OrderController::$order->id,
            'authority' => $Authority,
            'RefID' => $result['data']['ref_id'],
            'gateway_name' => 'zarinpal',
            'status_code' => $result['errors']['code'],
        ]);
    }
}
