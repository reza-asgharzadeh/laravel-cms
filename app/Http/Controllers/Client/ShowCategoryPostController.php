<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ShowCategoryPostController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->where('is_approved',true)->paginate(9);
        return view('client.post_category',compact('category','posts'));
    }
}
