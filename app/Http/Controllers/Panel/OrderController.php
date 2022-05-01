<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\RandomUniqueCode;
use App\Models\Order;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public static $order;
    public static $amount;

    public function index()
    {
        Gate::authorize('view-orders');

        $orders = Order::paginate(5);
        return view('panel.orders.index',compact('orders'));
    }

    public static function store()
    {
        $cart = collect(session("cart"));
        $ids = $cart->keys();
        self::$amount = session()->get("payable") ?? collect(session("cart"))->sum("price");
        $coupon_id = session()->get("coupon_id");

        self::$order = Order::create([
            'user_id' => auth()->user()->id,
            'coupon_id' => $coupon_id,
            'amount' => self::$amount,
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
