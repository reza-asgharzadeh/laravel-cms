<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_approved',true)->orderByDesc('id')->take(6)->get();
        $posts = Post::where('is_approved',true)->orderByDesc('id')->take(6)->get();
        return view('client.landing',compact(['courses','posts']));
    }
}
