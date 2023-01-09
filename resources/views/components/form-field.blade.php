<label for="{{$name}}" class="lms-label">{{$label}}</label>


@if ($type === 'textarea')
    
<textarea wire:model.delay.long="{{$name}}" id="{{$name}}" class="lms-input" placeholder="{{$placeholder}}"{{$required}} ></textarea>


@elseif ($type === 'text')

<input wire:model.delay.long="{{$name}}" type="{{$type}}" id="{{$name}}" placeholder="{{$placeholder}}" class="lms-input" {{$required}} >

@elseif ($type === 'number')

<input wire:model.delay.long="{{$name}}" type="{{$type}}" id="{{$name}}" placeholder="{{$placeholder}}" class="lms-input" {{$required}} >
@elseif ($type === 'time')

<input wire:model.delay.long="{{$name}}" type="{{$type}}" id="{{$name}}"  class="lms-input" {{$required}} >


@endif



@error($name)
    <span class="text-red-400 text-sm mt-1">{{ $message }}</span>
@enderror
