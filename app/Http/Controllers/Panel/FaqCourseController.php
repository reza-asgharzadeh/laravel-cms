<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\FaqCourse\CreateFaqCourseRequest;
use App\Http\Requests\Panel\FaqCourse\UpdateFaqCourseRequest;
use App\Models\Course;
use App\Models\FaqCourse;
use Illuminate\Http\Request;

class FaqCourseController extends Controller
{
    public function index()
    {
        $faqCourses = FaqCourse::orderByDesc('id')->paginate(5);
        return view('panel.faq_courses.index',compact('faqCourses'));
    }

    public function create()
    {
        //        Gate::authorize('create-episode');
        $courses = Course::all();
        return view('panel.faq_courses.create',compact('courses'));
    }

    public function store(CreateFaqCourseRequest $request)
    {
        //        Gate::authorize('store-episode');
        FaqCourse::create(
            $request->validated()
        );
        $request->session()->flash('status','سوال متداول جدید با موفقیت ایجاد شد !');
        return to_route('faq-courses.index');
    }

    public function showFaqCourse(FaqCourse $faqCourse)
    {
        $course = $faqCourse->course()->first();
        return view('panel.faq_courses.faq_course',compact('course'));
    }

    public function edit(FaqCourse $faqCourse)
    {
        //        Gate::authorize('edit-episodes');

        $courses = Course::all();
        return view('panel.faq_courses.edit',compact(['faqCourse','courses']));
    }

    public function update(UpdateFaqCourseRequest $request, FaqCourse $faqCourse)
    {
        //        Gate::authorize('update-episodes');

        $faqCourse->update(
            $request->validated()
        );
        $request->session()->flash('status','سوال متداول مورد نظر با موفقیت ویرایش شد !');
        return to_route('faq-courses.index');
    }

    public function destroy(FaqCourse $faqCourse, Request $request)
    {
        //        Gate::authorize('delete-episodes');

        $faqCourse->delete();
        $request->session()->flash('status','سوال متداول مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
