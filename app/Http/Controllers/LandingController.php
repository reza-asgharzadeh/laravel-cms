<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::orderByDesc('id')->take(4)->get();
        $posts = Post::orderByDesc('id')->take(4)->get();

        $id1 = Post::latest()->first()->id;
        $id2 = Post::latest()->first()->id - 1;
        $id3 = Post::latest()->first()->id - 2;
        $id4 = Post::latest()->first()->id - 3;

        $question1 = Post::where('id',$id1)->first();
        $question2 = Post::where('id',$id2)->first();
        $question3 = Post::where('id',$id3)->first();
        $question4 = Post::where('id',$id4)->first();

        return view('landing',compact(['courses','posts','question1','question2','question3','question4']));
    }
}
