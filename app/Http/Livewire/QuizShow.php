<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuizShow extends Component
{
    public $quiz;
    public $answer;
    public $answered =[];
    public $answerOptions =[
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d'];

    public function render()
    {
        return view('livewire.quiz-show');
    }

    public function check(){
        $question_id = explode(',' , $this->answer)[1];
        $question =Question::findOrFail($question_id);
        
        
        if($question->correct_answer == explode(',', $this->answer)[0]){
            flash()->addSuccess('Well Done Correct Answer');
            $correct = true;
        }else{
            flash()->addError('Wrong Answer');
            $correct = false;
        }

        $this->answered[$question->id] = $correct;
    }
}
