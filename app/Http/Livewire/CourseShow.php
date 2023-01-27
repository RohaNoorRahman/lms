<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Curricullam;

class CourseShow extends Component
{

   public $course_id;

    public function render()
    {
        $course = Course::where('id', $this->course_id)->first();
        $curricullams =Curricullam::where('course_id',$this->course_id)->get();
        

        return view('livewire.course-show',[
            'course' => $course,
            'curricullams' => $curricullams,
            
        ]);
    }


    public function classDelete($id){
        $class =Curricullam::find($id);
        $class->delete();

        flash()->addSuccess('class Deleted ');
    }
}
