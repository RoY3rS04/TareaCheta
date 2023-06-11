@props(['color' => 'white'])

@php
$text = '';

if ($color == 'white') {
    $text = 'text-white';
} else {
    $text = "text-[$color]";
}
@endphp


<button {{ $attributes->merge(['type' => 'submit', 'class' => "flex justify-center items-center py-4 border-[#FFFFFF] border-[1.5px] font-bold text-[15px] $text rounded-[56px]"]) }}>
    {{ $slot }}
</button>
