<x-app-layout>
    <x-backend-page-header model-name="Institutes " description="Create New Publication" add-button="false" class="mx-4">
        <x-heroicon-o-user-group class="w-5 h-5 text-current" />
    </x-backend-page-header>

    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Card -->
            <div class="bg-gray-200 rounded-xl shadow dark:bg-slate-950 p-5">


                <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                    <!-- Grid -->
                    <div class="space-y-4 sm:space-y-6">

                        <div class="flex justify-end items-center">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5 ">
                                    <input id="hs-checkbox-delete" name="hs-checkbox-delete" type="checkbox"
                                        class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        aria-describedby="hs-checkbox-delete-description" checked>
                                </div>
                                <label for="hs-checkbox-delete" class="ms-3">
                                    <span class="block text-sm font-semibold text-gray-800 dark:text-gray-300">Mark
                                        Published</span>
                                    {{-- <span id="hs-checkbox-delete-description"
                class="block text-sm text-gray-600 dark:text-gray-500">Notify me when this action
                happens.</span> --}}
                                </label>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-project-name"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Publication Title
                            </label>

                            <input id="af-submit-app-project-name" type="text"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="Enter Publication Title">
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-description"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Overview
                            </label>

                            <textarea id="af-submit-app-description"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                rows="6"
                                placeholder="A detailed summary will better explain your products to the audiences. Our users will see this in your dedicated product page."></textarea>
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-upload-images"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Featured Image
                            </label>

                            <label for="af-submit-app-upload-images"
                                class="group p-4 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-gray-700">
                                <input id="af-submit-app-upload-images" name="af-submit-app-upload-images"
                                    type="file" class="sr-only">
                                <svg class="w-10 h-10 mx-auto text-gray-400 dark:text-gray-600"
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
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
                                Category
                            </label>

                            <select id="af-submit-app-category"
                                class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                <option selected>Select a category</option>
                                <option value="" selected disabled hidden>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-description"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Body Content
                            </label>

                            <textarea id="af-submit-app-description"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                rows="6"
                                placeholder="A detailed summary will better explain your products to the audiences. Our users will see this in your dedicated product page."></textarea>
                        </div>
                    </div>
                    <!-- End Grid -->

                    <!-- Section -->
                    @can('isParticipant')
                        <div
                            class="py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700 dark:first:border-transparent">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                Submit publication for Approval
                            </h2>
                            <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('All publications undergo a thorough approval process prior to publication to ensure accuracy, relevance, and adherence to guidelines. This guarantees high-quality content and maintains the integrity of our platform.') }}
                            </p>

                            {{-- <div class="mt-5 flex">
                                <input type="checkbox"
                                    class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                    id="af-submit-application-privacy-check">
                                <label for="af-submit-application-privacy-check"
                                    class="text-sm text-gray-500 ms-2 dark:text-gray-400">Allow us to process your
                                    personal information.</label>
                            </div> --}}
                        </div>
                    @endcan
                    <!-- End Section -->
                    <div class="mt-5 flex justify-center gap-x-2">

                        <button type="button"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Submit Publication
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </form>
    </div>
    <!-- End Card Section -->

    <div class="p-4 space-y-4">
        <div class="bg-slate-500/10 border border-gray-300/20 p-8 rounded-xl">

            <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">

                    <div class="py-2">
                        <x-label for="overview" value="{{ __('Publication Title') }}" />
                        <x-input id="title" type="text" name="title" value=" {{ old('title') }}"
                            class="mt-1 block w-full dark:bg-firefly-900 dark:border-gray-700 dark:text-gray-400"
                            autocomplete placeholder="{{ old('title') }}" required />

                        <x-input-error for="title" class="mt-2" />
                    </div>
                    <div class="flex justify-between py-8 items-center gap-8">
                        <div class="w-2/4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">
                                Select Category
                            </label>
                            <select id="category_id" name="category_id" aria-label="Category"
                                class="form-select mt-1 block w-full rounded-md bg-gray-100 border-transparent
                                        focus:border-blue-500 focus:bg-white focus:ring-0 dark:bg-firefly-900 dark:border-gray-700
                                        dark:text-gray-400">
                                <option value="" selected disabled hidden>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>

                            <x-input-error for="category_id" class="mt-2" />
                        </div>

                        <div class="border border-gray-400/20 p-4  rounded-lg w-2/4">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5 mt-1">
                                    <input id="hs-checkbox-delete" name="active" type="checkbox"
                                        class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        aria-describedby="hs-checkbox-delete-description" checked>
                                </div>
                                <label for="hs-checkbox-delete" class="ml-3">
                                    <span class="block text-sm font-semibold text-gray-800 dark:text-gray-300">Make
                                        Publication Active/Inactive</span>
                                    <span id="hs-checkbox-delete-description"
                                        class="block text-sm text-gray-600 dark:text-gray-500">Tick to make News
                                        Item Available to public.</span>
                                </label>
                            </div>

                            <x-input-error for="active" class="mt-2" />

                        </div>
                    </div>
                    <div class="py-8">
                        <x-label for="overview" value="{{ __('Featured Image') }}" />

                        <input type="file" name="featured_image" id="large-file-input"
                            class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-firefly-900 dark:border-gray-700 dark:text-gray-400
                            file:bg-transparent file:border-0
                            file:bg-gray-100 file:mr-4
                            file:py-3 file:px-4 file:sm:py-5
                            dark:file:bg-gray-700 dark:file:text-gray-400">


                        <x-input-error for="featured_image" class="mt-2" />
                    </div>
                    <div class="">
                        <x-label for="overview" value="{{ __('Overview') }}" />
                        <textarea name="overview" id="overview" spellcheck="true"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm dark:bg-firefly-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="{{ __('News Overview') }}">{{ old('overview') }}</textarea>

                        <x-input-error for="overview" class="mt-2" />
                    </div>

                    <div class="">
                        <textarea name="body" id="open-source-plugins" spellcheck="true"
                            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm dark:bg-firefly-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="{{ __('News Content') }}">{{ old('body') }}</textarea>


                        <x-input-error for="body" class="mt-2" />
                    </div>

                </div>

                <div class="py-8">
                    <x-button>{{ __('Submit') }}</x-button>
                </div>
            </form>
        </div>
    </div>



</x-app-layout>

{{-- @livewire('tinymce-dark-mode-script-and-style') --}}
