@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'fs-6 text-danger mb-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
