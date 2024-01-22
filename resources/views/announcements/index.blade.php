<x-app-layout>
    <x-backend-page-header model-name="Announcements" description="Announcement Management" add-button="false"
        class="mx-4">
        <x-lucide-bell class="w-5 h-5 text-current" />
    </x-backend-page-header>
    <div class="p-4 space-y-4">

        <div class="flex justify-end items-center my-10">
            <x-button class="mt-2 mr-2 md:w-auto flex justify-center items-center gap-2"
                onclick="Livewire.dispatch('openModal', { component: 'add-announcement' })" type="button">
                <x-lucide-bell class="w-5 h-5 text-firefly-300" />
                {{ __('Add New Announcement') }}
            </x-button>
        </div>
        <div>
            <div class="grid grid-cols-2 md:grid-cols-4  gap-4 ">
                @forelse ($announcements as $announcement)
                    <article
                        class="rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:shadow-sm space-y-4 relative">


                        <div class="rounded-[10px] bg-white dark:bg-black p-4  !pt-20  sm:p-6 relative">
                            <div class="absolute top-2 left-2 cursor-pointer"
                                onclick="Livewire.dispatch('openModal', {component: 'edit-announcement', arguments: {{ json_encode([$announcement->id]) }} })">

                                <div
                                    class="cursor-pointer delay-200  duration-500 bg-gray-50 dark:bg-gray-500/10 transition-colors dark:hover:bg-gray-500/20  hover:bg-gray-100  grid h-8 place-items-center rounded-full w-8">
                                    <x-lucide-file-signature class="w-6 h-6 text-gray-500" />
                                </div>

                            </div>
                            <div class="absolute top-2 right-2 cursor-pointer"
                            onclick="Livewire.dispatch('openModal',
                            {
                               component: 'delete-announcement',
                            arguments: {{ json_encode([$announcement->id]) }}
                            })"
                                >
                                <div
                                    class="cursor-pointer delay-200  duration-500 bg-red-50 dark:bg-red-500/10 transition-colors dark:hover:bg-red-500/20  hover:bg-red-100  grid h-8 place-items-center rounded-full w-8">
                                    <x-heroicon-o-x-circle class="w-6 h-6 text-red-500" />
                                </div>
                            </div>

                            <span class="font-bold block text-[14px] !pb-3 text-gray-800 dark:text-white line-clamp-1">
                                {{ substr($announcement->title, 0, 35) . (strlen($announcement->title) > 35 ? '...' : '') }}
                            </span>

                            <a href="#" class="mt-4">
                                <span
                                    class="mt-0.5 !leading-tight !pb-4 text-[13px] text-gray-900 dark:text-gray-400 line-clamp-2">
                                    {{ $announcement->body }}
                                </span>
                            </a>

                            <div class="mt-4 flex flex-wrap gap-1">
                                <span
                                    class="whitespace-nowrap rounded-full bg-purple-100 dark:bg-purple-900 dark:text-white px-2.5 py-0.5 text-[11px] text-purple-600">

                                    {{ $closest_time = $announcement->updated_at && $announcement->created_at ? (now()->diffInSeconds($announcement->updated_at) < now()->diffInSeconds($announcement->created_at) ? 'Updated ' . $announcement->updated_at->diffforhumans() : 'Created ' . $announcement->created_at->diffforhumans()) : ($announcement->updated_at ? "Updated $announcement->updated_at" : "Created ($announcement->created_at)") }}


                                </span>

                                {{-- <span
                                class="whitespace-nowrap rounded-full bg-purple-100 dark:bg-purple-900 dark:text-white px-2.5 py-0.5 text-[11px] text-purple-600">
                                JavaScript
                            </span> --}}
                            </div>
                        </div>
                    </article>
                @empty
            </div>
            <livewire:nothing-here />
            @endforelse


        </div>

        <div>
            {{ $announcements->links() }}
        </div>






    </div>
</x-app-layout>
