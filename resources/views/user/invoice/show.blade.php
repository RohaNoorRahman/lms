<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <livewire:invoice-edit :invoice_id="$invoice->id" />


                    @if($invoice->amount()['due'] > 0)
                        
                    

                    <form action="{{route('stripe-payment')}}" method="post" class="flex rounded-md flex-col paymentFrom w-1/3 mx-auto py-4 px-6 bg-gradient-to-r from-cyan-500 to-blue-500">
                        @csrf
                        <h1 class="mb-2  text-center text-lg font-bold text-white">Add Payment</h1>
                        <div class="w-full mb-4">
                            <label for="name" class="d-block font-bold mb-2 cursor-pointer text-md text-gray-100">name</label>
                            <input name="name" type="text" placeholder="type your name" id="name" class="lms-input">
                        </div>

                        <div class="flex">
                            <div class="w-full min-w-max flex-1 mb-4">
                                <label for="country" class="d-block font-bold mb-2 cursor-pointer text-md text-gray-100">Country</label>
                                <input name="country" type="text" placeholder="type your Country" id="country" class="lms-input">
                            </div>
                            <div class="w-full  ml-4 flex-1 mb-4">
                                <label for="city" class="d-block font-bold mb-2 cursor-pointer text-md text-gray-100">City</label>
                                <input name="city" type="text" placeholder="type your City" id="city" class="lms-input">
                            </div>
                        </div>
                        
                        <div class="w-full">
                            <label for="card_number" class="d-block font-bold cursor-pointer mb-2 text-md text-gray-100">Card Number</label>
                            <input name="card_no" type="number" placeholder="Card Number" id="card_number" class="lms-input">
                        </div>

                        <div class="flex my-4">
                            <div class="w-full  flex-1 ">
                                <label for="card_expire" class="d-block font-bold mb-2 cursor-pointer text-md text-gray-100">Expire Month</label>
                                <input name="card_exp_m" type="number" placeholder="Expire Month" id="card_expire" class="lms-input">
                            </div>
                            <div class="w-full  ml-4 flex-1 ">
                                <label for="card_expire_y" class="d-block font-bold mb-2 cursor-pointer text-md text-gray-100">Expire Year</label>
                                <input name="card_exp_y" type="number" placeholder="Expire Year" id="card_expire_y" class="lms-input">
                            </div>

                        </div>

                        <div class="flex mb-4">
                            <div class="w-full flex-1 min-w-max">
                                <label for="ccv" class="d-block font-bold mb-2 cursor-pointer text-md text-gray-100">Card CCV</label>
                                <input name="card_ccv" type="number" placeholder="CCV" id="ccv" class="lms-input">
                            </div>
                            <div class="w-full ml-4 flex-1 ">
                                <label for="amount" class="d-block font-bold mb-2 cursor-pointer text-md text-gray-100">Amount</label>
                                <input name="amount" value="{{number_format($invoice->amount()['due'],2)}}" type="number" placeholder="Amount" id="amount" class="lms-input">
                            </div>
                        </div>

                        <input type="hidden" name="invoice_id" value="{{$invoice->id}}" >

                        

                        <button class=" font-bold bg-gray-200 text-blue-600 text-lg w-full text-center my-3 py-2 rounded-md">Pay Now</button>
                    </form>


                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
