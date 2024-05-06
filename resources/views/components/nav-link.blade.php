@props(['active' => false, 'to', 'type' => 'a'])

{{-- <a class="" href="{{$attributes->get('to')}}">{{$slot}}</a>  --}}

@if ($type == 'a')
    <a class="transition hover:text-gray-500" href="{{ $to }}"
        aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>
@else
    <button class="transition hover:text-gray-500"
        aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</button>
@endif
