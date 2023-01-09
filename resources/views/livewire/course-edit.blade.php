<div>
    <form action="" class="mb-6" wire:submit.prevent="submitForm">

        <div class="flex flex-col space-y-2 mb-4 -mx-4">
            <div class="flex-1 px-4">
                

             @include('components.form-field',[
                'name' => 'name',
                'type' => 'text',
                'label' => "Course Name",
                'required' => true,
                'placeholder' => 'Course Name'
             ])
    
            </div>
            <div class="flex-1 px-4">
                @include('components.form-field',[
                'name' => 'description',
                'type' => 'textarea',
                'label' => "Course Description",
                'required' => true,
                'placeholder' => 'Course description'
             ])
        
            </div>

            <div class="flex-1 px-4">
                @include('components.form-field',[
                'name' => 'image',
                'type' => 'text',
                'label' => "Course image",
                'required' => true,
                'placeholder' => 'Course Image'
             ])
        
            </div>

            <div class="flex-1 px-4">
                @include('components.form-field',[
                'name' => 'price',
                'type' => 'number',
                'label' => "Course Price",
                'required' => true,
                'placeholder' => 'Course Name'
             ])
        
            </div>

            

        </div>

        
    
        

       <div class="text-center">
        @include('./components.wire-loading-btn')
       </div>
    
    </form>
</div>
