<div>
    <form class="w-1/3 mx-auto px-6 py-6  rounded-md bg-gradient-to-r from-blue-500 to-cyan-500" wire:submit.prevent="createLead">
        <div class="mb-4">
            @include('components.form-field',[
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'placeholder' => 'Lead Name',
        'required' => 'required',
    ])
        </div>

        <div class="mb-4">
            @include('components.form-field',[
        'name' => 'email',
        'label' => 'Email',
        'type' => 'email',
        'placeholder' => 'Lead Email',
        'required' => 'required',
    ])
        </div>

        <div class="mb-4">
            @include('components.form-field',[
        'name' => 'number',
        'label' => 'Number',
        'type' => 'number',
        'placeholder' => 'Lead Number',
        'required' => 'required',
    ])
        </div>

        

        <button type="submit" class="w-full py-2 bg-white text-cyan-600 font-bold">Create Lead</button>
    </form>
</div>
