<div class="bg-white lg:h-[500px] flex flex-col gap-y-4 px-5 border">

    <header class="w-full py-2 border-b">
        <div class="flex justify-between">
            <button wire:click='$dispatch('closeModal')' class="font-bold">X</button>

            <div class="text-lg font-bold">
                Create new post
            </div>

            <button class="font-bold text-blue-500">
                Share
            </button>
        </div>
    </header>

    <main class="grid w-full h-full grid-cols-12 gap-3 overflow-hidden">

        <aside class="items-center w-full m-auto {{-- overflow-scroll --}} lg:col-span-7">
            <label for="customFileInput" class="flex flex-col gap-3 m-auto cursor-pointer max-w-fit">
                <input id="customFileInput" type="file" multiple accept=".jpg,.jpeg,.png" class="sr-only">
                <span class="m-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-14 h-14">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>

                </span>
                <span class="px-4 py-2 text-sm text-white bg-blue-500 rounded-lg">
                    Upload files from computer
                </span>
            </label>

            {{-- show when file count > 0 --}}
            <div class="{{-- flex --}} hidden overflow-x-scroll w-[500px] h-96 snap-x snap-mandatory gap-2 px-2">
                <div class="w-full h-full shrink-0 snap-always snap-center">
                    <x-video />
                </div>
                <div class="w-full h-full shrink-0 snap-always snap-center">
                    <img src="https://images.pexels.com/photos/6747386/pexels-photo-6747386.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load"
                        alt="" class="object-contain w-full h-full">
                </div>
            </div>
        </aside>

        <aside class="flex flex-col h-full gap-4 p-3 overflow-hidden overflow-y-scroll border-l lg:col-span-5">

        </aside>
    </main>

</div>
