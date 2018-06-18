<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Answer;
use App\Question;

class QuestionController extends Controller
{
    //
    /**
     * QuestionController constructor.
     */
    public function __construct()
    {
        // this will protect every method (except index) in this controller with auth middleware
        // user must be logged in to pass
        $this->middleware('auth')->except('index');

        // this will protect every method (except index) in this controller with user.admin middleware
        // logged in user must be admin to pass
        $this->middleware('user.admin')->except('index');
    }

    public function index()
    {
        // $result = DB::table('questions')
        //     ->selectRaw('questions.*, COUNT(`answers`.`id`) AS answers_nr')
        //     ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
        //     ->groupBy('questions.id')
        //     ->get();
        $result = Question::latest()->get();

        // prepare the view for the list of questions
        $view = View('questions/index');
        // give the array of questions to the view
        // where it will be available as $questions
        $view->questions = $result;

        return $view;
    }

    public function show($question_id)
    {
        // "SELECT * FROM `questions` WHERE `id` = {$question_id}"
        $question = Question::find($question_id);

        // select from answers where id of question is the id of this question
        // "SELECT * FROM `answers` WHERE `question_id` = {$question_id}"
        // $answers = Answer::where('question_id', $question_id)
        //     ->oldest()
        //     ->get();
        $answers = $question->answers()->latest()->get();

        // prepare the view for the list of questions
        $view = view('questions/show');

        // give the answers to the view
        $view->answers = $answers;
        $view->question = $question;

        return $view;
    }

    public function create()
    {
        // prepare an empty Question object
        $question = new Question();

        $view = view('questions/create');
        $view->question = $question;
        return $view;
    }

    public function edit($id)
    {
        // retrieve an existing Question from DB or fail with 404
        $question = Question::findOrFail($id);

        $view = view('questions/create');
        $view->question = $question;
        return $view;
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'title' => 'required|min:10',
            'text'  => 'required'
        ]);

        if ($id) {
            $question = Question::findOrFail($id);
        } else {
            $question = new Question();
        }

        $question->fill([
            'title' => $request->input('title'),
            'text'  => $request->input('text')
        ]);

        // save the question into the database (automatically gets the AI id)
        $question->save();

        // flash a success message
        session()->flash('success_message', 'Success!');

        // redirect to detail of question using the AutoIncremented id
        return redirect()->action('QuestionController@edit', ['id' => $question->id]);
    }
}
