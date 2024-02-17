<x-app-layout>
    <x-backend-page-header model-name="publications" description="News & Publications" add-button="false" class="mx-4">
        <x-lucide-bell class="w-5 h-5 text-current" />
    </x-backend-page-header>
    <div class="p-4 space-y-4">

        <div class="max-w-3xl mx-auto">
            <a href="{{ route('publications.create') }}">
                <x-button type="button">
                    {{ __('Add News/Publication') }}

                </x-button>
            </a>
        </div>

        @if ($publications->count() > 0)
            @foreach ($publications as $publication)
                <!-- End Card Section -->
                <div
                    class="bg-gray-200 dark:bg-gray-900 dark:text-gray-100 h-[150px]  max-w-3xl mx-auto !rounded-xl relative overflow-hidden">

                    <div
                        class="bg-firefly-600 px-2 py-1 absolute right-0 bottom-0 rounded-tl-lg text-xs text-white inline-flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        <span class="px-1"> {{ $publication->category->title }}</span>
                    </div>
                    <div class="container grid grid-cols-12 mx-auto h-full ">
                        <a href="{{ route('publications.show', $publication) }}"
                            class="relative grid place-items-center bg-no-repeat bg-cover  bg-gray-700 col-span-full md:col-span-3 md:rounded-l-xl  "
                            style="background-image: url('{{ $publication->getFirstMediaUrl('featured_image') ? $publication->getFirstMediaUrl('featured_image') : $publication->featured_image }}'); background-position: center center; background-size: cover;">

                            <span class="absolute top-3 right-3 cursor-pointer"
                                onclick="Livewire.dispatch('openModal', {component: 'admin.publications.update-images', arguments: {{ json_encode([$publication->slug]) }} })">
                                <x-lucide-image-plus class="w-4 h-4 text-firefly-500" />
                            </span>
                        </a>

                        <div class="col-span-12 flex flex-col md:col-span-9 p-4 pl-9 pt-4 relative space-y-2">
                            @hasanyrole(['admin', 'super_admin'])
                                <div class="absolute top-2 right-3">
                                    <div class="flex justify-end items-center gap-2">
                                        <a href="{{ route('publications.edit', [$publication->slug]) }}"
                                            class=" text-gray-500 dark:text-white hover:text-accent-500 z-100">
                                            <x-lucide-clipboard-edit class="w-4 h-4 text-gray-500 cursor-pointer" />
                                        </a>
                                        <span class=" text-gray-500 dark:text-white hover:text-accent-500 z-100">
                                            <x-heroicon-o-trash class="w-4 h-4 text-red-500 cursor-pointer"
                                                onclick="Livewire.dispatch('openModal', {component: 'delete-publication', arguments: {{ json_encode([$publication->slug]) }} })" />
                                        </span>
                                    </div>

                                </div>
                            @endhasrole


                            <div
                                class="bg-gray-300/90 dark:bg-black rotate-180 p-2 [writing-mode:_vertical-lr] absolute left-0 bottom-0 h-full">
                                <time datetime="2022-10-10"
                                    class="flex items-center justify-between gap-4 text-[8px]
                                                        font-bold uppercase  text-gray-900 dark:text-white">

                                    <div>{{ \Carbon\Carbon::parse($publication->updated_at)->format('M jS') }}</div>
                                    <span class="w-px flex-1 bg-gray-900/50 dark:bg-white/10"></span>
                                    <div>{{ \Carbon\Carbon::parse($publication->created_at)->format('M jS') }}</div>
                                </time>
                            </div>

                            <h1 class="text-[14px] font-bold ">{{ $publication->title }}
                            </h1>

                            <div>
                                <p class=" text-[12px] line-clamp-5 leading-snug ">
                                    {{ $publication->overview }}
                                    <a href="{{ route('publications.show', [$publication->slug]) }}"
                                        rel="noopener noreferrer"
                                        class="inline-flex justify-start items-center   text-sm text-orange-400">
                                        <span class="pr-2">... Read more</span>
                                        <x-lucide-arrow-right class="w-4 h-4" />
                                    </a>
                                </p>
                            </div>


                        </div>


                    </div>
                </div>
                <!-- Card Section -->
            @endforeach

            <div class="max-w-3xl mx-auto">

                {{ $publications->links() }}
            </div>
        @endif

    </div>

</x-app-layout>
