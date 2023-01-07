<div>
    <table class="w-full tableDesign table-auto">
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Id</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2 text-left">Due Date</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Paid</th>
            <th class="border px-4 py-2">Due</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($invoices as $invoice)

        <tr>
            <td class="border font-semibold px-4 py-2">{{$invoice->id}}</td>
            <td class="border px-4 py-2">{{$invoice->user->name}}</td>
            <td class="border px-4 py-2">{{date('F j,Y',strtotime($invoice->due_date))}}</td>
            <td class="border px-4 py-2 text-center">${{$invoice->amount()['total']}}</td>
            <td class="border px-4 py-2 text-center">${{$invoice->amount()['paid']}}</td>
            <td class="border px-4 py-2 text-center">${{$invoice->amount()['due']}}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="text-red-400" href="">
                        @include('./components.icons.edit')
                        </a>
        
                        <a class="px-3 text-red-400" href="{{route('invoice-show',$invoice->id)}}">
                        @include('./components.icons.eye')
                        </a>

                        <form onsubmit="return confirm('Are You Sure ?')" wire:submit.prevent="invoiceDelete({{$invoice->id}})" action="">
                            <button wire:model.lazy class="mt-1 text-red-400" type="submit">@include('./components.icons.trash')</button>
                        </form>
                </div>
            </td>
        </tr>

        @endforeach
    </table>

    <div class="mt-6">
        {{$invoices->links()}}
    </div>
</div>
