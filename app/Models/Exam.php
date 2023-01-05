<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HomeWorks;

class Exam extends Model
{
    use HasFactory;


    public function homeWorks(){
        return $this->hasMany(homeWork::class,);
    }
}
