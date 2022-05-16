<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('client.cart');
    }

    public function addToCart($id)
    {
        $course = Course::where('is_approved',true)->findOrFail($id);
        $price = $course->price;

        if ($course->offer && $course->offer->expiry_date >= Carbon::now() && $course->offer->is_approved){
            $price = match ($course->offer->type) {
                'percent' => $price - ($price * $course->offer->value / 100),
                'fixed' => $price - $course->offer->value,
            };
        }

        $cart = session()->get('cart', []);

        if(!isset($cart[$id])) {
            $cart[$id] = [
                "name" => $course->name,
                "price" => $price,
                "image" => $course->getBanner()
            ];
        }
        session()->put('cart', $cart);
        return back()->with('success', 'دوره با موفقیت به سبد خرید افزوده شد');
    }

    public function update(Request $request){
        $total = collect(session("cart"))->sum("price");
        if ($request->id && $request->coupon_code) {
            $findCoupon = Coupon::where('code', $request->coupon_code)
                ->where('cart_value', "<=", $total)
                ->where('expiry_date', ">=", Carbon::now())
                ->whereColumn('quantity', ">=", 'used')
                ->where('is_approved', true)->first();

            if ($findCoupon != null) {

                if ($findCoupon->type == 'percent'){
                    $coupon = "کد تخفیف $findCoupon->value درصدی اعمال شد .";
                    $discount = $total * $findCoupon->value / 100;
                    $payable = $total - ($total * $findCoupon->value / 100);
                }

                if ($findCoupon->type == 'fixed'){
                    $coupon = "کد تخفیف $findCoupon->value تومانی اعمال شد .";
                    $discount = $findCoupon->value;
                    $payable = $total - $findCoupon->value;
                }

                if ($findCoupon->type == 'percent' && $findCoupon->value == 100 && $total > 0){
                    session()->put('newWalletValue',auth()->user()->wallet->value);
                    session()->put('discount',$discount);
                    session()->put('payable',$payable);
                    return response()->json(["coupon" => $coupon, "discount" => $discount, "payable" => $payable,"newWalletValue"=>session()->get('newWalletValue')]);
                }

                if (session()->get('payable') === 0){
                    return response()->json(["coupon" => 'مبلغ قابل پرداخت صفر تومان است.', "discount" => session()->get('discount') ?? 0, "payable" => 0]);
                }

                session()->put('coupon',$coupon);
                session()->put('discount',$discount);
                session()->put('coupon_id',$findCoupon->id);

                if (session()->get('wallet')){
                    if ($payable >= session()->get('wallet')){
                        $payable = $payable - session()->get('wallet');
                        session()->put('payable',$payable);
                    } else {
                        $payable = session()->get('wallet') - $payable;
                        session()->put('payable',$payable);
                    }
                }

                if (!session()->get('wallet')) {
                    session()->put('payable',$payable);
                }

                return response()->json(["coupon" => $coupon, "discount" => $discount, "payable" => $payable]);
            }
            return response()->json(["coupon" => 'کد تخفیف معتبر نیست.', "discount" => session()->get('discount') ?? 0, "payable" => session()->get('payable') ?? $total]);
        }
        return response()->json(["coupon" => 'کد تخفیف را وارد نکرده اید.', "discount" => session()->get('discount') ?? 0, "payable" => session()->get('payable') ?? $total]);
    }

    public function updateWallet(){
        $total = collect(session("cart"))->sum("price");
        $walletValue = auth()->user()->wallet->value;

        if (session()->get('payable') === 0){
            return response()->json(["payable"=>0, "newWalletValue"=>$walletValue]);
        }

        if ($walletValue > 0 && session()->get('wallet') == null) {
            if (session()->get('coupon')) {
                if ($walletValue > session()->get('payable')){
                    $payable = 0;
                    $newWalletValue = $walletValue - session()->get('payable');
                } else {
                    $payable = session()->get('payable') - $walletValue;
                    $discountPlusPayable = session()->get('discount') + $payable;
                    $newWalletValue = $walletValue - ($total - $discountPlusPayable);
                }
            }

            if (!session()->get('coupon')) {
                if ($walletValue > $total){
                    $payable = 0;
                    $newWalletValue = $walletValue - $total;
                } else {
                    $payable = $total - $walletValue;
                    $newWalletValue = $walletValue - ($total - $payable);
                }
            }

            session()->put('wallet',$walletValue);
            session()->put('newWalletValue',$newWalletValue);
            session()->put('payable',$payable);

            return response()->json(["payable"=>$payable, "newWalletValue"=>$newWalletValue]);
        }
        return response()->json(["payable"=>session()->get('payable') ?? $total, "newWalletValue"=>session()->get('newWalletValue') ?? $walletValue]);
    }

//    public function updates(Request $request)
//    {
//        if($request->id && $request->quantity){
//            $course = Course::find($request->id);
//            $price = $course->price * $request->quantity;
//            $cart = session()->get('cart');
//            $cart[$request->id]["quantity"] = $request->quantity;
//            session()->put('cart', $cart);
//            session()->flash('success', 'Cart updated successfully');
//            return response()->json(["price" => $price]);
//        }
//
//    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            $course = Course::find($request->id);
            $total = collect(session("cart"))->sum("price") - $course->price;
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            $count = count((array) session('cart'));
//                session()->flash('success', 'دوره با موفقیت از سبد خرید پاک شد');
            session()->forget(['coupon','coupon_id','discount','payable','wallet','newWalletValue']);
            return response()->json(["total" => $total,"successs"=>"دوره با موفقیت از سبد خرید پاک شد","discount"=>0,"payable"=>$total,"coupon"=>"اگر کد تخفیف دارید مجددا اعمال کنید.","count"=>$count,"idCart"=>$request->id]);
        }
    }
}
