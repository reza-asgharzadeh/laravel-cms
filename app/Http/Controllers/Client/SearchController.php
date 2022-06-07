<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'post'){
            $posts = Post::where('title','LIKE',"%{$request->search}%")->orWhere('content','LIKE',"%{$request->search}%")->paginate(9);
            $postsCount = $posts->total();
            return view('client.search.search_posts',compact('posts','postsCount'));
        }

        if ($request->type == 'course'){
            $courses = Course::where('name','LIKE',"%{$request->search}%")->orWhere('content','LIKE',"%{$request->search}%")->paginate(9);
            $coursesCount = $courses->total();
            return view('client.search.search_courses',compact('courses','coursesCount'));
        }
    }
}
