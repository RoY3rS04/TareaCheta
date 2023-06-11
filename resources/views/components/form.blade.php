<div class="bg-[#14141F] pt-[80px] pb-[209px] px-[615px]">
    <div class="flex flex-col items-center max-w-[690px] mx-auto">
        <h2 class="text-white font-bold text-[36px]">{{ $page }} To NFTs</h2>
        <div class="flex gap-x-4 items-center mt-[64px]">
            <div class="border-[#343444] border-[1px] w-[254px] h-0"></div>
            <a class="font-[18px] text-[#EBEBEB]" href="#">Or login with email</a>
            <div class="border-[#343444] border-[1px] w-[254px] h-0"></div>
        </div>
        <form class="w-full flex flex-col gap-y-6 mt-[30px]" action="{{ $action }}" method="{{$method}}">
            @csrf
            {{ $slot }}
            <div class="flex justify-between items-center mt-8 mb-8 w-full">
                <label class="flex flex-row-reverse gap-x-2 text-white items-center">Remember me
                    <input type="checkbox" name="remember" class="bg-transparent rounded-[4px] border-[#343444]">
                </label>
                <a class="text-white font-bold" href="#">Forgot Password?</a>
            </div>
            <x-primary-button>
                Login
            </x-primary-button>
        </form>
    </div>
</div>
