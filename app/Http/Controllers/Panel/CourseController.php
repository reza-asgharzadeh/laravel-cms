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

//    public function payment(Course $course)
//    {
//        $merchant_id = "25161ef6-aa88-4a3b-acb9-3962e080d1b7";
//        $price = $course->price * 10;
//        $course_name = $course->name;
//
//        $data = array("merchant_id" => $merchant_id,
//            "amount" => $price,
//            "callback_url" => "http://localhost:8000/payment/course/checker",
//            "description" => $course_name,
//            "metadata" => [ "email" => "info@email.com","mobile"=>"09121111111"],
//        );
//        $jsonData = json_encode($data);
//        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
//        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//            'Content-Type: application/json',
//            'Content-Length: ' . strlen($jsonData)
//        ));
//
//        $result = curl_exec($ch);
//        $err = curl_error($ch);
//        $result = json_decode($result, true, JSON_PRETTY_PRINT);
//        curl_close($ch);
//
//
//
//        if ($err) {
//            echo "cURL Error #:" . $err;
//        } else {
//            if (empty($result['errors'])) {
//                if ($result['data']['code'] == 100) {
//                    return redirect('https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
//                }
//            } else {
//                echo'Error Code: ' . $result['errors']['code'];
//                echo'message: ' .  $result['errors']['message'];
//            }
//        }
//    }
//
//    public function checker(Course $course)
//    {
//        $price = $course->price * 10;
//        $merchant_id = "25161ef6-aa88-4a3b-acb9-3962e080d1b7";
//        $Authority = $_GET['Authority'];
//
//        $data = array("merchant_id" => $merchant_id, "authority" => $Authority, "amount" => $price);
//        $jsonData = json_encode($data);
//        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
//        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//            'Content-Type: application/json',
//            'Content-Length: ' . strlen($jsonData)
//        ));
//
//        $result = curl_exec($ch);
//        $err = curl_error($ch);
//        curl_close($ch);
//        $result = json_decode($result, true);
//        if ($err) {
//            echo "cURL Error #:" . $err;
//        } else {
//            if ($result['data']['code'] == 100) {
//                echo 'Transation success. RefID:' . $result['data']['ref_id'];
//            } else {
//                echo'code: ' . $result['errors']['code'];
//                echo'message: ' .  $result['errors']['message'];
//            }
//        }
//    }
}
