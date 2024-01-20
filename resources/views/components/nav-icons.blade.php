<div class="absolute w-full flex justify-between items-center gap-4 overflow-hidden px-5">
    <div class="hs-tooltip inline-block">
        <button type="button" class="hs-tooltip-toggle"  data-hs-overlay="#setting-modal">
            <x-heroicon-o-cog-8-tooth
                class="w-6 h-6 dark:text-firefly-700 dark:hover:text-white text-current" />
            <span
                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-black"
                role="tooltip">
                Settings
            </span>
        </button>
    </div>

    <div class="hs-tooltip inline-block">
    <a href="{{ url('documentation') }}">
        <button type="button" class="hs-tooltip-toggle">
            <x-heroicon-o-question-mark-circle
                class="w-6 h-6 dark:text-firefly-700 dark:hover:text-white text-current" />
            <span
                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-black"
                role="tooltip">
                Support Center
            </span>
        </button>
    </a>
    </div>

    <div class="hs-tooltip inline-block">
        <button type="button" class="hs-tooltip-toggle ">
            <x-heroicon-o-arrow-left-on-rectangle
            data-hs-overlay="#hs-sign-out-alert-small-window"
            class="w-6 h-6 dark:text-firefly-700 dark:hover:text-white text-current"
            />
            <span
                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-black"
                role="tooltip">
               Logout
            </span>
        </button>


    </div>


    </div>
