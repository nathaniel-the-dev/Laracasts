@props([
    'to' => null,
    'type' => 'submit',
    'variant' => 'primary',
    'class' => null,
    'size' => 'md',
])

@php
    $buttonClass = match ($variant) {
        'primary' => 'text-white bg-blue-500 hover:bg-blue-600 shadow',
        'secondary' => 'bg-gray-200 hover:bg-gray-300 shadow',
        'danger' => 'bg-red-500 hover:bg-red-600 text-white shadow',
        'ghost' => 'bg-transparent hover:bg-gray-200',
        default => throw new \Exception("Unsupported variant: $variant"),
    };

    $buttonSize = match ($size) {
        'sm' => 'px-2 py-1.5',
        'md' => 'px-4 py-2',
        'lg' => 'px-6 py-3',
        default => throw new \Exception("Unsupported size: $size"),
    };
@endphp

@if (isset($to))
    <a {{ $attributes->merge(['type' => $type, 'class' => 'inline-flex justify-center items-center gap-2 rounded ' . e($buttonSize) . ' font-medium tracking-wide transition ' . e($buttonClass)]) }}
        href="{{ $to }}">{{ $slot }}</a>
@else
    <button
        {{ $attributes->merge(['type' => $type, 'class' => 'inline-flex justify-center items-center gap-2 rounded ' . e($buttonSize) . ' font-medium tracking-wide transition ' . e($buttonClass)]) }}>{{ $slot }}</button>
@endif
