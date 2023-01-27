<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurricullamController extends Controller
{
    public function show($id){
        
        return view('course.curricullam.show',[
            'id' => $id,
        ]);
    }


    public function edit($id){
        return view('course.curricullam.edit',[
            'id' => $id,
        ]);
    }
}
