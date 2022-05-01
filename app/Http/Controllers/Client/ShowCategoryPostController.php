<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ShowCategoryPostController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate();
        return view('client.category',compact('posts'));
    }
}
