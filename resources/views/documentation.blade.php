<x-app-layout>
    <x-backend-page-header modelName="Documentation" description="Application Documentation" add-button="false"
        class="mx-4">
        <x-heroicon-o-question-mark-circle class="w-6 h-6 text-current" />
    </x-backend-page-header>

    <div class=" px-4">

        <button type="button"
            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
            data-hs-overlay="#hs-overlay-right">
            Toggle right offcanvas
        </button>

        <div id="hs-overlay-right"
            class="hs-overlay hs-overlay-open:translate-x-0  translate-x-full fixed
            top-0 right-0 transition-all duration-300 transform h-full max-w-xs
            w-full z-[60] bg-white border-l dark:bg-gray-800 dark:border-gray-700 hidden"
            tabindex="-1">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white">
                    Offcanvas title
                </h3>
                <button type="button"
                    class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white text-sm dark:text-gray-500 dark:hover:text-gray-400 dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                    data-hs-overlay="#hs-overlay-right">
                    <span class="sr-only">Close modal</span>
                    <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                            fill="currentColor" />
                    </svg>
                </button>
            </div>
            <div class="p-4 min-h-screen">
                <p class="text-gray-800 dark:text-gray-400">
                    Some text as placeholder. In real life you can have the elements you have chosen. Like, text,
                    images, lists, etc.
                </p>
            </div>
        </div>


        <button type="button"
            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
            data-hs-overlay="#hs-scroll-inside-body-modal">
            Add insurance Company
        </button>

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
                                        <input id="hs-checkbox-delete" name="active" type="checkbox"
                                            wire:model="active"
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
                                        Browse your device or <span
                                            class="group-hover:text-blue-700 text-blue-600">drag 'n
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





        {{ Auth::user()->lastSuccessfulLoginAt()->diffForHumans() }}

        <div
            class="relative overflow-hidden before:absolute before:top-1/2 before:left-1/2 before:bg-[url('../svg/component/hyperdrive.svg')] before:bg-no-repeat before:bg-center before:w-full before:h-96 before:-z-[1] before:transform before:-translate-y-1/2 before:-translate-x-1/2 dark:before:bg-[url('../svg/component/hyperdrive-dark.svg')]">
            <div class="max-w-3xl mx-auto relative text-center px-4 sm:px-6 lg:px-8 py-10 md:py-24">
                <div
                    class="inline-block bg-gradient-to-tl from-blue-600 via-transparent to-purple-400 p-px rounded-md mb-3">
                    <div
                        class="bg-white rounded-md py-1.5 px-3 text-3xl font-bold md:text-4xl lg:text-5xl lg:leading-tight dark:bg-slate-900">
                        <span class="bg-clip-text bg-gradient-to-tl from-blue-600 to-purple-400 text-transparent">
                            120+
                        </span>
                    </div>
                </div>

                <h1 class="text-3xl font-bold md:text-4xl lg:text-5xl lg:leading-tight dark:text-white">Application
                    Documentation With Examples</h1>
                <p class="mt-4 md:text-lg text-gray-600 dark:text-gray-400">Quickly get a project started with any
                    of
                    our
                    examples ranging from using parts of the UI to custom components and layouts using Tailwind CSS.
                </p>

                <div class="mt-5">
                    <a class="inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:focus:ring-offset-gray-800"
                        href="https://github.com/htmlstreamofficial/preline/tree/main/examples/html" target="_blank">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z">
                            </path>
                        </svg>
                        Download examples
                    </a>
                </div>
            </div>
        </div>

        <!-- Icon Blocks -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-12">
                <!-- Icon Block -->
                <div>
                    <svg class="w-9 h-9 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                    <div
                        class="bg-gradient-to-r from-gray-200 to-white/0 h-0.5 mt-6 dark:from-gray-700 dark:to-slate-900/0">
                        <div class="bg-gray-400 w-9 h-0.5"></div>
                    </div>
                    <div class="mt-5">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Responsive</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Responsive, and mobile-first project on
                            the
                            web
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div>
                    <svg class="w-9 h-9 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z" />
                        <path
                            d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z" />
                        <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" />
                    </svg>
                    <div
                        class="bg-gradient-to-r from-gray-200 to-white/0 h-0.5 mt-6 dark:from-gray-700 dark:to-slate-900/0">
                        <div class="bg-gray-400 w-9 h-0.5"></div>
                    </div>
                    <div class="mt-5">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Customizable</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Components are easily customized and
                            extendable
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div>
                    <svg class="w-9 h-9 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                        <path
                            d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                    </svg>
                    <div
                        class="bg-gradient-to-r from-gray-200 to-white/0 h-0.5 mt-6 dark:from-gray-700 dark:to-slate-900/0">
                        <div class="bg-gray-400 w-9 h-0.5"></div>
                    </div>
                    <div class="mt-5">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Documentation</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Every component and plugin is well
                            documented
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->

                <!-- Icon Block -->
                <div>
                    <svg class="w-9 h-9 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path
                            d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg>
                    <div
                        class="bg-gradient-to-r from-gray-200 to-white/0 h-0.5 mt-6 dark:from-gray-700 dark:to-slate-900/0">
                        <div class="bg-gray-400 w-9 h-0.5"></div>
                    </div>
                    <div class="mt-5">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">24/7 Support</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Contact us 24 hours a day, 7 days a week
                        </p>
                    </div>
                </div>
                <!-- End Icon Block -->
            </div>
        </div>
        <!-- End Icon Blocks -->

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>






        <div class="grid md:grid-cols-12 gap-4 md:gap-2">
            <div class=" col-span-12 md:col-span-3 md:border-r border-gray-200 dark:border-gray-700  md:h-full ">
                <nav class="flex flex-col " aria-label="Tabs" role="tablist">

                    <button type="button"
                        class="
                        border-dashed border-t border-b dark:border-slate-800	 text-left flex gap-y-6 w-full h-full hover:bg-gray-100 p-5 transition-all dark:hover:bg-white/[.075] hs-tab-active:text-gray-600 hs-tab-active:bg-gray-100
                         dark:hs-tab-active:bg-slate-900 active"
                        id="basic-tabs-item-1" data-hs-tab="#basic-tabs-1" aria-controls="basic-tabs-1"
                        role="tab">

                        <x-heroicon-o-user-circle
                            class=" flex-shrink-0 w-8 h-8 text-gray-800 mt-0.5 mr-6 dark:text-gray-200" />
                        <div>
                            <div>
                                <h3 class="block font-bold text-gray-800 dark:text-white">Profile Information</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-xs">The simplest way to keep your
                                    portfolio
                                    always
                                    up-to-date.</p>
                            </div>
                        </div>

                    </button>
                    <button type="button"
                        class="
                        border-dashed border-t border-b dark:border-slate-800	 text-left flex gap-y-6 w-full h-full hover:bg-gray-100 p-5 transition-all dark:hover:bg-white/[.075] hs-tab-active:text-gray-600 hs-tab-active:bg-gray-100
                         dark:hs-tab-active:bg-slate-900 active"
                        id="basic-tabs-item-2" data-hs-tab="#basic-tabs-2" aria-controls="basic-tabs-2"
                        role="tab">
                        <x-heroicon-o-lock-closed
                            class=" flex-shrink-0 w-8 h-8 text-gray-800 mt-0.5 mr-6 dark:text-gray-200" />
                        <div>
                            <div>
                                <h3 class="block font-bold text-gray-800 dark:text-white">Update Password</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-xs">Ensure your account is using a
                                    long,
                                    random
                                    password to stay secure.

                                </p>
                            </div>
                        </div>
                    </button>
                    <button type="button"
                        class="
                        border-dashed border-t border-b dark:border-slate-800	 text-left flex gap-y-6 w-full h-full hover:bg-gray-100 p-5 transition-all dark:hover:bg-white/[.075] hs-tab-active:text-gray-600 hs-tab-active:bg-gray-100
                         dark:hs-tab-active:bg-slate-900 active"
                        id="basic-tabs-item-3" data-hs-tab="#basic-tabs-3" aria-controls="basic-tabs-3"
                        role="tab">
                        <x-heroicon-o-shield-check
                            class=" flex-shrink-0 w-8 h-8 text-gray-800 mt-0.5 mr-6 dark:text-gray-200" />
                        <div>
                            <div>
                                <h3 class="block font-bold text-gray-800 dark:text-white">Multifactor Auth (2FA)
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 text-xs">Add additional security to your
                                    account
                                    using
                                    two factor authentication.</p>
                            </div>
                        </div>
                    </button>
                    <button type="button"
                        class="
                        border-dashed border-t border-b dark:border-slate-800	 text-left flex gap-y-6 w-full h-full hover:bg-gray-100 p-5 transition-all dark:hover:bg-white/[.075] hs-tab-active:text-gray-600 hs-tab-active:bg-gray-100
                         dark:hs-tab-active:bg-slate-900 active"
                        id="basic-tabs-item-4" data-hs-tab="#basic-tabs-4" aria-controls="basic-tabs-4"
                        role="tab">
                        <x-heroicon-o-computer-desktop
                            class=" flex-shrink-0 w-8 h-8 text-gray-800 mt-0.5 mr-6 dark:text-gray-200" />
                        <div>
                            <div>
                                <h3 class="block font-bold text-gray-800 dark:text-white">Manage Browser Sessions</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-xs">Manage and log out your active
                                    sessions
                                    on other
                                    browsers and devices.</p>
                            </div>
                        </div>
                    </button>
                    <button type="button"
                        class="
                        border-dashed border-t border-b dark:border-slate-800	 text-left flex gap-y-6 w-full h-full hover:bg-gray-100 p-5 transition-all dark:hover:bg-white/[.075] hs-tab-active:text-gray-600 hs-tab-active:bg-gray-100
                         dark:hs-tab-active:bg-slate-900 active"
                        id="basic-tabs-item-5" data-hs-tab="#basic-tabs-5" aria-controls="basic-tabs-5"
                        role="tab">
                        <x-heroicon-o-minus-circle
                            class=" flex-shrink-0 w-8 h-8 text-gray-800 mt-0.5 mr-6 dark:text-gray-200" />
                        <div>
                            <div>
                                <h3 class="block font-bold text-gray-800 dark:text-white">Delete Account</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-xs">Permanently delete your account.
                                </p>
                            </div>
                        </div>
                    </button>


                </nav>
            </div>

            <div class="col-span-12 md:col-span-9 ">
                <div id="basic-tabs-1" role="tabpanel" aria-labelledby="basic-tabs-item-1">
                    <div class="mx-auto w-full">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            <x-backend-page-header modelName="Profile " description="Profile Details"
                                add-button="false" class="mx-4">
                                <x-heroicon-o-user-circle class="w-5 h-5 text-current" />
                            </x-backend-page-header>

                            <livewire:update-profile />
                        @endif
                    </div>
                </div>
                <div id="basic-tabs-2" class="hidden" role="tabpanel" aria-labelledby="basic-tabs-item-2">
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <x-backend-page-header modelName="Password " description="Password Details"
                            add-button="false" class="mx-4">
                            <x-heroicon-o-lock-closed class="w-5 h-5 text-current" />
                        </x-backend-page-header>

                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>
                    @endif
                </div>
                <div id="basic-tabs-3" class="hidden" role="tabpanel" aria-labelledby="basic-tabs-item-3">
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <x-backend-page-header modelName="Security " description="Multifactor Authentication"
                            add-button="false" class="mx-4">
                            <x-heroicon-o-shield-check class="w-5 h-5 text-current" />
                        </x-backend-page-header>
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
                    @endif
                </div>
                <div id="basic-tabs-4" class="hidden" role="tabpanel" aria-labelledby="basic-tabs-item-4">
                    <x-backend-page-header modelName="Sessions " description="Manage Sessions" add-button="false"
                        class="mx-4">
                        <x-heroicon-o-cpu-chip class="w-5 h-5 text-current" />
                    </x-backend-page-header>
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
                <div id="basic-tabs-5" class="hidden" role="tabpanel" aria-labelledby="basic-tabs-item-5">
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <x-backend-page-header modelName="Account " description="Account Deletion" add-button="false"
                            class="mx-4">
                            <x-heroicon-o-trash class="w-5 h-5 text-current" />
                        </x-backend-page-header>

                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <!-- Jumbotron -->
        <div class="p-6 shadow rounded-lg bg-firefly-50 dark:bg-firefly-900 dark:text-white ">
            {{-- <h2 class="font-semibold text-3xl mb-5">Hello world!</h2> --}}
            <p>
                This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                to featured content or information.
            </p>
            <hr class="my-6 border-firefly-300" />
            <p>
                It uses utility classes for typography and spacing to space content out within the larger
                container.
            </p>
            <button type="button"
                class="inline-block px-6 py-2.5 mt-4 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                data-mdb-ripple="true" data-mdb-ripple-color="light">
                Learn more
            </button>
        </div>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-welcome />
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
