<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\Quiz;

class QuizEdit extends Component
{
    public $quiz;

    public $question_id;


    public function render()
    {
        $questions =Question::select(['id','name'])->whereNotIn('id',$this->quiz->questions->pluck('id')->toArray())->get();
        return view('livewire.quiz-edit',[
            'questions' =>$questions,
        ]);
        
    }



    public function addQuestion(){
        $this->quiz->questions()->attach($this->question_id);
        $this->question_id = "";

        flash()->addSuccess('Question Added Successfully');

        return redirect()->route('quiz.show', $this->quiz->id);
        
    }


    public function quizeQuestionDelete($id){
        $quiz =Quiz::findOrFail($this->quiz->id);
        $quiz->questions()->detach($id);

        flash()->addSuccess('Question Remove Success');
        return redirect()->route('quiz.show', $this->quiz->id);
    }
}
