<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Tag\CreateTagRequest;
use App\Http\Requests\Panel\Tag\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{

    public function index()
    {
        Gate::authorize('view-tags');

        $tags = Tag::paginate(5);
        return view('panel.tags.index',compact('tags'));
    }

    public function store(CreateTagRequest $request)
    {
        Gate::authorize('store-tag');

        Tag::create(
            $request->validated()
        );
        $request->session()->flash('status','برچسب جدید با موفقیت ایجاد شد !');
        return back();
    }

    public function edit(Tag $tag)
    {
        Gate::authorize('edit-tags');

        return view('panel.tags.edit',compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        Gate::authorize('update-tags');

        $tag->update(
            $request->validated()
        );
        $request->session()->flash('status','برچسب مورد نظر با موفقیت ویرایش شد !');
        return to_route('tags.index');
    }

    public function destroy(Request $request,Tag $tag)
    {
        Gate::authorize('delete-tags');

        $tag->delete();
        $request->session()->flash('status','برچسب مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
