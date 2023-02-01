<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function index() {
        return view('quiz.index');
    }


    public function create() {
        
         
    }


    public function store(Request $request){

        $quiz =$request->validate([
            'name' => 'required'
        ]);
        $created =Quiz::create($quiz);

        flash()->addSuccess('Quiz Created SuccessFull');

        return redirect()->route('quiz.index',$created->id);
    }

    public function show(Quiz $quiz){

       
        return view('quiz.show',[
            'quiz' => $quiz,
        ]);
    }


    public function quizShow($id){
        $quiz = Quiz::findOrFail($id);

        return view('quiz.quiz-show',[
            'quiz'=> $quiz,
        ]);
    }

    public function edit($id){
        return view('quiz.edit');
    }
}
