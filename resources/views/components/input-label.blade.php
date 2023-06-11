@props(['value'])

<label {{ $attributes->merge(['class' => 'text-[20px] font-bold text-white']) }}>
    {{ $value }}
    {{ $slot }}

    @if(isset($input))
        {{$input}}
    @endif
</label>
