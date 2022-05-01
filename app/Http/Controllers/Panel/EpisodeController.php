<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Episode\CreateEpisodeRequest;
use App\Http\Requests\Panel\Episode\UpdateEpisodeRequest;
use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EpisodeController extends Controller
{
    public function index()
    {
        Gate::authorize('view-episodes');

        $episodes = Episode::orderByDesc('id')->paginate(5);
        return view('panel.episodes.index',compact('episodes'));
    }

    public function create()
    {
        Gate::authorize('create-episode');

        $courses = Course::all();
        return view('panel.episodes.create',compact('courses'));
    }

    public function store(CreateEpisodeRequest $request)
    {
        Gate::authorize('store-episode');

        Episode::create(
            $request->validated()
        );
        $request->session()->flash('status','جلسه جدید با موفقیت ایجاد شد !');
        return redirect()->route('episodes.index');
    }

    public function edit(Episode $episode)
    {
        Gate::authorize('edit-episodes');

        $courses = Course::all();
        return view('panel.episodes.edit',compact(['episode','courses']));
    }

    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        Gate::authorize('update-episodes');

        $episode->update(
            $request->validated()
        );
        $request->session()->flash('status','جلسه مورد نظر با موفقیت ویرایش شد !');
        return redirect()->route('episodes.index');
    }

    public function destroy(Request $request, Episode $episode)
    {
        Gate::authorize('delete-episodes');

        $episode->delete();
        $request->session()->flash('status','جلسه مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
