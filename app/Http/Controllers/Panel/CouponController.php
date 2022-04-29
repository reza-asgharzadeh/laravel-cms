<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Coupon\CreateCouponRequest;
use App\Http\Requests\Panel\Coupon\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderByDesc('id')->paginate(5);
        return view('panel.coupons.index',compact('coupons'));
    }

    public function create()
    {
        return view('panel.coupons.create');
    }

    public function store(CreateCouponRequest $request)
    {
        $data = $request->validated();
        Coupon::create(
            $data
        );

        $request->session()->flash('status','کد تخفیف جدید با موفقیت ایجاد شد !');
        return to_route('coupons.index');
    }

    public function show(Coupon $coupon)
    {
        //
    }

    public function edit(Coupon $coupon)
    {
//        $this->authorize('view', $coupon);
        return view('panel.coupons.edit',compact('coupon'));
    }

    public function isApproved(Request $request, Coupon $coupon)
    {
        $coupon->update([
            'is_approved' => ! $coupon->is_approved
        ]);
        $request->session()->flash('status','وضعیت کد تخفیف با موفقیت تغییر کرد !');
        return to_route('coupons.index');
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $data = $request->validated();

        if (!$request->expiry_date){
            unset($data['expiry_date']);
        }

        $coupon->update(
            $data
        );

        $request->session()->flash('status','کد تخفیف مورد نظر با موفقیت ویرایش شد !');
        return to_route('coupons.index');
    }

    public function destroy(Request $request, Coupon $coupon)
    {
        $coupon->delete();
        $request->session()->flash('status','کد تخفیف مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
