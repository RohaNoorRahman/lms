<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lead;

class LeadCreate extends Component
{
    public $name;
    public $email;
    public $number;
    public function render()
    {
        
        return view('livewire.lead-create');
    }

    public function createLead(){
        $lead =Lead::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->number,
        ]);

        flash()->addSuccess('lead Created Successfully');

        return redirect()->route('lead.index');
    }
}

