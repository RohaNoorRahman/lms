<div>
    <div class="flex items-center justify-between">
        <div class="flex-1 w-6/12">
            <h1 class="text-2xl font-semibold text-gray-800  mb-4">{{$curricullam->course->name}}</h1>
            <p class="text-leading font-semibold text-gray-700 font-lg">{{$curricullam->course->description}}</p>
            <p class="text-leading font-semibold py-4 text-gray-700 font-lg">{{$curricullam->course->description}}</p>
            <p class="text-leading font-semibold py-4 text-gray-700 font-lg">{{$curricullam->course->description}}</p>

            <div class="div mb-6">
                <span class="text-lg font-bold text-gray-900">Price : ${{number_format($curricullam->course->price,2)}}</span>
            </div>

        </div>

        <div class="flex-1 flex justify-end w-4/12">
            <div class="img flex items-end overflow-hidden  px-6">
                <img class="rounded-lg img-fluid max-w-max h-60 object-fill mr-4" src="{{$curricullam->course->image}}" alt="">
            </div>
        </div>
    </div>

    <div class="my-4 ">
        
        <h1 class="font-semibold text-xl mb-4">Class Name: - {{$curricullam->name}}</h1>
        <h1 class="font-semibold text-lg mb-4">Students: - <span class="text-green-800 ">Present - {{$curricullam->presentStudents()}} </span> | <span class="text-red-800 ">Absent - {{$curricullam->course->students()->count() - $curricullam->presentStudents()}} </span> </h1>
            
        
        
        <table class="w-full table-auto">
            <tr>
                <th class="border py-2 text-left px-4">Name</th>
                <th class="border py-2 px-4">Email</th>
                <th class="border py-2 px-4">Attendace</th>
            </tr>

            @foreach ($curricullam->course->students as $student )
                <tr>
                    <td class="border py-2 px-4">{{$student->name}}</td>
                    <td class="border py-2 px-4">{{$student->email}}</td>
                    <td class="border py-2 px-4">
                        <div class="flex justify-center">
                            @if ($student->is_present($curricullam->id))
                            <div class="check">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                  </svg>
                                  
                            </div>
                            @else
                            <button wire:click="attendance({{$student->id}})" class="bg-green-600 inline-block px-3 py-1 rounded mr-2 text-white cursor-pointer">Present</button>
                            @endif
                            
                            
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <h1 class="font-bold text-xl mt-6 mb-4">Notes</h1>
    @if (count($notes)>0)
    @foreach($notes as $note)
    <div class="mb-4 border border-gray-100 p-4">{{$note->description}}</div>
    @endforeach
    @else
    <p class="py-4 text-red-400">Not Found Any Note!</p>
    @endif


    <form wire:submit.prevent="addNote" class="my-4">
        <div class="mb-4">
            <textarea wire:model="note" class="lms-input" placeholder="Type Note" ></textarea>
        </div>

        <button class="lms-btn" type="submit">Save</button>
    </form>
</div>
