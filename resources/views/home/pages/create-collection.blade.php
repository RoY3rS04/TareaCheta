<x-app-layout>
    <x-slot name="title">
        Create Collection
    </x-slot>
    <x-slot name="subpage">
        Pages
    </x-slot>
    <x-slot name="sub_subpage">
        Create Collection
    </x-slot>
    <div class="bg-[#14141F] pt-[80px] pb-[209px] px-[615px] flex flex-col gap-y-3">
        <h1 class="text-[30px] text-center text-white font-bold">Create Your Own Collection of NFTs</h1>
        <form
            action="{{ action([\App\Http\Controllers\CollectionController::class, 'store']) }}"
            method="POST"
        >
            @csrf
            <x-text-input name="name" :value="old('name')" required class="py-[13px] px-5" placeholder="Collection's name"/>
            <x-input-error :messages="$errors->get('name')"/>
            <x-primary-button class="px-10 w-full mt-10">
                Create Collection
            </x-primary-button>
    </form>
    </div>
</x-app-layout>
