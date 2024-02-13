<x-app-layout>

    <x-backend-page-header model-name="Institutes " description="Create New Publication" add-button="false" class="mx-4">
        <x-heroicon-o-user-group class="w-5 h-5 text-current" />
    </x-backend-page-header>

    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <form method="POST" action="{{ route('publications.update', $publication) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <!-- Card -->
            <div class="bg-gray-200 rounded-xl shadow dark:bg-slate-950 p-5">


                <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                    <!-- Grid -->
                    <div class="space-y-4 sm:space-y-6">

                        <div class="flex justify-end items-center">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5 ">
                                    <input id="hs-checkbox-delete" name="active" type="checkbox"
                                        class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        aria-describedby="hs-checkbox-delete-description"
                                        {{ $publication->active ? 'checked' : '' }}>


                                </div>
                                <label for="hs-checkbox-delete" class="ms-3">
                                    <span class="block text-sm font-semibold text-gray-800 dark:text-gray-300">Mark
                                        Published</span>
                                </label>
                            </div>
                            <x-input-error for="active" class="mt-2" />
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-project-name"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Publication Title
                            </label>

                            <input id="af-submit-app-project-name" type="text" name="title"
                                class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                autocomplete="{{ $publication->title }}"
                                placeholder="{{ $publication->title ?? __('News Title.') }}"
                                value="{{ old('title', $publication->title) }}" required />

                            <x-input-error for="title" class="mt-2" />
                        </div>

                        <div class="space-y-2">
                            <label for="af-submit-app-description"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Overview
                            </label>

                            <textarea id="af-submit-app-description" name="overview"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                rows="6" placeholder="{{ $publication->overview ?? __('Publication Overview') }}">{{ old('overview', optional($publication)->overview) }}</textarea>
                            <x-input-error for="overview" class="mt-2" />
                        </div>

                        <div class="space-y-2">
                            <x-input-error for="featured_image" class="mt-2" />
                            <label for="featured_image"
                                class="inline-block text-sm font-medium text-gray-800 mt-2.5 dark:text-gray-200">
                                Featured Image
                            </label>


                            <label for="featured_image"
                                class="group p-4 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-300  rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 dark:border-gray-700">
                                <input id="featured_image" name="featured_image" type="file" class="sr-only">
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

                            <select id="af-submit-app-category" name="category"
                                class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                <option >Select a category</option>
                                @foreach ($categories as $category)
                                    <option selected value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>

                            <x-input-error for="category_id" class="mt-2" />
                        </div>

                        <div class="space-y-2">

                            <div>
                                <textarea name="body" id="bodycontent" spellcheck="true" rows=""
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm
                                 dark:bg-firefly-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="{{ __('You Can copy from any word processor Content (Eg. Microsoft Word.)') }}">{{ old('body', optional($publication)->body) }}</textarea>
                                <x-input-error for="body" class="mt-2" />
                            </div>


                        </div>
                    </div>
                    <!-- End Grid -->

                    <!-- Section -->
                    @can('isParticipant')
                        <div
                            class="py-8 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-gray-700 dark:first:border-transparent">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('Submit publication for Approval') }}
                            </h2>
                            <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('All publications undergo a thorough approval process prior to publication to ensure accuracy, relevance, and adherence to guidelines. This guarantees high-quality content and maintains the integrity of our platform.') }}
                            </p>

                        </div>
                    @endcan

                    <!-- End Section -->
                    <div class="mt-5 flex justify-center gap-x-2">

                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            Update Publication
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </form>
    </div>
    <!-- End Card Section -->


    <x-tinymce-dark-mode-script-and-style />
</x-app-layout>
