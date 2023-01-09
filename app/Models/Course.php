<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curricullam;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'price',
        'user_id',
        'image',
    ];


    public function curricullams(){
        return $this->hasMany(Curricullam::class,);
    }

    public function students(){
        return $this->belongsToMany(User::class,'course_student','course_id','user_id');
    }
}
