<form wire:submit.prevent="formSubmit">
    <div class="mb-4">
        @include('components.form-field',[
        'name' => 'name',
        'label' => 'Name',
        'type' => 'text',
        'placeholder' => 'Question Name',
        'required' => 'required',
    ])
    </div>

    @foreach ($answers as $answer)
    <div class="mb-4">
        @include('components.form-field',[
        'name' => 'answer_' .$answer,
        'label' => 'Answer ' .ucFirst($answer),
        'type' => 'text',
        'placeholder' => ' Type Answer ' . ucfirst($answer),
        'required' => 'required',
    ])
    </div>
    @endforeach

    <div class="mb-4">
        <label for="correct-answer" class="lms-label">Correct Answer</label>

        <select wire:model.prevent="correct_answer" id="correct-answer" class="lms-input">
            @foreach ($answers as $answer)
                <option value="{{$answer}}">{{ucfirst($answer)}}</option>
            @endforeach
        </select>
    </div>

    @include('components.wire-loading-btn')
</form>
