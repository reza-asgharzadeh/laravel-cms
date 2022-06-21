<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Question\CreateQuestionRequest;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    public function index()
    {
        Gate::authorize('view-questions');

        if (auth()->user()->role_id == 1){
            $questions = Question::orderByDesc('id')->paginate(5);
        } else {
            $questions = auth()->user()->questions()->orderByDesc('id')->paginate(5);
        }
        return view('panel.questions.index',compact('questions'));
    }

    public function create()
    {
        Gate::authorize('create-question');

        return view('panel.questions.create');
    }

    public function store(CreateQuestionRequest $request)
    {
        Gate::authorize('store-question');

        $data = $request->validated();
        $data['slug'] = str_replace(" ", "-", $data['title']);
        $data['user_id'] = auth()->user()->id;
        Question::create(
            $data
        );
        $request->session()->flash('status','پرسش جدید با موفقیت ایجاد شد لطفا منتظر پاسخ باشید!');
        return to_route('questions.index');
    }

    public function show(Question $question)
    {
        Gate::authorize('read-questions');

        $this->authorize('view', $question);

        return view('panel.questions.show',compact('question'));
    }
}
