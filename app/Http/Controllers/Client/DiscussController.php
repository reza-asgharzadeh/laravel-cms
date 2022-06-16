<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Answer\CreateAnswerRequest;
use App\Http\Requests\Panel\Question\CreateQuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class DiscussController extends Controller
{
    public function index()
    {
        $discuss = Question::orderByDesc('id')->paginate(5);
        return view('client.discuss.index',compact('discuss'));
    }

    public function create()
    {
        return view('client.discuss.create');
    }

    public function store(CreateQuestionRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = str_replace(" ", "-", $data['title']);
        $data['user_id'] = auth()->user()->id;
        Question::create(
            $data
        );
        $request->session()->flash('status','پرسش جدید با موفقیت ایجاد شد لطفا منتظر پاسخ باشید!');
        return to_route('discuss.index');
    }

    public function replyDiscussion(Question $question)
    {
        return view('client.discuss.reply_discussion',compact('question'));
    }

    public function answerDiscussion(CreateAnswerRequest $request, Question $question)
    {
        $data = $request->validated();
        $data['question_id'] = $question->id;
        $data['user_id'] = auth()->user()->id;
        Answer::create(
            $data
        );
        return back();
    }

    public function edit(Question $question)
    {
        //
    }

    public function update(Request $request, Question $question)
    {
        //
    }

    public function destroy(Question $question)
    {
        //
    }
}
