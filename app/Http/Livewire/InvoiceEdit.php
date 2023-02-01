<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Payment;
use Stripe\StripeClient; 

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


    public function paymentItemDelete($id){
        $payment =Payment::findOrFail($id);
        $payment->delete();
        flash()->addSuccess("Payment Item Deleted");

        return redirect()->back();
    }










    public function invoiceItemDelete($id){
        $item =InvoiceItem::findOrFail($id);
        $item->delete();

        flash()->addSuccess('Item Deleted Success');

        return redirect(route('invoice-show',$this->invoice_id));
    }


    public function refund($payment_id) {
        $payment =Payment::findOrFail($payment_id);

        if(strlen($payment->transection_id) === 12){
            $payment->delete();
            flash()->addSuccess('Payment Refund Success');
        }else{
            $stripe =new StripeClient(env('STRIPE_SECRET'));
            $stripe->refunds->create([
                'charge' => $payment->transection_id,
            ]);
            $payment->delete();
            flash()->addSuccess('Payment Refund Success');
        }

        return redirect(route('invoice-show',$this->invoice_id));
    }
}
