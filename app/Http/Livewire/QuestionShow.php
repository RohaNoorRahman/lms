<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuestionShow extends Component
{
    public $question_id;
    public $name;
    public $answer_a;
    public $answer_b;
    public $answer_c;
    public $answer_d;
    public $correct_answer;
    public $answers =['a','b','c','d'];

    public function mount(){
        $question = Question::where('id',$this->question_id)->first();

        $this->name = $question->name;
        $this->answer_a = $question->answer_a;
        $this->answer_b = $question->answer_b;
        $this->answer_c = $question->answer_c;
        $this->answer_d = $question->answer_d;
        $this->correct_answer = $question->correct_answer;
    }
    public function render()
    {
        return view('livewire.question-show');
    }
}
