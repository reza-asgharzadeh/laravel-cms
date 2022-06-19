<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Coupon\CreateCouponRequest;
use App\Http\Requests\Panel\Coupon\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CouponController extends Controller
{
    public function index()
    {
        Gate::authorize('view-coupons');

        $coupons = Coupon::orderByDesc('id')->paginate(5);
        return view('panel.coupons.index',compact('coupons'));
    }

    public function create()
    {
        Gate::authorize('create-coupon');

        return view('panel.coupons.create');
    }

    public function store(CreateCouponRequest $request)
    {
        Gate::authorize('store-coupon');

        $data = $request->validated();
        Coupon::create(
            $data
        );

        $request->session()->flash('status','کد تخفیف جدید با موفقیت ایجاد شد !');
        return to_route('coupons.index');
    }

    public function edit(Coupon $coupon)
    {
        Gate::authorize('edit-coupons');
//        $this->authorize('view', $coupon);
        return view('panel.coupons.edit',compact('coupon'));
    }

    public function isApproved(Request $request, Coupon $coupon)
    {
        Gate::authorize('is-approved-coupons');

        $coupon->update([
            'is_approved' => ! $coupon->is_approved
        ]);
        $request->session()->flash('status','وضعیت کد تخفیف با موفقیت تغییر کرد !');
        return to_route('coupons.index');
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        Gate::authorize('update-coupons');

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
        Gate::authorize('delete-coupons');

        $coupon->delete();
        $request->session()->flash('status','کد تخفیف مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
