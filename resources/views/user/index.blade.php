<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Users') }}
            </h2>

            <div class="flex items-center">
                <a class="lms-btn mr-4" href="{{route('role.index')}}">Add Role</a>
                <a class="lms-btn" href="{{route('user.create')}}">Add New User</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <livewire:user-index/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
