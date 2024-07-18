@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'alert alert-danger' , 'style' => 'width:70%;text-align:center;margin:.3%']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
