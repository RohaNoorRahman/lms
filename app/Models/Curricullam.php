<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeWork;
use App\Models\Attendance;
use App\Models\Curricullam;
use App\Models\Course;

class Curricullam extends Model
{
    use HasFactory;


    public function homeWorks(){
        return $this->hasMany(homeWork::class,);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class,);
    }

    public function notes(){
        return $this->belongsToMany(Curricullam::class,'curricullam_note','curricullam_id','note_id');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function presentStudents(){
        return Attendance::where('class_id',$this->id)->count();
    }
}
