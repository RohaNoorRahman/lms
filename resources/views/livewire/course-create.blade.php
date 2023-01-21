<form wire:submit.prevent="formSubmit">


    <div class="flex items-center mb-7 justify-between -mx-4">


        <div class="px-4">
            @include('components.form-field',[
            'name' => 'name',
            'label' => 'Course Name',
            'type' => 'text',
            'placeholder' => 'Enter Course Name',
            'required' => 'required',
        ])
        </div>

        <div class="px-4">
            @include('components.form-field',[
            'name' => 'image',
            'label' => 'Course image',
            'type' => 'text',
            'placeholder' => 'Image Url',
            'required' => 'required',
        ])
        </div>

        <div class="px-4">
            @include('components.form-field',[
            'name' => 'price',
            'label' => 'Course Price',
            'type' => 'number',
            'placeholder' => 'Enter Course Price',
            'required' => 'required',
        ])
        </div>


    </div>

    

    <div class="mb-6">
        @include('components.form-field',[
        'name' => 'description',
        'label' => 'Course Description',
        'type' => 'textarea',
        'placeholder' => 'Enter Course Description',
        'required' => 'required',
    ])
    </div>

    

    <div class="flex mb-6 items-center">
        <div class="w-full mr-4">
            <label class="lms-label" for="">Days</label>

        <div class="flex items-center flex-wrap -mx-4">
            @foreach ($days as $day)

            <div class="px-4 min-w-max flex items-center">
                <input wire:model.delay.long="selectedDays" type="checkbox" class="mr-2 cursor-pointer" value="{{$day}}" id="{{$day}}"><label for="{{$day}}" class="font-semibold text-gray-800 text-md cursor-pointer">{{ucfirst($day)}}</label>

            </div>
                
            @endforeach
        </div>

        </div>
        <div class="min-w-max">
            <div class="">
                @include('components.form-field',[
                'name' => 'time',
                'label' => 'Time',
                'type' => 'time',
                'placeholder' => 'Enter time',
                'required' => 'required',
            ])
            </div>
            </div>

            <div class="min-w-max ml-4">
                <div class="">
                    @include('components.form-field',[
                    'name' => 'end_date',
                    'label' => 'End Date',
                    'type' => 'date',
                    'placeholder' => 'Enter time',
                    'required' => 'required',
                ])
                </div>
            
           </div>

    </div>



    @include('components.wire-loading-btn')
</form>
