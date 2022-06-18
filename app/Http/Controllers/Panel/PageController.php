<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Page\CreatePageRequest;
use App\Http\Requests\Panel\Page\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    public function index()
    {
        Gate::authorize('view-pages');

        $pages = Page::orderByDesc('id')->paginate(5);
        return view('panel.pages.index',compact('pages'));
    }

    public function create()
    {
        Gate::authorize('create-page');

        return view('panel.pages.create');
    }

    public function store(CreatePageRequest $request)
    {
        Gate::authorize('store-page');

        $data = $request->validated();

        $file = $request->file('banner');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('pages/banner',$file_name,'public_files');
        $data['banner'] = $file_name;

        Page::create(
            $data
        );

        $request->session()->flash('status','صفحه تکی جدید با موفقیت ایجاد شد !');
        return to_route('pages.index');
    }

    public function show(Page $page)
    {
        if($page->is_approved){
            return view('client.page',compact('page'));
        }
        abort(404);
    }

    public function edit(Page $page)
    {
        Gate::authorize('edit-pages');

        return view('panel.pages.edit',compact('page'));
    }

    public function isApproved(Request $request, Page $page)
    {
        Gate::authorize('is-approved-pages');

        $page->update([
            'is_approved' => ! $page->is_approved
        ]);

        $request->session()->flash('status','وضعیت انتشار صفحه تکی با موفقیت تغییر کرد !');
        return to_route('pages.index');
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        Gate::authorize('update-pages');

        $data = $request->validated();

        if ($request->hasFile('banner')){
            $file = $request->file('banner');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('pages/banner',$file_name,'public_files');
            $data['banner'] = $file_name;
        }

        $page->update(
            $data
        );

        $request->session()->flash('status','صفحه تکی مورد نظر با موفقیت ویرایش شد !');
        return to_route('pages.index');
    }

    public function destroy(Page $page, Request $request)
    {
        Gate::authorize('delete-pages');

        $page->delete();
        $request->session()->flash('status','صفحه تکی مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
