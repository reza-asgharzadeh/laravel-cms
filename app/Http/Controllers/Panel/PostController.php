<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Post\CreatePostRequest;
use App\Http\Requests\Panel\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{

    public function index()
    {
        Gate::authorize('view-posts');

        if (auth()->user()->role_id === 1){
            $posts = Post::orderByDesc('id')->paginate(5);
        } else {
            $posts = auth()->user()->posts()->orderByDesc('id')->paginate(5);
        }
        return view('panel.posts.index',compact('posts'));
    }

    public function create()
    {
        Gate::authorize('create-post');

        $categories = category::all();
        $tags = Tag::all();
        return view('panel.posts.create',compact(['categories', 'tags']));
    }

    public function store(CreatePostRequest $request)
    {
        Gate::authorize('store-post');

        $tag_id = Tag::whereIn('name',$request->tags)->pluck('id')->toArray();

        if(count($tag_id) < 1 ){
            throw ValidationException::withMessages([
                'tags' => ['برچسب یافت نشد']
            ]);
        }

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        $file = $request->file('banner');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('images/posts/'.$data['slug'],$file_name,'public_files');
        $data['banner'] = $file_name;

        $post = Post::create(
            $data
        );

        $category_id = $request->categories;
        $post->categories()->sync($category_id);
        $post->tags()->sync($tag_id);

        $request->session()->flash('status','مقاله جدید با موفقیت ایجاد شد !');
        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        Gate::authorize('edit-posts');

        $this->authorize('view', $post);
        $postTags = $post->tags()->pluck('id')->toArray();
        $tags = Tag::all();

        $postCategories = $post->categories()->pluck('id')->toArray();
        $categories = Category::all();

        return view('panel.posts.edit',compact('post','postTags','tags','postCategories','categories'));
    }

    public function isApproved(Request $request, Post $post)
    {
        Gate::authorize('is-approved-posts');

        $post->update([
            'is_approved' => ! $post->is_approved
        ]);

        $request->session()->flash('status','وضعیت انتشار مقاله با موفقیت تغییر کرد !');
        return to_route('posts.index');
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update-posts');

        $data = $request->validated();

        if ($request->tags){
            $tag_id = Tag::whereIn('name',$request->tags)->pluck('id')->toArray();

            if(count($tag_id) < 1 ){
                throw ValidationException::withMessages([
                    'tags' => ['برچسب یافت نشد']
                ]);
            }
        } else {
            unset($data['tags']);
        }

        if ($post->slug != $data['slug']){
            if (file_exists("images/posts/".$post->slug."/".$post->banner)) {
                File::move("images/posts/" . $post->slug, "images/posts/" . $data['slug']);
            }
        }

        if($request->hasFile('banner')){
            if (file_exists("images/posts/".$data['slug']."/".$post->banner)) {
                unlink("images/posts/".$data['slug']."/".$post->banner);
            }
            $file = $request->file('banner');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('images/posts/'.$data['slug'],$file_name,'public_files');
            $data['banner'] = $file_name;
        }

        $post->update(
            $data
        );

        $category_id = $request->categories;
        $post->categories()->sync($category_id);

        if ($request->tags){
            $post->tags()->sync($tag_id);
        }

        $request->session()->flash('status','مقاله مورد نظر با موفقیت ویرایش شد !');
        return to_route('posts.index');
    }

    public function destroy(Request $request, Post $post)
    {
        Gate::authorize('delete-posts');

        $post->delete();
        $request->session()->flash('status','مقاله مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
