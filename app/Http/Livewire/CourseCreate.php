<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Curricullam;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DateInterval;
use DatePeriod;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CourseCreate extends Component
{
    public $name;
    public $description;
    public $price;
    public $selectedDays =[];
    public $time;
    public $end_date;
    public $image;


    public $days =[
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Sataurday',
    ];

    protected $rules=[
        'name' => 'required',
        'description'=> 'required',
        'price'=> 'required',
        'image' => 'required',

    ];


    public function formSubmit(){
      
        $this->validate();

        $course =Course::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'user_id' =>Auth::user()->id,
            'image'=>$this->image,

            
        ]);

        $course_id =$course->id;
        foreach($this->selectedDays as $day){
            $i = 1;
            $startDate= new DateTime(Carbon::now());
            $endDate = new DateTime($this->end_date);
            $interval = new DateInterval('P1D');

            $date_range = new DatePeriod($startDate,$interval,$endDate);

            foreach($date_range as $date){
                if($date->format("I")==='Sunday'){
                    $curricullam = Curricullam::create([
                        'name' =>$this->name.' '.$i++,
                        'course_id' => $course_id,
                    ]);
                }
            }
            $i++;
        }

        flash()->addSuccess('course Create Successfully');

        return redirect()->route('course.index');



    }


   








    public function render()
    {
        return view('livewire.course-create');
    }




   
}
