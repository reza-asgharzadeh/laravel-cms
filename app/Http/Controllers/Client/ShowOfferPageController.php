<?php

namespace App\Http\Controllers\Client;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Carbon\Carbon;

class ShowOfferPageController extends Controller
{
    //create pagination from array
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

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

        $courses = $this->paginate($courses,9);

        return view('client.offer_page',compact('courses'));
    }
}
