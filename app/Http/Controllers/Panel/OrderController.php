<?php

namespace App\Http\Controllers\Panel;

use App\Http\RandomUniqueCode;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends TransactionController
{
    public function index(Request $request)
    {
        Gate::authorize('view-orders');

        $user = auth()->user();

        if(isset($request->order_status)) {
            $orders = $user->orders()->where('order_status', $request->order_status)->orderByDesc('id')->paginate(10);
        } else {
            $orders = $user->orders()->orderByDesc('id')->paginate(10);
        }

        return view('panel.orders.index',compact('orders'));
    }

    public function order()
    {
        $cart = collect(session("cart"));
        $ids = $cart->keys();
        $amount = session()->get("payable") ?? $cart->sum("price");
        $coupon_id = session()->get("coupon_id");

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'coupon_id' => $coupon_id,
            'amount' => $amount,
            'order_code' => RandomUniqueCode::randomString(6),
        ]);
        $order->courses()->sync($ids);

        return $this->invoice($order,$order->amount,'course');
    }

    public static function update($record){
        $order = Order::where('id',$record->paymentable_id)->first();

        $order->update([
            'order_status' => 1
        ]);
    }
}
