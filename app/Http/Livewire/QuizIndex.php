<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Quiz;
use Livewire\WithPagination;
class QuizIndex extends Component
{
    
    public function render()
    {
        $quizes =Quiz::paginate(10);
        return view('livewire.quiz-index',[
            'quizes' => $quizes,
        ]);
    }




    public function quizDelete($id){
        $quiz =Quiz::findOrFail($id);
        $quiz->delete();

        flash()->addSuccess('Quiz Deleted Successfully');

    }
}
