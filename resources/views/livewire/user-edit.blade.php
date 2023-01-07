<div>
    <form action="" class="mb-6" wire:submit.prevent="submitForm">

        <div class="flex mb-4 -mx-4">
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Name</label>
            <input wire:model.lazy="name" type="text" class="lms-input" >
        
    
             @error('name')
               <span class="text-red-400 text-sm mt-1">{{$message}}</span>
             @enderror
    
            </div>
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Email</label>
                <input wire:model.lazy="email" type="email" class="lms-input" >
            
        
                 @error('email')
                   <span class="text-red-400 text-sm mt-1">{{$message}}</span>
                 @enderror
        
            </div>

            

        </div>

        <div class="flex-1 w-1/3 flex-col mx-auto py-4 flex items-center px-4">
            <label for="role" class="lms-label">User Role</label>
            <select wire:model.lazy="selectedRole" id="role" class="lms-input">
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
        
                
            </select>
            @error('selectedRole')
                   <span class="text-red-400 text-sm mt-1">{{$message}}</span>
                 @enderror
           </div>
    
        </div>
    
        

       <div class="text-center">
        @include('./components.wire-loading-btn')
       </div>
    
    </form>
</div>
