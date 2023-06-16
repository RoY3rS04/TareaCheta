<x-app-layout>
    <x-slot name="title">
        Create Item
    </x-slot>
    <x-slot name="subpage">
        Pages
    </x-slot>
    <x-slot name="sub_subpage">
        Create Item
    </x-slot>
    <main class="px-[255px] py-[80px] flex gap-x-[80px] bg-[#14141F]">
        <aside class="flex flex-col gap-y-5">
            <h2 class="text-white font-bold text-[20px]">Preview Item</h2>
            <x-card>

            </x-card>
        </aside>
        <form class="flex-1" method="POST" action="{{ action([\App\Http\Controllers\ItemController::class, 'store']) }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-y-6">
                <x-input-label for="img" type="file" class="flex flex-col gap-y-5 pointer-events-none" value="Upload File">
                    <x-slot name="input">
                        <div
                            class="px-[60px] flex justify-between items-center py-10 border-[1px] border-[#343444] rounded-[8px] text-[14px] text-[#8A8AA0] font-normal">
                            PNG, JPG, GIF, WEBP or MP4. Max 200mb.
                            <div
                                class="flex justify-center items-center py-4 border-[#FFFFFF] border-[1.5px] font-bold text-white text-[15px] rounded-[56px] px-[40px] cursor-pointer pointer-events-auto">
                                Upload Image
                            </div>
                        </div>
                        <x-text-input name="item_img" id="img" type="file" accept="image/png, image/jpg, image/gif, image/jpeg"
                                      class="hidden"/>
                    </x-slot>
                </x-input-label>
                <x-input-label class="flex flex-col gap-y-5" value="Select Method">
                    <x-primary-button type="button"
                                      class="bg-white gap-x-2.5 rounded-[8px] px-[111px] font-bold text-[14px] w-[325px]"
                                      color="#5142FC">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                            <path
                                d="M8.74736 16.3068C8.30569 16.3084 7.88069 16.1318 7.56903 15.8184L1.0382 9.28926C0.867923 9.11955 0.736523 8.9149 0.653074 8.68944C0.569625 8.46398 0.536116 8.2231 0.554862 7.98342L0.971528 2.51176C1.00031 2.11341 1.17197 1.73885 1.45491 1.45697C1.73786 1.1751 2.11307 1.00487 2.51153 0.977591L7.98319 0.560924C8.02653 0.551758 8.06903 0.551758 8.11236 0.551758C8.55403 0.551758 8.97653 0.726758 9.28736 1.04009L15.819 7.56842C15.9739 7.7232 16.0967 7.90696 16.1805 8.10921C16.2643 8.31147 16.3074 8.52825 16.3074 8.74717C16.3074 8.9661 16.2643 9.18288 16.1805 9.38514C16.0967 9.58739 15.9739 9.77115 15.819 9.92592L9.92569 15.8184C9.77132 15.9737 9.5877 16.0968 9.38544 16.1806C9.18318 16.2644 8.9663 16.3073 8.74736 16.3068ZM5.21153 3.54509C4.93745 3.54517 4.66763 3.61284 4.42595 3.7421C4.18427 3.87136 3.9782 4.05823 3.82599 4.28616C3.67378 4.51408 3.58013 4.77602 3.55333 5.04879C3.52653 5.32155 3.56741 5.59671 3.67235 5.8499C3.77729 6.10309 3.94305 6.32649 4.15494 6.50032C4.36684 6.67415 4.61834 6.79304 4.88716 6.84646C5.15598 6.89988 5.43382 6.88618 5.69608 6.80658C5.95834 6.72697 6.19692 6.58392 6.3907 6.39009L6.39653 6.38509L6.40236 6.37926L6.39569 6.38509C6.62735 6.1514 6.78464 5.85436 6.84775 5.53141C6.91086 5.20846 6.87697 4.87406 6.75033 4.57035C6.62369 4.26664 6.40999 4.00721 6.13615 3.82475C5.86231 3.6423 5.54058 3.54499 5.21153 3.54509Z"
                                fill="#5142FC"/>
                        </svg>
                        <x-text-input value="Fixed Price" name="method" class="hidden"/>
                        Fixed Price
                    </x-primary-button>
                </x-input-label>
                <x-input-label value="Price">
                    <x-text-input id="price" type="number" name="price" class="px-[20px] py-3 text-[14px]" placeholder="Enter price for one item (ETH)"/>
                </x-input-label>
                <x-input-label value="Title">
                    <x-text-input name="title" id="title" class="px-[20px] py-3 text-[14px]" placeholder="Item Name"/>
                </x-input-label>
                <x-input-label class="flex flex-col gap-y-5" value="Description">
                    <textarea name="description"
                        class="h-[80px] text-white resize-none border-[#343444] border-[1px] bg-transparent rounded-[8px] font-medium shadow-sm"
                        placeholder="e.g. “This is very limited item"></textarea>
                </x-input-label>
                <div class="flex gap-x-5 items-center">
                    <x-input-label class="flex flex-1 flex-col gap-y-5" value="Royalties">
                        <x-text-input name="royalties" placeholder="5%" type="text"/>
                    </x-input-label>
                    <x-input-label class="flex flex-1 flex-col gap-y-5" value="Size">
                        <x-text-input name="size" placeholder="e.g. “size”" type="text"/>
                    </x-input-label>
                    <x-input-label class="flex flex-1 flex-col gap-y-5" value="Collection">
                        <select name="collection_id"
                            class="text-[#8A8AA0] border-[#343444] border-[1px] bg-transparent rounded-[8px] font-medium shadow-sm">
                            @foreach($collections as $collection)
                                <option class="text-inherit bg-transparent" value="{{$collection->id}}">{{$collection->name}}</option>
                            @endforeach
                        </select>
                    </x-input-label>
                </div>
                <x-primary-button class="px-10">Create Item</x-primary-button>
            </div>
        </form>
    </main>
    @push('scripts')
        <script>
            const title = document.getElementById("title");
            const titleShow = document.getElementById("titleShow");
            if (title !== null && title !== undefined) {
                title.addEventListener("input", () => {
                    titleShow.innerText = title.value;
                });
            }


            const price = document.getElementById("price");
            const priceShow = document.getElementById("priceShow");
            if (price !== null && price !== undefined) {
                price.addEventListener("input", () => {
                    priceShow.innerText = price.value;
                });
            }

            const pictureInput = document.getElementById("img");
            const pictureShow = document.getElementById("pictureShow");
            if (pictureInput !== null && pictureInput !== undefined) {
                pictureInput.addEventListener("change", () => {
                    const file = pictureInput.files[0];
                    pictureShow.src = URL.createObjectURL(file);
                });
            }
        </script>
    @endpush

</x-app-layout>
