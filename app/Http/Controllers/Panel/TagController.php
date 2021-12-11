<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Tag\CreateTagRequest;
use App\Http\Requests\Panel\Tag\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::paginate(5);
        return view('panel.tags.index',compact('tags'));
    }

    public function store(CreateTagRequest $request)
    {
        Tag::create(
            $request->validated()
        );
        $request->session()->flash('status','برچسب جدید با موفقیت ایجاد شد !');
        return back();
    }

    public function edit(Tag $tag)
    {
        return view('panel.tags.edit',compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update(
            $request->validated()
        );
        $request->session()->flash('status','برچسب مورد نظر با موفقیت ویرایش شد !');
        return redirect()->route('tags.index');
    }

    public function destroy(Request $request,Tag $tag)
    {
        $tag->delete();
        $request->session()->flash('status','برچسب مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
