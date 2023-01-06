<div>
    <table class="w-full tableDesign table-auto">
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Permissions</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($roles as $role)

        <tr>
            <td class="border font-semibold px-4 py-2">{{$role->name}}</td>
            <td class="border px-4 py-2">
                @foreach($role->permissions as $permisson)

                <span class="inline-block bg-red-600 rounded-md mr-2 cursor-pointer text-white py-1 px-3">{{$permisson->name}}</span>
                @endforeach
            </td>


            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="text-red-400 mr-1" href="{{route('role.edit',$role->id)}}">
                        @include('./components.icons.edit')
                        </a>

                        <form onsubmit="return confirm('Are You Sure ?')" wire:submit.prevent="roleDelete({{$role->id}})" action="">
                            <button wire:model.lazy class="mt-1 text-red-400" type="submit">@include('./components.icons.trash')</button>
                        </form>
                </div>
            </td>
        </tr>

        @endforeach
    </table>

</div>
