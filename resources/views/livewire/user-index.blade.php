<div>
    <table class="w-full tableDesign table-auto">
        <tr class="bg-gray-200 w-full">
            <th class="border px-4 py-2 text-left">Id</th>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Permissions</th>
            <th class="border px-4 py-2  text-center">Actions</th>

        </tr>
        
        @foreach($users as $user)
       
        <tr>
            <td class="border font-semibold px-4 py-2">{{$user->id}}</td>
            <td class="border px-4 py-2">{{$user->name}}</td>
            <td class="border px-4 py-2">{{$user->email}}</td>
            <td class="border px-4 py-2">
                
                    @foreach ($user->roles as $role )
                        
                            <span>{{$role->name}}</span>
                       
                    @endforeach
                    
            </td>
            
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="text-red-400 mr-2" href="{{route('user.edit',$user->id)}}">
                        @include('./components.icons.edit')
                        </a>


                        <form onsubmit="return confirm('Are You Sure ?')" wire:submit.prevent="userDelete({{$user->id}})" action="">
                            <button wire:model.lazy class="mt-1 text-red-400" type="submit">@include('./components.icons.trash')</button>
                        </form>
                </div>
            </td>
        </tr>
        @endforeach
       
    </table>

    <div class="mt-6">
        {{$users->links()}}
    </div>
</div>


