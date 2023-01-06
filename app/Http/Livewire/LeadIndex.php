<?php

namespace App\Http\Livewire;

use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Lead;



class LeadIndex extends Component
{
    public function render()
    {

        $leads = Lead::paginate(10);
        return view('livewire.lead-index',[
            'leads' => $leads,
        ]);
    }


    public function leadDelete($id,FlasherInterface $flasher){

        permission_check('lead-management');
        $lead =Lead::findOrFail($id);
        $lead->delete();


        $flasher->addSuccess('Leads Deleted');

        
    }
}
