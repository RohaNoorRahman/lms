<div>
    <h2 class="font-bold text-center text-gray-600 text-xl ">Questions</h2>

    @if (count($questions) > 0)
    <h2 class="font-semibold text-lg my-4">Add Question</h2>

    <form wire:submit.prevent="addQuestion">
        <div class="mb-4">
            <label class="lms-label" for="question_id">Question</label>
            <select class="lms-input" wire:model.delay.long="question_id" id="question_id">
                <option value="">Select A Question</option>
                @foreach ($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->name }}</option>
                @endforeach

            </select>
        </div>

        @include('components.wire-loading-btn')
    </form>
    @else
    
    <div class="text-indigo-600 text-xl font-bold">
        No Questions Found Add one And try again...!
    </div>
    @endif


    <div class="mt-6">
        
            <table class="w-full tableDesign table-auto">
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2 text-left">Question Name</th>

                    <th class="border px-4 py-2">Actions</th>
                </tr>

                @foreach ($quiz->questions as $question)
                    <tr>

                        <td class="border px-4 py-2">{{ $question->name }}</td>



                        <td class="border px-4 py-2 text-center">
                            <div class="flex items-center justify-center">




                                <form onsubmit="return confirm('Are you sure');"
                                    wire:submit.prevent="quizeQuestionDelete({{ $question->id }})" action="">
                                    <button wire:model.delay.long class="mt-1 text-red-400"
                                        type="submit">@include('./components.icons.trash')</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>

        


    </div>
</div>
