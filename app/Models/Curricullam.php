<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeWork;
use App\Models\Attenance;

class Curricullam extends Model
{
    use HasFactory;


    public function homeWorks(){
        return $this->hasMany(homeWork::class,);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class,);
    }
}
