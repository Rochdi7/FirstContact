@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'fw-medium fs-6 text-success']) }}>
        {{ $status }}
    </div>
@endif
