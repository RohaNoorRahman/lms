<div>
    <div class="flex items-center justify-between">
        <div class="flex-1 w-6/12">
            <h1 class="text-2xl font-semibold text-gray-800  mb-4">{{$name}}</h1>
            <p class="text-leading font-semibold text-gray-700 font-lg">{{$description}}</p>
            <p class="text-leading font-semibold py-4 text-gray-700 font-lg">{{$description}}</p>
            <p class="text-leading font-semibold py-4 text-gray-700 font-lg">{{$description}}</p>

            <div class="div mb-6">
                <span class="text-lg font-bold text-gray-900">Price : ${{number_format($price,2)}}</span>
            </div>
            <a href="{{route('course.index')}}" class="lms-btn">Get The Course</a>
        </div>

        <div class="flex-1 flex justify-end w-4/12">
            <div class="img overflow-hidden  px-6">
                <img class="rounded-lg img-fluid max-w-max h-60 object-fill mr-4" src="{{$image}}" alt="">
            </div>
        </div>
    </div>
</div>
