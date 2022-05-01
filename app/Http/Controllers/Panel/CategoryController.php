<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Category\CreateCategoryRequest;
use App\Http\Requests\Panel\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function index()
    {
        Gate::authorize('view-categories');

        $childrenCategories = Category::where('category_id','!=',null)->paginate(5);
        $parentCategories = Category::where('category_id',null)->paginate(5);
        return view('panel.categories.index',compact(['childrenCategories', 'parentCategories']));
    }

    public function store(CreateCategoryRequest $request)
    {
        Gate::authorize('store-category');

        Category::create(
            $request->validated()
        );
        $request->session()->flash('status','دسته بندی جدید با موفقیت ایجاد شد !');
        return back();
    }

    public function edit(Category $category)
    {
        Gate::authorize('edit-categories');

        $ParentCategories = Category::where('category_id',null)->get();
        return view('panel.categories.edit',compact('category', 'ParentCategories'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        Gate::authorize('update-categories');

        $category->update(
            $request->validated()
        );
        $request->session()->flash('status','دسته بندی مورد نظر با موفقیت ویرایش شد !');
        return to_route('categories.index');
    }

    public function destroy(Request $request, Category $category)
    {
        Gate::authorize('delete-categories');

        $category->delete();
        $request->session()->flash('status','دسته بندی مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
