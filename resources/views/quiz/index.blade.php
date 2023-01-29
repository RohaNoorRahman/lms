<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Quize') }}
            </h2>


        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('quiz.store') }}" method="post" class="mb-6">
                        @csrf
                        <label for="name" class="lms-label">Add Quize</label>
                        <input type="text" class="lms-input" name="name" placeholder="Quize Name">
                        <button type="submit" class="lms-btn mt-4">Add Quize</button>

                    </form>

                    <livewire:quiz-index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
