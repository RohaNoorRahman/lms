<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class InvoiceEdit extends Component
{
    public $invoice_id;
    public $invoice;
    public $name;
    public $price;
    public $quantity;
    public $total;

    public $enableItem = false;

    public function mount(){
        $this->invoice =Invoice::findOrFail($this->invoice_id);
        $this->total += $this->price;
    }
    public function render()
    {
        
        return view('livewire.invoice-edit');
    }

    protected $rules=[
        'name' => 'required',
        'price' => 'required',
        'quantity' => 'required',
    ];

    public function addNewItem(){
        $this->enableItem =! $this->enableItem;
    }


    public function saveItem(){
        $this->validate();
        InvoiceItem::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'invoice_id' => $this->invoice_id,
        ]);

        $this->name = '';
        $this->price = '';
        $this->quantity = '';
        $this->addNewItem();


        flash()->addSuccess("Item Addedd Success");

        return redirect(route('invoice-show',$this->invoice_id));
    }










    public function invoiceItemDelete($id){
        $item =InvoiceItem::findOrFail($id);
        $item->delete();

        flash()->addSuccess('Item Deleted Success');

        return redirect(route('invoice-show',$this->invoice_id));
    }
}
