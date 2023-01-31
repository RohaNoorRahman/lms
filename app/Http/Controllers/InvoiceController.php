<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;




class InvoiceController extends Controller
{
    public function index(){

        
        return view('invoice.index');
    }

    public function edit($id){

        return view('user.invoice.edit',[
            'invoice_id' => $id,
        ]);
    }

    public function show($id){
        // $Dbinvoice =Invoice::findOrFail($id);



        // $customer = new Buyer([
        //     'name'          => $Dbinvoice->user->name,
        //     'custom_fields' => [
        //         'email' => $Dbinvoice->user->email,
        //     ],
        // ]);

        // $items=[];
        // foreach($Dbinvoice->items as $item){
        //     $items[] =(new InvoiceItem())->title($item->name)->pricePerUnit($item->price);
        // }

        // $invoice =\LaravelDaily\Invoices\Invoice::make()
        //     ->buyer($customer)->currencySymbol('$')->currencyCode('USD')->addItems($items);
            

        // return $invoice->stream();


        
        return view('user.invoice.show',[
            'invoice_id' => $id,
        ]);
    }


    
}
