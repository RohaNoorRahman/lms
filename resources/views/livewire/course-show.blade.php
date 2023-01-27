<div>
    <div class="flex items-center justify-between">
        <div class="flex-1 w-6/12">
            <h1 class="text-2xl font-semibold text-gray-800  mb-4">{{$course->name}}</h1>
            <p class="text-leading font-semibold text-gray-700 font-lg">{{$course->description}}</p>
            <p class="text-leading font-semibold py-4 text-gray-700 font-lg">{{$course->description}}</p>
            <p class="text-leading font-semibold py-4 text-gray-700 font-lg">{{$course->description}}</p>

            <div class="div mb-6">
                <span class="text-lg font-bold text-gray-900">Price : ${{number_format($course->price,2)}}</span>
            </div>
            <a href="{{route('course.index')}}" class="lms-btn">Get The Course</a>
        </div>

        <div class="flex-1 flex justify-end w-4/12">
            <div class="img flex items-end overflow-hidden  px-6">
                <img class="rounded-lg img-fluid max-w-max h-60 object-fill mr-4" src="{{$course->image}}" alt="">
            </div>
        </div>
    </div>

    <div class="class mt-10">
        <h2 class="font-bold text-2xl ">All Classes</h2>

        <table class="w-full tableDesign mt-6 table-auto">
            <tr>
                <th class="border px-4 py-2 text-left">Name</th>
                <th class="border px-4 py-2 ">Actions</th>
            </tr>

            @foreach ($course->curricullams as $class )
                <tr>
                    <td class="px-4 py-2 border">{{$class->name}}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex items-center justify-center">
                            <a class="text-red-400" href="{{route('class.edit',$class->id)}}">
                                @include('./components.icons.edit')
                                </a>
                
                                <a class="px-3 text-red-400" href="{{route('class.show',$class->id)}}">
                                @include('./components.icons.eye')
                                </a>
        
                                <form onsubmit="return confirm('Are you sure ');" wire:submit.prevent="classDelete({{$class->id}})" action="">
                                    <button wire:model.delay.long class="mt-1 text-red-400" type="submit">@include('./components.icons.trash')</button>
                                </form>
                        </div>
                        

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
