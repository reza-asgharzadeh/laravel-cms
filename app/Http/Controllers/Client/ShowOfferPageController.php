<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Carbon\Carbon;

class ShowOfferPageController extends Controller
{
    public function show()
    {
        $offers = Offer::with('courses')
            ->where('expiry_date', '>=', Carbon::now())
            ->where('is_approved',true)->get();

        $courses = [];
        foreach($offers as $offer) {
            foreach ($offer->courses as $course){
                $courses[] = $course;
            }
        }

        return view('client.offer_page',compact('courses'));
    }
}
