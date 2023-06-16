<x-app-layout>
    <x-slot name="title">Author</x-slot>
    <x-slot name="subpage">Pages</x-slot>
    <x-slot name="sub_subpage">Author</x-slot>
    <main class="bg-[#14141f] py-[80px] px-[255px] flex flex-col">
        <section class="flex gap-x-10 bg-[#414046] p-10 rounded-[12px] relative isolate overflow-hidden">
            <div class="w-[274px] h-[274px] rounded-[20px] bg-[#7A798A]">
                <img class="w-full object-cover object-center" src="{{$author->getFirstMediaUrl('user_images')}}" alt="Author image">
            </div>
            <div class="flex justify-between">
                <div class="flex flex-col max-w-[466px]">
                    <p class="text-[18px] text-[#EBEBEB] mb-[2px]">Author Profile</p>
                    <h1 class="text-white font-bold text-[36px] mb-[6px]">{{$author->name}}</h1>
                </div>
            </div>
            <div class="flex gap-x-8 items-center absolute top-[60px] right-[40px] ml-[225px]">
                <x-networks boxColor="white" iconColor="#343444"/>
                <x-primary-button class="px-[28px]">Follow</x-primary-button>
            </div>
            <nav class="bg-[#343444] w-full absolute bottom-0 left-0 px-[100px] py-[24px] z-[-1] flex justify-end">
                <ul class="flex items-center w-[896px] justify-around">
                    @foreach($categories as $category)
                        <li><a href="#" class="text-white font-bold uppercase text-[20px]">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </nav>
        </section>
        <section class="flex flex-col items-center">
            <div class="grid grid-cols-4 gap-x-[30px] gap-y-10 mt-[60px]">
                @foreach($author->items as $item)
                    <x-card
                        home="yes"
                        authorP="Creator"
                        priceP="Price"
                        item_name="{{$item->title}}"
                        author="{{$item->user->name}}"
                        price="{{$item->price}}"
                        item_image="{{ $item->getFirstMediaUrl('items_images')}}"
                        :item="$item"
                        :author="$item->user"
                    >
                    </x-card>
                @endforeach
            </div>
            <x-primary-button class="px-10 mt-[56px]">
                Load More
            </x-primary-button>
        </section>
    </main>
</x-app-layout>
