<?php

namespace App\Http\Controllers;

use App\Models\Category;

class ShowCategoryPostController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate();
        return view('category',compact('posts'));
    }
}
