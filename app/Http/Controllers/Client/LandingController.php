<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::orderByDesc('id')->take(4)->get();
        $posts = Post::orderByDesc('id')->take(4)->get();
        return view('client.landing',compact(['courses','posts']));
    }
}
