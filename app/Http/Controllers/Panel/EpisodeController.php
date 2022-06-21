<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Episode\CreateEpisodeRequest;
use App\Http\Requests\Panel\Episode\UpdateEpisodeRequest;
use App\Models\Chapter;
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

        $chapters = Chapter::all();
        return view('panel.episodes.create',compact('chapters'));
    }

    public function store(CreateEpisodeRequest $request)
    {
        Gate::authorize('store-episode');

        Episode::create(
            $request->validated()
        );
        $request->session()->flash('status','جلسه جدید با موفقیت ایجاد شد !');
        return to_route('episodes.index');
    }

    public function showEpisodeChapter(Episode $episode)
    {
        Gate::authorize('view-episode-chapter');

        $chapter = $episode->chapter()->first();
        return view('panel.episodes.episode_chapter',compact('chapter'));
    }

    public function edit(Episode $episode)
    {
        Gate::authorize('edit-episodes');

        $chapters = Chapter::all();
        return view('panel.episodes.edit',compact(['episode','chapters']));
    }

    public function update(UpdateEpisodeRequest $request, Episode $episode)
    {
        Gate::authorize('update-episodes');

        $episode->update(
            $request->validated()
        );
        $request->session()->flash('status','جلسه مورد نظر با موفقیت ویرایش شد !');
        return to_route('episodes.index');
    }

    public function destroy(Request $request, Episode $episode)
    {
        Gate::authorize('delete-episodes');

        $episode->delete();
        $request->session()->flash('status','جلسه مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
