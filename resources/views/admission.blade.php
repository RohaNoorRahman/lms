<x-app-layout>
    <x-slot name="header" class=" ">
        

        <div class="flex mb-4 justify-between">
            <h2 class="font-semibold inline-block text-xl text-gray-800 leading-tight">
                {{ __('Admission') }}
            </h2>

            <a href="{{route('lead.create')}}" class="font-bold text-lg bg-blue-600 text-white rounded-md px-4 py-2">Create Lead</a></div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   
                    <livewire:admission />


                   

                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
