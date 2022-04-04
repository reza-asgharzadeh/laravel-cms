<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use App\Models\Question;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::orderByDesc('id')->take(4)->get();
        $posts = Post::orderByDesc('id')->take(4)->get();

        $id1 = Question::latest()->first()->id;
        $id2 = Question::latest()->first()->id - 1;
        $id3 = Question::latest()->first()->id - 2;
        $id4 = Question::latest()->first()->id - 3;

        $question1 = Question::where('id',$id1)->first();
        $question2 = Question::where('id',$id2)->first();
        $question3 = Question::where('id',$id3)->first();
        $question4 = Question::where('id',$id4)->first();

        return view('landing',compact(['courses','posts','question1','question2','question3','question4']));
    }
}
