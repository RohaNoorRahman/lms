<form wire:submit.prevent="formSubmit">
   <div class="flex -mx-4 mb-4">
    <div class="flex-1 px-4">
        <label for="name" class="lms-label">User Name</label>
        <input wire:model="name" type="text" id="name" class="lms-input" >
    

         @error('name')
           <span class="text-red-400 text-sm mt-1">{{$message}}</span>
         @enderror
    </div>

    <div class="flex-1 px-4">
        <label for="email" class="lms-label">User Email</label>
        <input wire:model="email" type="email" id="email" class="lms-input" >
    

         @error('email')
           <span class="text-red-400 text-sm mt-1">{{$message}}</span>
         @enderror
    </div>

    <div class="flex-1 px-4">
        <label for="password" class="lms-label">User Password</label>
        <input wire:model="password" type="password" id="password" class="lms-input" >
    

         @error('password')
           <span class="text-red-400 text-sm mt-1">{{$message}}</span>
         @enderror
    </div>
   </div>

   <div class="mb-4">
    <label for="role" class="lms-label">User Role</label>
    <select wire:model.lazy="role" id="role" class="lms-input">
        <option value="">Select Role</option>
        @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach

        
    </select>
    @error('role')
           <span class="text-red-400 text-sm mt-1">{{$message}}</span>
         @enderror
   </div>

   @include('components.wire-loading-btn')
</form>
