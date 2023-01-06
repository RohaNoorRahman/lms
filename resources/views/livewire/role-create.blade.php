<form wire:submit.prevent='formSubmit'>
    
    <div class="flex-1 mb-4 px-4">
        <label for="name" class="lms-label">Role Name</label>
        <input wire:model="name" type="text" id="name" class="lms-input" >
    

         @error('name')
           <span class="text-red-400 text-sm mt-1">{{$message}}</span>
         @enderror





         <h1 class="font-semibold mt-4 text-xl text-gray-700">Permissions</h1>

 
         <div class="flex -mx-4 mt-4 flex-wrap">
             @foreach ($permissions  as $permission )
                 <div class="w-1/3 mb-2 px-4">
                 
                 <label  class="inline-flex items-center" for="">
     
                     <input wire:model.lazy="selectedPermissions" type="checkbox" class="form-checkbox" value="{{$permission->id}}">
                     <span class="ml-2">{{$permission->name}}</span>
                 </label>
                 </div>
             @endforeach

             @error('selectedPermissions')
           <span class="text-red-400 text-sm inline-block ml-4 mb-2 mt-1">{{$message}}</span>
            @enderror
     
         </div>
     
         <div class="btn">
             @include('components.wire-loading-btn')
         </div>

    </div>

  
</form>
