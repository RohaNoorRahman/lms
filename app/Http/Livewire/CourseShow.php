<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseShow extends Component
{

   public $course_id;

    public function render()
    {
        $course = Course::where('id', $this->course_id)->first();
        

        return view('livewire.course-show',[
            'course' => $course,
            
        ]);
    }
}
