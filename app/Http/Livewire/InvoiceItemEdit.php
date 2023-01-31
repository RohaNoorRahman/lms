<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InvoiceItem;

class InvoiceItemEdit extends Component
{
    public $invoice_id;
    public$invoice;
    public function mount(){
        $this->invoice =InvoiceItem::findOrFail($this->invoice_id);
    }
    public function render()
    {
        
        return view('livewire.invoice-item-edit');
    }
}
