<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Curricullam;

class CurricullamEdit extends Component
{
    public $curricullam_id;
    public $name;

    public function mount(){
        $curricullam =Curricullam::findOrFail($this->curricullam_id);
        $this->name = $curricullam->name;
    }

    protected $rules=[
        'name' => 'required'
    ];


    public function render()
    {
        
        return view('livewire.curricullam-edit');
    }


    public function formSubmit(){
        $this->validate();
        $curricullam =Curricullam::findOrFail($this->curricullam_id);
        $curricullam->name= $this->name;
        $curricullam->save();

        flash()->addSuccess('curricullam Updated Successfull');

        return redirect(route('course.index'));

    }
}
