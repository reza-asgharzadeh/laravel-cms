<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Question\CreateQuestionRequest;
use App\Models\Question;
use App\Models\User;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = auth()->user()->questions()->orderByDesc('id')->paginate(5);
        return view('panel.questions.index',compact('questions'));
    }

    public function create()
    {
        return view('panel.questions.create');
    }

    public function store(CreateQuestionRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Question::create(
            $data
        );
        $request->session()->flash('status','پرسش جدید با موفقیت ایجاد شد لطفا منتظر پاسخ باشید!');
        return to_route('questions.index');
    }

    public function show(Question $question)
    {
        $questions = auth()->user()->questions()->where('id',$question->id)->get();
        return view('panel.questions.show',compact(['question','questions']));
    }
}
