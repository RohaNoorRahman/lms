<div>
    <table class="w-full tableDesign table-auto">
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Question Name</th>
            <th class="border px-4 py-2 text-left">Option A</th>
            <th class="border px-4 py-2 text-left">Option B</th>
            <th class="border px-4 py-2 text-left">Option C</th>
            <th class="border px-4 py-2 text-left">Option D</th>
            <th class="border px-4 py-2 text-left">Correct Answer</th>

            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($questions as $question)

        <tr>
            
            <td class="border px-4 py-2">{{$question->name}}</td>
            <td class="border px-4 py-2 text-clip">{{$question->answer_a}}</td>
            <td class="border px-4 py-2 text-clip">{{$question->answer_b}}</td>
            <td class="border px-4 py-2 text-clip">{{$question->answer_c}}</td>
            <td class="border px-4 py-2 text-clip">{{$question->answer_d}}</td>
            <td class="border px-4 py-2 text-center text-clip">{{ucfirst($question->correct_answer)}}</td>


            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="text-red-400" href="{{route('question.edit',$question->id)}}">
                        @include('./components.icons.edit')
                    </a>

                    <a class="text-red-400 mx-2" href="{{route('question.show',$question->id)}}">
                        @include('./components.icons.eye')
                    </a>


        

                        <form onsubmit="return confirm('Are you sure ');" wire:submit.prevent="questionDelete({{$question->id}})" action="">
                            <button wire:model.delay.long class="mt-1 text-red-400" type="submit">@include('./components.icons.trash')</button>
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
