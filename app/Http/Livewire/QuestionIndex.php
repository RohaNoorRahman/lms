<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuestionIndex extends Component
{
    public function render()
    {
        $questions =Question::all();
        return view('livewire.question-index',[
            'questions' => $questions,
        ]);
    }



    public function questionDelete($id){
        $question =Question::findOrFail($id);
        $question->delete();

        flash()->addSuccess('Question Deleted Successfully');
    }
}
