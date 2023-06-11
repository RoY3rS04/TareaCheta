@props([
    'name' => '',
    'total' => 0,
])

<div class="flex gap-x-4 items-center">
    <x-user size="100px" check="26px"/>
    <div class="flex flex-col gap-y-0.5">
        <h2 class="text-white font-bold">{{$name}}</h2>
        <p class="text-[#EBEBEB] text-[14px]">{{$total}}</p>
    </div>
</div>
