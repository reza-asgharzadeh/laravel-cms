<?php

namespace App\Http\Controllers;

use App\Models\Category;

class ShowCategoryCourseController extends Controller
{
    public function show(Category $category)
    {
        $courses = $category->courses()->paginate();
        return view('category',compact('courses'));
    }
}
