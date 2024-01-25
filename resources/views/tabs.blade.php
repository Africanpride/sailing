<x-app-layout>
    <x-backend-page-header modelName="Documentation" description="Application Documentation" add-button="false"
        class="mx-4">
        <x-heroicon-o-question-mark-circle class="w-6 h-6 text-current" />
    </x-backend-page-header>

    <div class="p-8">

        <div x-data="{ value: 0 }">
            <div class="w-full flex justify-between items-center gap-x-5">
                <div class="grow">
                    <input x-model="value" wire:model="price"
                           class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 dark:text-white"
                           type="text"
                           >
                </div>
                <div class="flex justify-end items-center gap-x-1.5">
                    <button type="button"
                            class="w-6 h-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"

                            @click="value = Math.max(value - 1, 0)">
                        <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M5 12h14"/>
                        </svg>
                    </button>
                    <button type="button"
                            class="w-6 h-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"

                            @click="value =parseFloat(value) + 1">
                        <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="M12 5v14"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
