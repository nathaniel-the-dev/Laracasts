@props(['label' => null, 'name' => null, 'class' => null])

<div {{ $attributes->merge(['class' => 'grid gap-0.5 ' . e($class)]) }}>
    <label for="{{ $name }}">{{ $label }}</label>
    {{ $slot }}

    @error($name)
        <div class="text-sm text-red-500">{{ $message }}</div>
    @enderror
</div>
