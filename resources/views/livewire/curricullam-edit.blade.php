<div>
    <form wire:submit.prevent="formSubmit">
        
            <div class="mb-4">
                @include('components.form-field',[
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Enter Class Name',
            'required' => 'required',

        ])
           </div>
            @include('components.wire-loading-btn')

    </form>
        
</div>
