<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
class CourseShow extends Component
{
   public $name;
   public $description;
   public $course_id;
   public $price;
   public $image;

   public function mount(){
    $course = Course::findOrFail($this->course_id);
    $this->course_id =$course->id;
    $this->name = $course->name;
    $this->description =$course->description;
    $this->price = $course->price;
    $this->image =$course->image;
   }

    public function render()
    {

        return view('livewire.course-show');
    }
}
