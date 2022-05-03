<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\RandomUniqueCode;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public static $order;

    public function index(Request $request)
    {
        Gate::authorize('view-orders');

        if(isset($request->order_status)) {
            $orders = auth()->user()->orders()->where('order_status', $request->order_status)->paginate(10);
        } else {
            $orders = auth()->user()->orders()->paginate(10);
        }

        return view('panel.orders.index',compact('orders'));
    }

    public static function store()
    {
        $cart = collect(session("cart"));
        $ids = $cart->keys();
        $amount = session()->get("payable") ?? collect(session("cart"))->sum("price");
        $coupon_id = session()->get("coupon_id");

        self::$order = Order::create([
            'user_id' => auth()->user()->id,
            'coupon_id' => $coupon_id,
            'amount' => $amount,
            'order_code' => RandomUniqueCode::randomString(6),
        ]);
        self::$order->courses()->sync($ids);
    }

    public static function update(){
        self::$order->update([
            'order_status' => 1
        ]);
    }
}
