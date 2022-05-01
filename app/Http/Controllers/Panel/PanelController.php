<?php
namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Episode;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Question;
use App\Models\Role;
use App\Models\Tag;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class PanelController extends Controller
{
    public function index()
    {
        Gate::authorize('view-dashboard');

        $users_count = User::count();
        $comments_count = Comment::count();
        $posts_count = Post::count();
        $courses_count = Course::count();
        $episodes_count = Episode::count();
        $categories_count = Category::count();
        $tags_count = Tag::count();
        $roles_count = Role::count();
        $permissions_count = Permission::count();
        $tickets_count = Ticket::count();
        $questions_count = Question::count();

        return view('panel.panel',compact(['users_count', 'comments_count', 'posts_count', 'courses_count', 'episodes_count', 'categories_count', 'tags_count', 'roles_count', 'permissions_count','tickets_count','questions_count']));
    }
}
