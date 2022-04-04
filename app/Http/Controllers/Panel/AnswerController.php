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
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['question_id'] = $question->id;
        Answer::create(
            $data
        );

        if(auth()->user()->id != $question->user_id && auth()->user()->role_id == 1){
            $question->update([
                'answer_status' => 1
            ]);
        } else {
            $question->update([
                'answer_status' => 0
            ]);
        }
        $request->session()->flash('status','پرسش شما با موفقیت ایجاد شد لطفا منتظر پاسخ باشید!');
        return to_route('questions.index');
    }
}
