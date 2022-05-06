<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Offer\CreateOfferRequest;
use App\Http\Requests\Panel\Offer\UpdateOfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OfferController extends Controller
{
    public function index()
    {
        Gate::authorize('view-offers');

        $offers = Offer::orderByDesc('id')->paginate(5);
        return view('panel.offers.index',compact('offers'));
    }

    public function create()
    {
        Gate::authorize('create-offer');

        return view('panel.offers.create');
    }

    public function store(CreateOfferRequest $request)
    {
        Gate::authorize('store-offer');

        $data = $request->validated();
        Offer::create(
            $data
        );

        $request->session()->flash('status','پیشنهاد تخفیف جدید با موفقیت ایجاد شد !');
        return to_route('offers.index');
    }

    public function show(Offer $offer)
    {
        //
    }

    public function edit(Offer $offer)
    {
        Gate::authorize('edit-offers');

        return view('panel.offers.edit',compact('offer'));
    }

    public function isApproved(Request $request, Offer $offer)
    {
        Gate::authorize('is-approved-offers');

        $offer->update([
            'is_approved' => ! $offer->is_approved
        ]);

        $request->session()->flash('status','وضعیت پیشنهاد تخفیف با موفقیت تغییر کرد !');
        return to_route('offers.index');
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        Gate::authorize('update-offers');

        $data = $request->validated();

        if (!$request->expiry_date){
            unset($data['expiry_date']);
        }

        $offer->update(
            $data
        );

        $request->session()->flash('status','پیشنهاد تخفیف مورد نظر با موفقیت ویرایش شد !');
        return to_route('offers.index');
    }

    public function destroy(Request $request, Offer $offer)
    {
        Gate::authorize('delete-offers');

        $offer->delete();
        $request->session()->flash('status','پیشنهاد تخفیف مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
