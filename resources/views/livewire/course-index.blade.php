<div>
    <table class="w-full tableDesign table-auto">
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Image</th>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">About</th>
            <th class="border px-4 py-2 text-left">Price</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($courses as $course)

        <tr>
            <td class="border text-center font-semibold px-4 py-2">
                <img class="w-50 h-16 rounded-md object-cover" src="{{$course->image}}" alt="">
            </td>
            <td class="border px-4 py-2">{{$course->name}}</td>
            <td class="border px-4 py-2 text-clip">{{$course->description}}</td>
            <td class="border px-4 py-2">${{number_format($course->price,2)}}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="text-red-400" href="{{route('course.edit',$course->id)}}">
                        @include('./components.icons.edit')
                        </a>
        
                        <a class="px-3 text-red-400" href="{{route('course.show',$course->id)}}">
                        @include('./components.icons.eye')
                        </a>

                        <form onsubmit="return confirm('Are you sure ');" wire:submit.prevent="courseDelete({{$course->id}})" action="">
                            <button wire:model.lazy class="mt-1 text-red-400" type="submit">@include('./components.icons.trash')</button>
                        </form>
                </div>
            </td>
        </tr>

        @endforeach
    </table>

    <div class="mt-6">
        {{-- {{$courses->links()}} --}}
    </div>
</div>
