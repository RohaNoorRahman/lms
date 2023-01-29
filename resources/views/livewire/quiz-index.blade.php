<div>
    <table class="w-full tableDesign table-auto">
        <tr class="bg-gray-200">
            <th class="border px-4 py-2 text-left">Quizes Name</th>

            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($quizes as $quiz)

        <tr>
            
            <td class="border px-4 py-2">{{$quiz->name}}</td>


            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="text-red-400" href="{{route('quiz.edit',$quiz->id)}}">
                        @include('./components.icons.edit')
                    </a>

                    <a class="text-red-400 mx-2" href="{{route('quiz.show',$quiz->id)}}">
                        @include('./components.icons.eye')
                    </a>


        

                        <form onsubmit="return confirm('Are you sure ');" wire:submit.prevent="quizDelete({{$quiz->id}})" action="">
                            <button wire:model.delay.long class="mt-1 text-red-400" type="submit">@include('./components.icons.trash')</button>
                        </form>
                </div>
            </td>
        </tr>

        @endforeach
    </table>

    <div class="mt-6">
        {{$quizes->links()}}
    </div>
</div>
