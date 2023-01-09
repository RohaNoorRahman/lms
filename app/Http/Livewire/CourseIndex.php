<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    public function render()

    {
        $courses =Course::all();
        return view('livewire.course-index',[
            'courses' => $courses,
        ]);
    }



    public function courseDelete($id){
        $course =Course::findOrFail($id);
        $course->delete();

        flash()->addSuccess('Course Deleted SuccessFull');

    }
}
