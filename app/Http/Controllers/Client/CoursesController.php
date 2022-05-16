<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_approved',true)->paginate(9);
        return view('client.courses',compact('courses'));
    }
}
