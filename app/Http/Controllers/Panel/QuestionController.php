<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Question\CreateQuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::where('user_id',auth()->user()->id)->paginate(5);
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
        return redirect()->route('questions.index');
    }

    public function show(Question $question)
    {
        return view('panel.questions.show',compact('question'));
    }
}
