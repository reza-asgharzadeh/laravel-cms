<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Course\CreateCourseRequest;
use App\Http\Requests\Panel\Course\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CourseController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_id === 1){
            $courses = Course::orderByDesc('id')->paginate(5);
        } else {
            $courses = auth()->user()->courses()->orderByDesc('id')->paginate(5);
        }
        return view('panel.courses.index',compact('courses'));
    }

    public function create()
    {
        $categories = category::all();
        $tags = Tag::all();
        return view('panel.courses.create',compact(['categories','tags']));
    }

    public function store(CreateCourseRequest $request)
    {
        $tag_id = Tag::whereIn('name',$request->tags)->get()->pluck('id')->toArray();

        if(count($tag_id) < 1 ){
            throw ValidationException::withMessages([
                'tags' => ['برچسب یافت نشد']
            ]);
        }

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        $file = $request->file('banner');
        $file_name = $file->getClientOriginalName();
        $file->storeAs('courses/banner',$file_name,'public_files');
        $data['banner'] = $file_name;

        $course = Course::create(
            $data
        );

        $category_id = $request->categories;
        $course->categories()->sync($category_id);
        $course->tags()->sync($tag_id);

        $request->session()->flash('status','دوره جدید با موفقیت ایجاد شد !');
        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        $this->authorize('view', $course);
        $courseTags = $course->tags()->pluck('id')->toArray();
        $tags = Tag::all();

        $courseCategories = $course->categories()->pluck('id')->toArray();
        $categories = Category::all();

        return view('panel.courses.edit',compact('course','courseTags','tags','courseCategories','categories'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $tag_id = Tag::whereIn('name',$request->tags)->get()->pluck('id')->toArray();

        if(count($tag_id) < 1 ){
            throw ValidationException::withMessages([
                'tags' => ['برچسب یافت نشد']
            ]);
        }

        $data = $request->validated();

        if ($request->hasFile('banner')){
            $file = $request->file('banner');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('courses/banner',$file_name,'public_files');
            $data['banner'] = $file_name;
        }

        $course->update(
          $data
        );

        $category_id = $request->categories;
        $course->categories()->sync($category_id);
        $course->tags()->sync($tag_id);

        $request->session()->flash('status','دوره مورد نظر با موفقیت ویرایش شد !');
        return redirect()->route('courses.index');
    }

    public function destroy(Request $request, Course $course)
    {
        $course->delete();
        $request->session()->flash('status','دوره مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
