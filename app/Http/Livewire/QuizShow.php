<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuizShow extends Component
{
    public $quiz;
    public $answer;

    public function render()
    {
        return view('livewire.quiz-show');
    }

    public function check(){
        $question_id = explode(',' , $this->answer)[1];
        $question =Question::findOrFail($question_id);
        
        if($question->correct_answer == explode(',', $this->answer)[0]){
            flash()->addSuccess('Well Done Correct Answer');
        }else{
            flash()->addError('Wrong Answer');
        }
    }
}
