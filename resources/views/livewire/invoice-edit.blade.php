<div>
    <h2 class="font-bold text-lg">Information</h2>


    <h1 class="text-md font-bold text-gray-600 my-1">Name : {{$invoice->user->name}}</h1>
    <h1 class="text-md font-bold text-gray-600">Email : {{$invoice->user->email}}</h1>

    <table class="w-full my-6 table-design table-auto">
        <tr>
            <th class="px-4 border text-left py-2">Name</th>
            <th class="px-4 border py-2">Price</th>
            <th class="px-4 border py-2">Quantity</th>
            <th class="px-4 border text-right py-2">Total</th>
            <th class="px-4 border py-2">Action</th>
        </tr>

        @foreach ($invoice->items as $item)
            <tr>
                <td class="px-4 border py-2">{{$item->name}}</th>
                <td class="px-4 border text-center py-2">${{number_format($item->price,2)}}</td>
                <td class="px-4 border text-center py-2">{{$item->quantity}}</td>
                <td class="px-4 border text-right py-2">${{number_format($item->price * $item->quantity , 2)}}</td>
                <td class="px-4 border py-2">
                    <div class="flex items-center justify-center">
                        <a class="text-red-400 mr-2" href="">
                            @include('./components.icons.edit')
                            </a>
                        <form onsubmit="return confirm('Are you sure ');" wire:submit.prevent="invoiceItemDelete({{$item->id}})" action="">
                            <button wire:model.delay.long class="mt-1  text-red-400" type="submit">@include('./components.icons.trash')</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        <tr>
            <td class="lms-cell-border text-right font-bold text-gray-700" colspan="3">Total</td>
            <td class="lms-cell-border text-left font-bold text-gray-700" colspan="2">${{number_format($invoice->amount()['total'],2)}}</td>
            
        </tr>

        <tr>
            <td class="lms-cell-border text-right font-bold text-gray-700" colspan="3">Paid</td>
            <td class="lms-cell-border text-left font-bold text-gray-700" colspan="2">- ${{number_format($invoice->amount()['paid'],2)}}</td>
            
        </tr>

        <tr>
            <td class="lms-cell-border text-right font-bold text-gray-700" colspan="3">Due</td>
            <td class="lms-cell-border text-left font-bold text-gray-700" colspan="2">${{number_format($invoice->amount()['due'],2)}}</td>
            
        </tr>
    </table>



    

    @if ($enableItem)
    
    <div class="text-center mb-4">
        <h1 class="text-lg font-bold text-gray-600 mb-2 text-center border-b-2 border-gray-400 pb-2 inline-block  w-2/12 mx-auto">Add New Item</h1>
    </div>

    <form wire:submit.prevent="saveItem">
        <div class="flex mb-4">
            <div class="w-full">
                @include('components.form-field',[
                    'name' => 'name',
                    'label' => 'Name',
                    'type' => 'text',
                    'placeholder' => 'Item Name',
                    'required' => 'required',
        
                ])
            </div>
            <div class="min-w-max ml-4">
                @include('components.form-field',[
                    'name' => 'quantity',
                    'label' => 'Quantity',
                    'type' => 'number',
                    'placeholder' => 'Item Quantity',
                    'required' => 'required',
        
                ])
            </div>

            <div class="min-w-max ml-4">
                @include('components.form-field',[
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'placeholder' => 'Item Price',
                    'required' => 'required',
        
                ])
            </div>

            
        </div>

        @include('components.wire-loading-btn')

        <button type="button" wire:click="addNewItem" class="font-bold text-gray-600 ml-3 ">Remove Item Form</button>
    </form>
    @else
    <button class="underline mb-4 text-lg text-gray-800" wire:click="addNewItem">Add Item</button>
    @endif


    @if (count($invoice->payment)>0)
    <h1 class="text-lg font-bold text-gray-600 text-center mb-4">Payments Informaiton</h1>

    <table class="w-full tableDesign my-6 table-auto">
        <tr>
            <th class="lms-cell-border">Date</th>
            <th class="lms-cell-border"> Amount</th>
            <th class="lms-cell-border">Delete</th>
        </tr>

        @foreach ($invoice->payment as $payment)
            <tr>
                <td class="lms-cell-border text-center"> {{date('F j,Y g:i:a', strtotime($payment->created_at))}}</td>
                <td class="lms-cell-border text-center">${{number_format($payment->amount,2)}}</td>
                <td class="lms-cell-border text-center">
                    <form onsubmit="return confirm('Are you sure ');" wire:submit.prevent="paymentItemDelete({{$payment->id}})" action="">
                        <button wire:model.delay.long class="mt-1  text-red-400" type="submit">@include('./components.icons.trash')</button>
                    </form>
                </td>
            </tr>

        @endforeach
    </table>

    @else
    <h1 class="text-lg font-bold text-gray-600 text-center mb-4">Payments Now</h1>

    @endif
    
</div>
