<div class="p-4">
    <x-table :showPagination="false">
        <x-slot name="tableHead">
            <tr class="bg-gray-200 dark:border-secondary-900 dark:bg-black text-secondary-900  dark:text-secondary-400">


                <th scope="col" class="px-4 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                            Details
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                            Registration
                        </span>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                            Status
                        </span>
                    </div>
                </th>


                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                            Progress
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-center">
                    <div class="flex items-center justify-center  gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                            Action
                        </span>
                    </div>
                </th>




            </tr>
        </x-slot>
        <x-slot name="tableBody">

            @foreach ($editions as $edition)
                <tr wire:key="{{ $edition->id }}">

                    <td class="px-4 w-px whitespace-nowrap cursor-pointer "
                    onclick="Livewire.dispatch('openModal', {component: 'update-institute-edition', arguments: {{ json_encode([$edition->id]) }} })">
                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                            <div class="flex items-center gap-x-3">
                                <img class="inline-block h-[2.375rem] w-[2.375rem] rounded-full"
                                    src="{{ $edition->institute->institute_logo }}" alt="Image Description">
                                <div class="grow">
                                    <span
                                        class="block text-sm font-semibold text-gray-800 dark:text-gray-200 *:capitalize">{{ $edition->title }}</span>
                                    <span class="block text-sm text-gray-500">{{ $edition->startDate->format('d M Y') }}
                                        - {{ $edition->endDate->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="whitespace-nowrap">
                        <x-images-block />

                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <span
                                class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                    </path>
                                </svg>
                                Active
                            </span>
                        </div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <div class="flex items-center gap-x-3">
                                <div
                                    class="flex flex-nowrap justify-start w-12 h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
                                    <div class="bg-blue-500 dark:bg-yellow-400 overflow-hidden transition duration-300"
                                        role="progressbar" style="width: {{ $edition->progress }}%"
                                        aria-valuenow="{{ $edition->progress }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>

                                </div>
                                <span class="text-sm dark:text-white">{{ $edition->progress }}%</span>
                            </div>
                        </div>
                    </td>
                    <td class="h-px  whitespace-nowrap">
                        <div class="px-6 py-3 text-right gap-2 flex  justify-center items-center cursor-pointer ">

                            <div class="hs-dropdown relative inline-flex">

                                <x-lineawesome-ellipsis-h-solid class="w-6 h-6 text-current text-right"  id="hs-dropdown-custom-icon-trigger" />

                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700"
                                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                                    <div class=" cursor-pointer  flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                                        wire:key="{{ $edition->id }}"
                                        onclick="Livewire.dispatch('openModal', {component: 'update-institute-edition', arguments: {{ json_encode([$edition->id]) }} })"
                                        >
                                        View Edition
                                    </div>
                                    <div class=" cursor-pointer  flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                                        wire:key="{{ $edition->id }}"
                                        onclick="Livewire.dispatch('openModal', {component: 'update-institute-edition', arguments: {{ json_encode([$edition->id]) }} })"
                                        >
                                        Edit Edition
                                    </div>
                                    <div class=" cursor-pointer  flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                                        wire:key="{{ $edition->id }}"
                                        onclick="Livewire.dispatch('openModal', {component: 'delete-edition', arguments: {{ json_encode([$edition->id]) }} })"
                                        >
                                        Delete Edition
                                    </div>

                                </div>
                            </div>
                        </div>

                    </td>

                </tr>
            @endforeach

        </x-slot>

        <x-slot name="pagination">
            {!! $editions->links() !!}
        </x-slot>
    </x-table>




</div>
