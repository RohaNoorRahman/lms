<div>

    <span class="bg-red-200"></span>
    @foreach ($quiz->questions as $question)
        <div class="mb-4 @if(array_key_exists($question->id,$answered)) bg-{{$answered[$question->id] ? 'green' : 'red'}}-200 @endif px-4 py-3 rounded">
            <h1 class="font-bold text-lg mb-3">{{$question->name}}..?</h1>

            <div class="flex">
                {{-- @foreach ($answerOptions as $option)
                <div class="mr-4">
                    <input wire:model="answer" value="{{explode(',',$option)[0]}}"  wire:change.prevent="check" type="radio" id="answer_1-{{$question->id}}" @if (array_key_exists($question->id , $answered)) disabled @endif >
                    <label for="answer_1-{{$question->id}}" class="font-semibold text-md text-gray-600 cursor-pointer">{{$question->$option}}</label>
                </div>
                @endforeach --}}
                



                <div class="mr-4">
                    <input wire:model="answer" value="a,{{$question->id}}"  wire:change.prevent="check" type="radio" id="answer_1-{{$question->id}}" @if (array_key_exists($question->id , $answered)) disabled @endif >
                    <label for="answer_1-{{$question->id}}" class="font-semibold text-md text-gray-600 cursor-pointer">{{$question->answer_a}}</label>
                </div>

                <div class="mr-4">
                    <input wire:model="answer" value="b,{{$question->id}}" wire:change.prevent="check" type="radio" id="answer_2-{{$question->id}}"  @if (array_key_exists($question->id , $answered)) disabled @endif >
                    <label for="answer_2-{{$question->id}}" class="font-semibold text-md text-gray-600 cursor-pointer">{{$question->answer_b}}</label>
                </div>

                <div class="mr-4">
                    <input wire:model="answer" value="c,{{$question->id}}"  wire:change.prevent="check" type="radio" id="answer_3-{{$question->id}}"  @if (array_key_exists($question->id , $answered)) disabled @endif >
                    <label for="answer_3-{{$question->id}}" class="font-semibold text-md text-gray-600 cursor-pointer">{{$question->answer_c}}</label>
                </div>

                <div class="mr-4">
                    <input wire:model="answer" value="d,{{$question->id}}" wire:change.prevent="check" type="radio" id="answer_4-{{$question->id}}"  @if (array_key_exists($question->id , $answered)) disabled @endif >
                    <label for="answer_4-{{$question->id}}" class="font-semibold text-md text-gray-600 cursor-pointer">{{$question->answer_d}}</label>
                </div>
            </div>
        </div>
    @endforeach
</div>
