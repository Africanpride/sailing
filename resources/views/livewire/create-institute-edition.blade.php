<x-institute-modal formAction="storeInstituteEdition">

    <x-slot name="title">
        <div class="absolute top-3 right-3 cursor-pointer">
            <div
                class="cursor-pointer delay-200  duration-500 bg-red-50 dark:bg-red-500/10 transition-colors dark:hover:bg-red-500/20  hover:bg-red-100  grid h-8 place-items-center rounded-full w-8">
                <x-heroicon-o-x-circle class="w-6 h-6 text-red-500" wire:click="$dispatch('closeModal')" />
            </div>
        </div>
        <div class=" text-md ">Add New Announcement </div>
    </x-slot>

    <x-slot name="content">

        <!-- Card -->
        <div class="bg-gray-200 rounded-xl shadow dark:bg-slate-950 p-5">


            <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                <!-- Grid -->
                <div class="space-y-4 sm:space-y-6">

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

                        <input id="af-submit-app-project-name" type="text" name="title" wire:model.live="title"
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
                            <input id="banner" name="banner" wire:model="banner" type="file" class="sr-only">
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
                                <option wire:key="{{ $institute->id }}" value="{{ $institute->id }}">{{ $institute->name }}</option>
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
                                <ul role="list" class="marker:text-blue-600 list-disc ps-5 space-y-2 text-sm text-gray-600 dark:text-gray-400">
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

                <!-- End Section -->
                {{-- <div class="mt-5 flex justify-center gap-x-2">


                </div> --}}
            </div>
        </div>
        <!-- End Card -->
    </x-slot>

    <x-slot name="buttons">
        <x-reset-button type="reset" class="rounded bg-red-500" wire:click="$dispatch('closeModal')">Cancel
        </x-reset-button>


        {{-- <x-submit-button class="rounded">Submit</x-submit-button> --}}
        <button type="submit"
        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        {{ __('Save Institute Edition') }}
    </button>

    </x-slot>

</x-institute-modal>


{{-- <div>

    <form wire:submit.prevent="save">
        @csrf
        <!-- Card -->
        <div class="bg-gray-200 rounded-xl shadow dark:bg-slate-950 p-5">


            <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                <!-- Grid -->
                <div class="space-y-4 sm:space-y-6">

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

                        <input id="af-submit-app-project-name" type="text" name="title" wire:model.live="title"
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
                            <input id="banner" name="banner" wire:model="banner" type="file" class="sr-only">
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
                                <option wire:key="{{ $institute->id }}" value="{{ $institute->id }}">{{ $institute->name }}</option>
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
                                <ul role="list" class="marker:text-blue-600 list-disc ps-5 space-y-2 text-sm text-gray-600 dark:text-gray-400">
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

                <!-- End Section -->
                <div class="mt-5 flex justify-center gap-x-2">

                    <button type="submit"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        {{ __('Save Institute Edition') }}
                    </button>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </form>
</div> --}}
