<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Episode\CreateEpisodeRequest;
use App\Http\Requests\Panel\Episode\UpdateEpisodeRequest;
use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index()
    {
        $episodes = Episode::paginate(5);
        return view('panel.episodes.index',compact('episodes'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('panel.episodes.create',compact('courses'));
    }

    public function store(CreateEpisodeRequest $request)
    {
        Episode::create(
            $request->validated()
        );
        $request->session()->flash('status','جلسه جدید با موفقیت ایجاد شد !');
        return redirect()->route('episodes.index');
    }

    public function edit(Episode $episode)
    {
        $courses = Course::all();
        return view('panel.episodes.edit',compact(['episode','courses']));
    }

    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        $episode->update(
            $request->validated()
        );
        $request->session()->flash('status','جلسه مورد نظر با موفقیت ویرایش شد !');
        return redirect()->route('episodes.index');
    }

    public function destroy(Request $request, Episode $episode)
    {
        $episode->delete();
        $request->session()->flash('status','جلسه مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
