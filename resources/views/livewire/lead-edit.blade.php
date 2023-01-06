<div>

    <form action="" class="mb-6" wire:submit.prevent="submitForm">

        <div class="flex mb-4 -mx-4">
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Name</label>
            <input wire:model="name" type="text" class="lms-input" >
        
    
             @error('name')
               <span class="text-red-400 text-sm mt-1">{{$message}}</span>
             @enderror
    
            </div>
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Email</label>
                <input wire:model="email" type="email" class="lms-input" >
            
        
                 @error('email')
                   <span class="text-red-400 text-sm mt-1">{{$message}}</span>
                 @enderror
        
            </div>
            <div class="flex-1 px-4">
    
                <label for="" class="lms-label">Phone</label>
                <input wire:model="phone" type="tel" class="lms-input" >
            
        
                 @error('phone')
                   <span class="text-red-400 mt-1 text-sm">{{$message}}</span>
                 @enderror
            </div>
        </div>
    
        

        @include('./components.wire-loading-btn')
    
    </form>
    
    
    <h1 class="font-bold text-xl mb-4">Notes</h1>
    

    @foreach ($notes as $note )
        <div class="flex justify-between mb-4 items-center py-2 px-4 border-2  border-gray-200 rounded-md">
            <p class=" text-gray-700 font-semibold text-lg ">{{$note->description}}</p>

        <form onsubmit="return confirm('Are You Sure ?')" wire:submit.prevent="noteDelete({{$note->id}})" action="">
            <button wire:model.lazy class="mt-1 text-red-400" type="submit">@include('./components.icons.trash')</button>
        </form>
        </div>

    @endforeach


    <form wire:submit.prevent="addNote" action="">
        <div class="mb-6">
            <textarea placeholder="Type Note" class="lms-input" wire:model.lazy="note"></textarea>
        </div>

        <button class="lms-btn" type="submit">Save Note</button>
    </form>
    

</div>