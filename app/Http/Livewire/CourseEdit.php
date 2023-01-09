<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseEdit extends Component
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
    $this->image = $course->image;


   }
    public function render()
    {

       
        return view('livewire.course-edit');
    }

    protected $rules =[
        'name'=> 'required',
        'description'=> 'required',
        'price'=> 'required',
        'image'=> 'required',
    ];

    public function submitForm(){
        $this->validate();
        $course =Course::findOrFail($this->course_id);
        $course->name =$this->name;
        $course->description =$this->description;
        $course->price =$this->price;
        $course->image =$this->image;
        $course->save();


        flash()->addSuccess('Course Upadate Successfull');

        return redirect()->route('course.index');

    }



    
}
