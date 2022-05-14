<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Episode;
use App\Models\Page;
use App\Models\Post;

class SitemapController extends Controller
{
    public function index()
    {
        $pages = Page::where('is_approved', true)->get(['slug','updated_at']);
        $posts = Post::get(['slug','updated_at']);
        $courses = Course::get(['slug','updated_at']);
        $episodes = Episode::with('course:id,slug')->get();
        $categories = Category::get(['slug','updated_at']);

        return response()->view('client.sitemap',compact(
            'pages',
            'posts',
            'courses',
            'episodes',
            'categories'
        ))->header('Content-Type', 'text/xml');
    }
}
