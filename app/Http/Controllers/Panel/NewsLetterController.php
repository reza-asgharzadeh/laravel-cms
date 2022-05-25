<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\NewsLetter\CreateNewsLetterRequest;
use App\Http\Requests\Panel\NewsLetter\UpdateNewsLetterRequest;
use App\Models\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function index()
    {
        $newsletters = NewsLetter::orderByDesc('id')->paginate(5);
        return view('panel.newsletters.index',compact('newsletters'));
    }

    public function store(CreateNewsLetterRequest $request)
    {
        if ($request->email){
            NewsLetter::create([
                'email' => $request->email
            ]);
            return response()->json(["success"=>"ایمیل شما با موفقیت ثبت شد."]);
        }
    }

    public function edit(NewsLetter $newsletter)
    {
        return view('panel.newsletters.edit',compact('newsletter'));
    }

    public function status(Request $request, NewsLetter $newsletter)
    {
        $newsletter->update([
            'status' => ! $newsletter->status
        ]);

        $request->session()->flash('status','وضعیت خبرنامه با موفقیت تغییر کرد !');
        return to_route('newsletters.index');
    }

    public function update(UpdateNewsLetterRequest $request, NewsLetter $newsletter)
    {

        $newsletter->update([
            'email' => $request->email
        ]);

        $request->session()->flash('status','ایمیل خبرنامه مورد نظر با موفقیت ویرایش شد !');
        return to_route('newsletters.index');
    }

    public function destroy(NewsLetter $newsletter, Request $request)
    {
        $newsletter->delete();
        $request->session()->flash('status','خبرنامه مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
