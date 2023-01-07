<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use Livewire\WithPagina;

class InvoiceIndex extends Component
{
    public function render()
    {

        $invoices = Invoice::paginate(50);
        return view('livewire.invoice-index',[
            'invoices' => $invoices,
        ]);
    }



    public function invoiceDelete($id){
        $invoice =Invoice::findOrFail($id);
        $invoice->delete();

        flash()->addSuccess('Invoice Deleted Successfully');
    }
}
