<div>
    <table class="w-full table-auto">
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Phone</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($leads as $lead)

        <tr>
            <td class="border font-semibold px-4 py-2">{{$lead->name}}</td>
            <td class="border px-4 py-2">{{$lead->email}}</td>
            <td class="border px-4 py-2">{{$lead->phone}}</td>
            <td class="border px-4 py-2 text-center">{{date('F j,Y',strtotime($lead->created_at))}}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="text-red-400" href="{{route('lead.edit',$lead->id)}}">
                        @include('./components.icons.edit')
                        </a>
        
                        <a class="px-3 text-red-400" href="{{route('lead.show',$lead->id)}}">
                        @include('./components.icons.eye')
                        </a>

                        <form onsubmit="return confirm('Are You Sure ?')" wire:submit.prevent="leadDelete({{$lead->id}})" action="">
                            <button class="mt-1 text-red-400" type="submit">@include('./components.icons.trash')</button>
                        </form>
                </div>
            </td>
        </tr>

        @endforeach
    </table>

    <div class="mt-6">
        {{$leads->links()}}
    </div>
</div>
