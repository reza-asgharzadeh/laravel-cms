<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Offer\CreateOfferRequest;
use App\Http\Requests\Panel\Offer\UpdateOfferRequest;
use App\Models\Course;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderByDesc('id')->paginate(5);
        return view('panel.offers.index',compact('offers'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('panel.offers.create',compact('courses'));
    }

    public function store(CreateOfferRequest $request)
    {
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
        $courses = Course::all();
        return view('panel.offers.edit',compact('offer','courses'));
    }

    public function isApproved(Request $request, Offer $offer)
    {
        $offer->update([
            'is_approved' => ! $offer->is_approved
        ]);

        $request->session()->flash('status','وضعیت پیشنهاد تخفیف با موفقیت تغییر کرد !');
        return to_route('offers.index');
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
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
        $offer->delete();
        $request->session()->flash('status','پیشنهاد تخفیف مورد نظر با موفقیت حذف شد !');
        return back();
    }
}