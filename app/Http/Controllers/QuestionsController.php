<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use Illuminate\Support\Facades\Input;
class QuestionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the questions dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('questions.home',["questions" => $questions]);
    }
    /**
     * Show the specific question.
     *
     * @return \Illuminate\Http\Response
     */
    public function specific($id)
    {
        $question = Question::where('id',$id)->get();

        $answers = Answer::where('question_id',$id)->get();

        $users = [];

        foreach($answers as $answer){
            $users[] = User::where('id',$answer->user_id)->get();
        }

        return view('questions.question',
            [
            "question" => $question,
            "answers" => $answers,
            "users" => $users
            ]
        );
    }
    /**
     * Show the specific question.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_a_question()
    {
        return view('questions.add-a-question');
    }
    /**
     * Show the specific question.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $question = new Question();
        $question->fill( $request->all() );
        $question->save();
        return view("home");
    }
    /**
     * Show the specific question.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddAnswer(Request $request)
    {
        $answer = new Answer();
        $answer->fill( $request->all() );
        $answer->save();
        return view("home");
    }
}
