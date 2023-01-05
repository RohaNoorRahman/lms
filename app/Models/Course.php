<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curricullam;

class Course extends Model
{
    use HasFactory;


    public function curricullams(){
        return $this->hasMany(Curricullam::class,);
    }
}
