@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'placeholder-[#8A8AA0] border-[#343444] border-[1px] bg-transparent rounded-[8px] text-white font-medium shadow-sm w-full']) !!}>
