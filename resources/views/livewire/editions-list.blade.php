<div class="p-4">
    <x-table :showPagination="true">
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

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                            Action
                        </span>
                    </div>
                </th>




            </tr>
        </x-slot>
        <x-slot name="tableBody">

            @foreach ($editions as $edition)
                <tr>

                    <td class="px-4 w-px whitespace-nowrap cursor-pointer " data-hs-overlay="#hs-scroll-inside-body-modal">
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
                        <div class="px-6 py-3 text-right gap-2 flex items-center cursor-pointer ">

                            <div class="hs-dropdown relative inline-flex">
                                <button id="hs-dropdown-custom-icon-trigger" type="button"
                                    class="hs-dropdown-toggle flex justify-center items-center w-9 h-9 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    <x-lineawesome-ellipsis-h-solid class="w-6 h-6 text-current" />
                                </button>

                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700"
                                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                                        href="#"
                                        onclick="Livewire.dispatch('openModal', {component: 'update-institute-edition', arguments: {{ json_encode([$edition->id]) }} })">
                                        Edit
                                    </a>

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


    <div id="hs-scroll-inside-body-modal"
        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-3xl sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]">
            <div
                class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        Add Insurance Company
                    </h3>
                    <button type="button"
                        class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                        data-hs-overlay="#hs-scroll-inside-body-modal">
                        <span class="sr-only">Close</span>
                        <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">

                    <!-- content -->
                    <!-- Grid -->
                    <div id="instituteModal" class="space-y-4 sm:space-y-6">

                        <div class="flex justify-start items-center">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5 ">
                                    <input id="hs-checkbox-delete" name="active" type="checkbox" wire:model="active"
                                        class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        aria-describedby="hs-checkbox-delete-description" checked>
                                </div>
                                <label for="hs-checkbox-delete" class="ms-3">
                                    <span class="block text-sm font-semibold text-gray-800 dark:text-gray-300">Mark
                                        Active</span>
                                    <span class="block text-sm font-semibold text-gray-800 dark:text-gray-300">
                                        Editions marked "Active" becomes available for Payment and Registration!
                                    </span>
                                </label>
                            </div>
                            <x-input-error for="active" class="mt-2" />
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-project-name"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Edition Title
                            </label>

                            <input id="af-submit-app-project-name" type="text" name="title"
                                wire:model.live="title"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="Enter Publication Title Eg . Mindset Transformation Institute 2024 Edition">

                            <x-input-error for="title" class="mt-2" />
                        </div>
                        <div class="space-y-2">
                            <label for="af-submit-app-project-name"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Edition Seo Keywords
                            </label>

                            <input id="af-submit-app-project-name" type="text" name="seo" wire:model="seo"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="Enter Comma seperated keywords for Edition">

                            <x-input-error for="seo" class="mt-2" />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="af-submit-app-project-name"
                                    class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200 capitalize">

                                    Start Date
                                </label>

                                <input id="af-submit-app-project-startDate" type="date" name="startDate"
                                    wire:model="startDate"
                                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                    placeholder="Enter Edition startDate. ">

                                <x-input-error for="startDate" class="mt-2" />
                            </div>
                            <div class="space-y-2">
                                <label for="af-submit-app-project-name"
                                    class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200 capitalize">

                                    End Date
                                </label>

                                <input id="af-submit-app-project-endDate" type="date" name="endDate"
                                    wire:model="endDate"
                                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                    placeholder="Enter Edition endDate. ">

                                <x-input-error for="endDate" class="mt-2" />
                            </div>

                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-description"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Overview
                            </label>

                            <textarea id="af-submit-app-description" name="overview" wire:model="overview"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                rows="6"
                                placeholder="A detailed summary will better explain your products to the audiences. Our users will see this in your dedicated product page."></textarea>
                            <x-input-error for="overview" class="mt-2" />
                        </div>
                        <div class="space-y-2">
                            <label for="af-submit-app-description"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                About This Edition
                            </label>

                            <textarea id="af-submit-app-description" name="about" wire:model="about"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                rows="6"
                                placeholder="A detailed summary will better explain your products to the audiences. Our users will see this in your dedicated product page."></textarea>
                            <x-input-error for="about" class="mt-2" />
                        </div>

                        <div class="space-y-2">
                            <x-input-error for="banner" class="mt-2" />
                            <label for="banner"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Banner For This Edition For
                            </label>


                            <label for="banner"
                                class="group p-4 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-300  rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-gray-700">
                                <input id="banner" name="banner" wire:model="banner" type="file"
                                    class="sr-only">
                                <svg class="w-10 h-10 mx-auto text-gray-400 dark:text-gray-600"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z" />
                                    <path
                                        d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                </svg>
                                <span class="mt-2 block text-sm text-gray-800 dark:text-gray-200">
                                    Browse your device or <span class="group-hover:text-blue-700 text-blue-600">drag 'n
                                        drop'</span>
                                </span>
                                <span class="mt-1 block text-xs text-gray-500">
                                    Maximum file size is 2 MB
                                </span>
                            </label>
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-category"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Mother Institute
                            </label>

                            <select id="af-submit-app-category" name="category" wire:model="instituteId"
                                class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                <option selected>Select an Institute...</option>

                                @foreach ($institutes as $institute)
                                    <option wire:key="{{ $institute->id }}" value="{{ $institute->id }}">
                                        {{ $institute->name }}
                                    </option>
                                @endforeach
                            </select>

                            <x-input-error for="category_id" class="mt-2" />
                        </div>

                        <div class="space-y-2">
                            <label for="banner"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                <div>
                                    Add introductory Text
                                </div>
                                <div>
                                    <ul role="list"
                                        class="marker:text-blue-600 list-disc ps-5 space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                        <li>
                                            Answer the What, Where why etc.
                                        </li>

                                    </ul>
                                </div>
                            </label>

                            <div>
                                <textarea name="body" id="bodycontent" spellcheck="true" rows="" wire:model="body"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm
                         dark:bg-firefly-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="{{ __('You Can copy from any word processor Content (Eg. Microsoft Word.)') }}">{{ old('body') }}</textarea>
                                <x-input-error for="body" class="mt-2" />
                            </div>


                        </div>
                    </div>
                    <!-- End Grid -->
                    <!-- End of content -->

                </div>

                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                    <!-- close button -->
                    <button type="button"
                        class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                        data-hs-overlay="#hs-scroll-inside-body-modal">
                        Close
                    </button>
                    <!-- End of close button -->
                    <a class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                        href="#">
                        Save changes
                    </a>

                </div>
            </div>
        </div>
    </div>

</div>
