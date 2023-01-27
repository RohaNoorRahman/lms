<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Curricullam;
use App\Models\Note;

class CurricullamShow extends Component
{
    public $curricullam_id;
    public $note;

    protected $rules=[
        'note' =>'required',
    ];

    public function render()
    {
        $curricullam =Curricullam::findOrFail($this->curricullam_id);
        return view('livewire.curricullam-show',[
            'curricullam' =>$curricullam,
            'notes'=>$curricullam->notes,
        ]);
    }



    public function addNote(){
        $this->validate();
        $curricullam = Curricullam::findOrFail($this->curricullam_id);
        $note =new note();
        $note->description =$this->note;
        $note->save();
        $curricullam->notes()->attach($note->id);
        $this->note = '';

        flash()->addSuccess('Note Addedd Successfully');

    }
}
