<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\FaqCourse\CreateFaqCourseRequest;
use App\Http\Requests\Panel\FaqCourse\UpdateFaqCourseRequest;
use App\Models\Course;
use App\Models\FaqCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FaqCourseController extends Controller
{
    public function index()
    {
        Gate::authorize('view-faqs');

        $faqCourses = FaqCourse::orderByDesc('id')->paginate(5);
        return view('panel.faq_courses.index',compact('faqCourses'));
    }

    public function create()
    {
        Gate::authorize('create-faq');

        $courses = Course::all();
        return view('panel.faq_courses.create',compact('courses'));
    }

    public function store(CreateFaqCourseRequest $request)
    {
        Gate::authorize('store-faq');

        FaqCourse::create(
            $request->validated()
        );
        $request->session()->flash('status','سوال متداول جدید با موفقیت ایجاد شد !');
        return to_route('faq-courses.index');
    }

    public function showFaqCourse(FaqCourse $faqCourse)
    {
        Gate::authorize('view-faq-course');

        $course = $faqCourse->course()->first();
        return view('panel.faq_courses.faq_course',compact('course'));
    }

    public function edit(FaqCourse $faqCourse)
    {
        Gate::authorize('edit-faqs');

        $courses = Course::all();
        return view('panel.faq_courses.edit',compact(['faqCourse','courses']));
    }

    public function update(UpdateFaqCourseRequest $request, FaqCourse $faqCourse)
    {
        Gate::authorize('update-faqs');

        $faqCourse->update(
            $request->validated()
        );
        $request->session()->flash('status','سوال متداول مورد نظر با موفقیت ویرایش شد !');
        return to_route('faq-courses.index');
    }

    public function destroy(FaqCourse $faqCourse, Request $request)
    {
        Gate::authorize('delete-faqs');

        $faqCourse->delete();
        $request->session()->flash('status','سوال متداول مورد نظر با موفقیت حذف شد !');
        return back();
    }
}
