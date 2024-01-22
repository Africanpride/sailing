<x-app-layout>
    <x-admin.pageheader model-name="Institutes " description="Edit Instititues <br />& College" add-button="false"
        class="mx-4">
        <x-heroicon-o-user-group class="w-5 h-5 text-current" />
        </x-admin.pageheader>

<div>
    <div class="p-4 space-y-4">

        <div class="max-w-3xl mx-auto">
            <x-jet-button type="button"
                onclick="Livewire.dispatch('openModal', { component: 'admin.institute.add-institute' })">
            {{ __('Add New Institute') }}
            </x-jet-button>
        </div>
        <!-- Card Section -->
        <div class="bg-gray-200 dark:bg-gray-900 dark:text-gray-100  max-w-3xl mx-auto !rounded-xl">
            <div class="container grid grid-cols-12 mx-auto ">
                <div class=" grid place-items-center bg-no-repeat bg-cover  bg-gray-700 col-span-full md:col-span-3 md:rounded-l-xl  "
                    style="background-image: url(' {{ asset('images/ghana.jpg') }}'); background-position: center center; background-blend-mode: multiply; background-size: cover;">
                    <img class="md:w-22 md:p-6 p-24 aspect-square" src="{{ asset('images/logo/FDI.png') }}"
                        alt="">
                </div>
                <div
                    class="flex flex-col justify-between p-3 pl-10 md:col-span-9 col-span-12 space-y-3 rounded-r-xl relative ">

                    <div
                        class="bg-gray-300/80 dark:bg-black/50 rotate-180 p-2 [writing-mode:_vertical-lr] absolute left-0 bottom-0 h-full">
                        <time datetime="2022-10-10"
                            class="flex items-center justify-between gap-4 text-xs font-bold uppercase
                         text-gray-900 dark:text-white">

                            <span>MAR 13th</span>
                            <span class="w-px flex-1 bg-gray-900/50 dark:bg-white/10"></span>
                            <span>MAR 18th</span>
                        </time>
                    </div>

                    <h1 class="text-xl font-semibold">Family Development Institute. (FDI)</h1>
                    <p class=" text-sm">
                        The family as the basic unity of society has far reaching
                        implications on
                        individual bent and ultimately on national stability in all respects.The family as the basic
                        unity of society has far reaching implications on
                        individual bent and ultimately on national stability in all respects. <a
                            rel="noopener noreferrer" href="#"
                            class="inline-flex items-center  space-x-2 text-sm text-orange-400">
                            <span>Read more</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a></p>
                    <div class="flex justify-end items-center">

                        <a rel="noopener noreferrer" href="#"
                            class="inline-flex items-center  space-x-2 text-sm text-orange-400">
                            <span href="#"
                                class="flex items-center justify-between rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900 gap-2">Register
                                now <span aria-hidden="true">
                                    <x-lucide-arrow-right class="w-4 h-4" />
                                </span></span>

                        </a>
                    </div>

                </div>


            </div>
        </div>
        <!-- End Card Section -->



    </div>

</div>

</x-app-layout>
