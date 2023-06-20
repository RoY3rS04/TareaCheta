@props([
    'name' => '',
    'total' => 0,
    'user_image'
])

<div class="flex gap-x-4 items-center">
    <x-user type="top" :user_image="$user_image"/>
    <div class="flex flex-col gap-y-0.5">
        <h2 class="text-white font-bold">{{$name}}</h2>
        <div class="text-[#EBEBEB] flex gap-x-1 text-[14px]">
            <p>{{$total}}</p>
            <span>ETH</span>
        </div>
    </div>
</div>
