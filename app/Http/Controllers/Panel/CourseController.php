<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Course\CreateCourseRequest;
use App\Http\Requests\Panel\Course\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class CourseController extends Controller
{
    public function index()
    {
        Gate::authorize('view-courses');

        if (auth()->user()->role_id === 1){
            $courses = Course::orderByDesc('id')->paginate(5);
        } else {
            $courses = auth()->user()->courses()->orderByDesc('id')->paginate(5);
        }
        return view('panel.courses.index',compact('courses'));
    }

    public function create()
    {
        Gate::authorize('create-course');

        $categories = category::all();
        $tags = Tag::all();
        $offers = Offer::all();
        return view('panel.courses.create',compact(['categories','tags','offers']));
    }

    public function store(CreateCourseRequest $request)
    {
        Gate::authorize('store-course');

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
        $file->storeAs('course/banner',$file_name,'public_files');
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

    public function showCourseChapters(Course $course)
    {
        Gate::authorize('view-course-chapters');

        $chapters = $course->chapters()->paginate(5);
        return view('panel.courses.course_chapters',compact('chapters'));
    }

    public function showCourseFaqs(Course $course)
    {
        Gate::authorize('view-course-faqs');

        $faqCourses = $course->fagCourses()->paginate(5);
        return view('panel.courses.course_faqs',compact('faqCourses'));
    }

    public function myCourses()
    {
        Gate::authorize('view-my-courses');

        $orders = auth()->user()->orders()->where('order_status',1)->paginate(10);
        return view('panel.courses.my_courses',compact('orders'));
    }

    public function edit(Course $course)
    {
        Gate::authorize('edit-courses');

        $this->authorize('view', $course);
        $courseTags = $course->tags()->pluck('id')->toArray();
        $tags = Tag::all();

        $courseCategories = $course->categories()->pluck('id')->toArray();
        $categories = Category::all();

        $offers = Offer::all();

        return view('panel.courses.edit',compact('course','courseTags','tags','courseCategories','categories','offers'));
    }

    public function isApproved(Request $request, Course $course)
    {
        Gate::authorize('is-approved-courses');

        $course->update([
            'is_approved' => ! $course->is_approved
        ]);

        $request->session()->flash('status','وضعیت انتشار دوره با موفقیت تغییر کرد !');
        return to_route('courses.index');
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        Gate::authorize('update-courses');

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

        if ($request->hasFile('banner')){
            $file = $request->file('banner');
            $file_name = $file->getClientOriginalName();
            $file->storeAs('course/banner',$file_name,'public_files');
            $data['banner'] = $file_name;
        }

        $course->update(
          $data
        );

        $category_id = $request->categories;
        $course->categories()->sync($category_id);

        if ($request->tags){
            $course->tags()->sync($tag_id);
        }

        $request->session()->flash('status','دوره مورد نظر با موفقیت ویرایش شد !');
        return redirect()->route('courses.index');
    }

    public function destroy(Request $request, Course $course)
    {
        Gate::authorize('delete-courses');

        $course->delete();
        $request->session()->flash('status','دوره مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
