<x-app-layout>
    <x-backend-page-header model-name="My Applications" description="My Institute Applications" add-button="false"
        class="mx-2">
        <x-heroicon-o-user-group class="w-5 h-5 text-current" />
    </x-backend-page-header>

    <div class="p-4">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="flex space-x-2" aria-label="Tabs" role="tablist">

                <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-blue-500 active"
                    id="tabs-with-badges-item-1" data-hs-tab="#tabs-with-badges-1" aria-controls="tabs-with-badges-1"
                    role="tab">
                    Total Applications <span
                        class="hs-tab-active:bg-blue-100 hs-tab-active:text-blue-600 dark:hs-tab-active:bg-blue-800 dark:hs-tab-active:text-white ms-1 px-2.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">{{ $applications->count() }}</span>
                </button>


            </nav>
        </div>

        <div class="mt-3">
            <div id="tabs-with-badges-1" role="tabpanel" aria-labelledby="tabs-with-badges-item-1">
                <livewire:my-application-data />
            </div>
        </div>
    </div>

</x-app-layout>
