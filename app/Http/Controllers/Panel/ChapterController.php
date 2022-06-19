<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Chapter\CreateChapterRequest;
use App\Http\Requests\Panel\Chapter\UpdateChapterRequest;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChapterController extends Controller
{
    public function index()
    {
        Gate::authorize('view-chapters');

        $chapters = Chapter::orderByDesc('id')->paginate(5);
        return view('panel.chapters.index',compact('chapters'));
    }

    public function create()
    {
        Gate::authorize('create-chapter');

        $courses = Course::all();
        return view('panel.chapters.create',compact('courses'));
    }

    public function store(CreateChapterRequest $request)
    {
        Gate::authorize('store-chapter');

        Chapter::create(
            $request->validated()
        );
        $request->session()->flash('status','فصل جدید با موفقیت ایجاد شد !');
        return to_route('chapters.index');
    }

    public function showChapterEpisodes(Chapter $chapter)
    {
        Gate::authorize('view-chapter-episodes');

        $episodes = $chapter->episodes()->paginate(5);
        return view('panel.chapters.chapter_episodes',compact('episodes'));
    }

    public function showChapterCourse(Chapter $chapter)
    {
        Gate::authorize('view-chapter-course');

        $course = $chapter->course()->first();
        return view('panel.chapters.chapter_course',compact('course'));
    }

    public function edit(Chapter $chapter)
    {
        Gate::authorize('edit-chapters');

        $courses = Course::all();
        return view('panel.chapters.edit',compact(['chapter','courses']));
    }

    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        Gate::authorize('update-chapters');

        $chapter->update(
            $request->validated()
        );
        $request->session()->flash('status','فصل مورد نظر با موفقیت ویرایش شد !');
        return to_route('chapters.index');
    }

    public function destroy(Chapter $chapter, Request $request)
    {
        Gate::authorize('delete-chapters');

        $chapter->delete();
        $request->session()->flash('status','فصل مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
