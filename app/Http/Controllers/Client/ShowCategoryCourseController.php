<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ShowCategoryCourseController extends Controller
{
    public function show(Category $category)
    {
        $courses = $category->courses()->paginate();
        return view('client.category',compact('courses'));
    }
}
