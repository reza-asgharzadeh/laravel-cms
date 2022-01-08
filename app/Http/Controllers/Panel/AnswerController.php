<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Answer\CreateAnswerRequest;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    public function store(CreateAnswerRequest $request,Question $question)
    {
        dd($question->id);
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['question_id'] = $request->id;
        Answer::create(
            $data
        );

        Question::update([
            'question_status' => 1
        ]);
    }
}
