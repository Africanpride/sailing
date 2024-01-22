<x-app-layout>
    <x-admin.pageheader model-name="{{ __('Enrollments') }}"
        description="{{ __('Institute Participants & Enrollment Overview') }}" add-button="false"
        class="mx-4 capitalize">
        <x-heroicon-o-finger-print class="w-6 h-6 text-current" />
    </x-admin.pageheader>
    <!-- Table Section -->
    <div class="max-w-[85rem] px-4 py-5 sm:px-6 lg:px-8 lg:py-8 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-firefly-900 dark:border-gray-700">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                    Enrollment List
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Enrollment details for Institutes and participants.
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                        <button id="hs-as-table-table-export-dropdown" type="button"
                                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-firefly-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                <path
                                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                            </svg>
                                            Export
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-[12rem] z-20 bg-white shadow-md rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                                            aria-labelledby="hs-as-table-table-export-dropdown">
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span
                                                    class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">
                                                    Options
                                                </span>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                    href="#">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                        <path
                                                            d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                                    </svg>
                                                    Copy
                                                </a>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                    href="#">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                        <path
                                                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                                    </svg>
                                                    Print
                                                </a>
                                            </div>
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span
                                                    class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">
                                                    Download options
                                                </span>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                    href="#">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                                        <path
                                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                    </svg>
                                                    Excel
                                                </a>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                    href="#">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252.19.061.411.091.665.091.338 0 .624-.053.859-.158.236-.105.416-.252.539-.44.125-.189.187-.408.187-.656 0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357 2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384.125-.101.296-.152.512-.152.143 0 .266.023.37.068a.624.624 0 0 1 .246.181.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566 1.21 1.21 0 0 0-.5-.41 1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15-.225.099-.4.24-.527.421-.127.182-.19.395-.19.639 0 .201.04.376.122.524.082.149.2.27.352.367.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326.505.505 0 0 1-.085.29.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964 1.441 1.441 0 0 0-.489-.272 1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223-.25.148-.44.359-.572.632-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976.131.271.322.48.572.626.25.145.554.217.914.217.293 0 .554-.055.785-.164.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363.7.7 0 0 1-.272.25.874.874 0 0 1-.401.087.845.845 0 0 1-.478-.132.833.833 0 0 1-.299-.392 1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z" />
                                                    </svg>
                                                    .CSV
                                                </a>
                                                <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                    href="#">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                                        <path
                                                            d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                                                    </svg>
                                                    .PDF
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hs-dropdown relative inline-block [--placement:bottom-right]"
                                        data-hs-dropdown-auto-close="inside">
                                        <button id="hs-as-table-table-filter-dropdown" type="button"
                                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-firefly-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                            </svg>
                                            Filter
                                            <span
                                                class="inline-flex items-center gap-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium border border-gray-300 text-gray-800 dark:border-gray-700 dark:text-gray-300">
                                                2
                                            </span>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[12rem] z-20 bg-white shadow-md rounded-lg dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                                            aria-labelledby="hs-as-table-table-filter-dropdown">
                                            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                                <label for="hs-as-filters-dropdown-frequency" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-frequency" checked>
                                                    <span
                                                        class="ml-3 text-sm text-gray-800 dark:text-gray-200">Frequency</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-status" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-status" checked>
                                                    <span
                                                        class="ml-3 text-sm text-gray-800 dark:text-gray-200">Status</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-created" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-created">
                                                    <span
                                                        class="ml-3 text-sm text-gray-800 dark:text-gray-200">Created</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-due-date" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-due-date">
                                                    <span class="ml-3 text-sm text-gray-800 dark:text-gray-200">Due
                                                        Date</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-amount" class="flex py-2.5 px-3">
                                                    <input type="checkbox"
                                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-as-filters-dropdown-amount">
                                                    <span
                                                        class="ml-3 text-sm text-gray-800 dark:text-gray-200">Amount</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button"
                                        class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg>
                                        Download all
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left">
                                        <a class="group inline-flex items-center gap-x-2" href="#">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Institute
                                            </span>
                                            <div
                                                class="flex justify-center items-center w-5 h-5 border border-gray-200 group-hover:bg-gray-200 text-gray-400 rounded dark:border-gray-700 dark:group-hover:bg-gray-700 dark:text-gray-400">
                                                <svg class="w-2.5 h-2.5" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.55921 0.287451C7.86808 -0.0958171 8.40096 -0.0958167 8.70982 0.287451L12.9295 5.52367C13.3857 6.08979 13.031 7 12.3542 7H3.91488C3.23806 7 2.88336 6.08979 3.33957 5.52367L7.55921 0.287451Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.70983 15.7125C8.40096 16.0958 7.86808 16.0958 7.55921 15.7125L3.33957 10.4763C2.88336 9.9102 3.23806 9 3.91488 9H12.3542C13.031 9 13.3857 9.9102 12.9295 10.4763L8.70983 15.7125Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>
                                        </a>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left">
                                        <a class="group inline-flex items-center gap-x-2" href="#">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Description
                                            </span>
                                            <div
                                                class="flex justify-center items-center w-5 h-5 border border-gray-200 group-hover:bg-gray-200 text-gray-400 rounded dark:border-gray-700 dark:group-hover:bg-gray-700 dark:text-gray-400">
                                                <svg class="w-2.5 h-2.5" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.55921 0.287451C7.86808 -0.0958171 8.40096 -0.0958167 8.70982 0.287451L12.9295 5.52367C13.3857 6.08979 13.031 7 12.3542 7H3.91488C3.23806 7 2.88336 6.08979 3.33957 5.52367L7.55921 0.287451Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.70983 15.7125C8.40096 16.0958 7.86808 16.0958 7.55921 15.7125L3.33957 10.4763C2.88336 9.9102 3.23806 9 3.91488 9H12.3542C13.031 9 13.3857 9.9102 12.9295 10.4763L8.70983 15.7125Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>
                                        </a>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left">
                                        <a class="group inline-flex items-center gap-x-2" href="#">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Progress
                                            </span>
                                            <div
                                                class="flex justify-center items-center w-5 h-5 border border-gray-200 group-hover:bg-gray-200 text-gray-400 rounded dark:border-gray-700 dark:group-hover:bg-gray-700 dark:text-gray-400">
                                                <svg class="w-2.5 h-2.5" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.55921 0.287451C7.86808 -0.0958171 8.40096 -0.0958167 8.70982 0.287451L12.9295 5.52367C13.3857 6.08979 13.031 7 12.3542 7H3.91488C3.23806 7 2.88336 6.08979 3.33957 5.52367L7.55921 0.287451Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.70983 15.7125C8.40096 16.0958 7.86808 16.0958 7.55921 15.7125L3.33957 10.4763C2.88336 9.9102 3.23806 9 3.91488 9H12.3542C13.031 9 13.3857 9.9102 12.9295 10.4763L8.70983 15.7125Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>
                                        </a>
                                    </th>


                                    <th scope="col" class="px-6 py-3 text-left">
                                        <a class="group inline-flex items-center gap-x-2" href="#">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                            Rating
                                            </span>
                                            <div
                                                class="flex justify-center items-center w-5 h-5 border border-gray-200 group-hover:bg-gray-200 text-gray-400 rounded dark:border-gray-700 dark:group-hover:bg-gray-700 dark:text-gray-400">
                                                <svg class="w-2.5 h-2.5" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.55921 0.287451C7.86808 -0.0958171 8.40096 -0.0958167 8.70982 0.287451L12.9295 5.52367C13.3857 6.08979 13.031 7 12.3542 7H3.91488C3.23806 7 2.88336 6.08979 3.33957 5.52367L7.55921 0.287451Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.70983 15.7125C8.40096 16.0958 7.86808 16.0958 7.55921 15.7125L3.33957 10.4763C2.88336 9.9102 3.23806 9 3.91488 9H12.3542C13.031 9 13.3857 9.9102 12.9295 10.4763L8.70983 15.7125Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>
                                        </a>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left">
                                        <a class="group inline-flex items-center gap-x-2" href="#">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Participants
                                            </span>
                                            <div
                                                class="flex justify-center items-center w-5 h-5 border border-gray-200 group-hover:bg-gray-200 text-gray-400 rounded dark:border-gray-700 dark:group-hover:bg-gray-700 dark:text-gray-400">
                                                <svg class="w-2.5 h-2.5" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.55921 0.287451C7.86808 -0.0958171 8.40096 -0.0958167 8.70982 0.287451L12.9295 5.52367C13.3857 6.08979 13.031 7 12.3542 7H3.91488C3.23806 7 2.88336 6.08979 3.33957 5.52367L7.55921 0.287451Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.70983 15.7125C8.40096 16.0958 7.86808 16.0958 7.55921 15.7125L3.33957 10.4763C2.88336 9.9102 3.23806 9 3.91488 9H12.3542C13.031 9 13.3857 9.9102 12.9295 10.4763L8.70983 15.7125Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>
                                        </a>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-left">
                                        <a class="group inline-flex items-center gap-x-2" href="#">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Action
                                            </span>
                                            <div
                                                class="flex justify-center items-center w-5 h-5 border border-gray-200 group-hover:bg-gray-200 text-gray-400 rounded dark:border-gray-700 dark:group-hover:bg-gray-700 dark:text-gray-400">
                                                <svg class="w-2.5 h-2.5" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.55921 0.287451C7.86808 -0.0958171 8.40096 -0.0958167 8.70982 0.287451L12.9295 5.52367C13.3857 6.08979 13.031 7 12.3542 7H3.91488C3.23806 7 2.88336 6.08979 3.33957 5.52367L7.55921 0.287451Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.70983 15.7125C8.40096 16.0958 7.86808 16.0958 7.55921 15.7125L3.33957 10.4763C2.88336 9.9102 3.23806 9 3.91488 9H12.3542C13.031 9 13.3857 9.9102 12.9295 10.4763L8.70983 15.7125Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>
                                        </a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($institutes as $institute)
                                    <tr class="bg-white hover:bg-gray-50 dark:bg-firefly-900 dark:hover:bg-slate-800">
                                        <td class="h-px w-px whitespace-nowrap">
                                            <a class="block relative z-10" href="#">
                                                <div class="px-6 py-2">
                                                    <div class="flex items-center">
                                                        <img class="h-[2.375rem] w-[2.375rem] rounded-full"
                                                            src="{{ $institute->institute_logo }}"
                                                            alt="{{ $institute->name }}">
                                                        <div class="ml-2">
                                                            <h5
                                                                class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                                                <span class="uppercase text-sm">
                                                                    {{ $institute->acronym . ' ' . Carbon\Carbon::parse($institute->startDate)->format('Y') }}
                                                                </span>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="h-px w-72 min-w-[18rem]">
                                            <a class="block relative z-10" href="#">
                                                <div class="px-6 py-2">
                                                    <p class="text-sm text-gray-500">Our group promotes and sells
                                                        products
                                                        and services by leveraging online marketing tactics</p>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <a class="block relative z-10" href="#">
                                                <div class="px-6 py-2">

                                                   <div class="inline-flex gap-x-2 items-center">

                                                    <div class="flex flex-nowrap justify-start w-12 h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
                                                        <div class="bg-blue-500 dark:bg-yellow-400 overflow-hidden transition duration-300" role="progressbar" style="width: {{ $institute->progress }}%" aria-valuenow="{{ $institute->progress }}" aria-valuemin="0" aria-valuemax="100">
                                                        </div>

                                                    </div>
                                                    <span class="text-sm dark:text-white">{{ $institute->progress }}%</span>

                                                   </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <a class="block relative z-10" href="#">
                                                <div class="px-6 py-2 flex gap-x-1">
                                                    <svg class="w-3 h-3 text-gray-800 dark:text-gray-200"
                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-gray-800 dark:text-gray-200"
                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-gray-800 dark:text-gray-200"
                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-gray-800 dark:text-gray-200"
                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-transparent"
                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <a class="block relative z-10" href="#">
                                                <div class="px-6 py-2 flex -space-x-2">
                                                    <div class="flex items-center pl-2">
                                                        @foreach ($institute->participants->take(5) as $participant)
                                                            <img class="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0"
                                                                src="{{ $participant->profile_photo_url }}"
                                                                alt="">
                                                        @endforeach

                                                        <span
                                                            class="flex items-center justify-center w-6 h-6 -mx-1 text-xs text-blue-600 bg-blue-100 border-2 border-white rounded-full">
                                                            +{{ $institute->participants->count() }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <div class="px-6 py-2">
                                                <div
                                                    class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                                    <button id="hs-table-dropdown-1" type="button"
                                                        class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-md text-gray-700 align-middle focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                                        </svg>
                                                    </button>
                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[10rem] z-20 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                                                        aria-labelledby="hs-table-dropdown-1">
                                                        <div class="py-2 first:pt-0 last:pb-0">
                                                            <span
                                                                class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">
                                                                Actions
                                                            </span>
                                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                                href="#">
                                                                Rename team
                                                            </a>
                                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                                href="#">
                                                                Add to favorites
                                                            </a>
                                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                                href="#">
                                                                Archive team
                                                            </a>
                                                        </div>
                                                        <div class="py-2 first:pt-0 last:pb-0">
                                                            <a class="flex items-center gap-x-3 py-2 px-3 rounded-md text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                                href="#">
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <span
                                        class="font-semibold text-gray-800 dark:text-gray-200">{{ $institutes->count() }}</span>
                                    results
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-firefly-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                        <svg class="w-3 h-3" width="16" height="16" viewBox="0 0 16 15"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.506 1.64001L4.85953 7.28646C4.66427 7.48172 4.66427 7.79831 4.85953 7.99357L10.506 13.64"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        </svg>
                                        Prev
                                    </button>

                                    <button type="button"
                                        class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-firefly-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                        Next
                                        <svg class="w-3 h-3" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.50598 2L10.1524 7.64645C10.3477 7.84171 10.3477 8.15829 10.1524 8.35355L4.50598 14"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->
    {{-- <livewire:admin.enrollments :course="$course"/> --}}
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3 sm:gap-5">
            @foreach ($institutes as $institute)
                <!-- Card -->
                <div class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-firefly-900 dark:border-gray-800 cursor-pointer"
                    data-hs-overlay="#hs-bg-gray-on-hover-cards">
                    <div class="p-2 md:p-3">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <img class="h-[4.375rem] w-[4.375rem] rounded-full"
                                    src="{{ $institute->institute_logo }}" alt="{{ $institute->name }}">
                                <div class="ml-2">
                                    <h5
                                        class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                        <span class="uppercase">
                                            {{ $institute->acronym . ' ' . Carbon\Carbon::parse($institute->startDate)->format('Y') }}
                                            ({{ $institute->participants->count() }})
                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="pl-3">
                                <svg class="w-3.5 h-3.5 text-gray-500" width="16" height="16"
                                    viewBox="0 0 16 16" fill="none">
                                    <path
                                        d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            @endforeach



        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->


    <!-- Enrollments Table Modal -->

    <div id="hs-bg-gray-on-hover-cards"
        class="hs-overlay hs-overlay-open:overlay-10 hidden w-full h-full fixed top-0 left-0 z-[70] overflow-x-hidden overflow-y-auto">

        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100  hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                    <h3 class="font-bold text-gray-800 dark:text-gray-200">
                        Plugins
                    </h3>
                    <button type="button"
                        class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                        data-hs-overlay="#hs-bg-gray-on-hover-cards">
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
                    <div class="sm:divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="py-3 sm:py-6">
                            <h4 class="mb-2 text-xs font-semibold uppercase text-gray-600 dark:text-gray-400">
                                Base
                            </h4>

                            <!-- Grid -->
                            <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3">
                                <!-- Card -->
                                <a class="bg-white p-4 transition duration-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-white/[.05]"
                                    href="../docs/frameworks-vuejs.html">
                                    <div class="flex">
                                        <div class="mt-1.5 flex justify-center flex-shrink-0 rounded-l-xl">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-gray-200" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="grow ml-6">
                                            <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                                                Accordion
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                                                A framework for building web user interfaces.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- End Card -->

                                <!-- Card -->
                                <a class="bg-white p-4 transition duration-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-white/[.05]"
                                    href="../docs/frameworks-vuejs.html">
                                    <div class="flex">
                                        <div class="mt-1.5 flex justify-center flex-shrink-0 rounded-l-xl">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-gray-200" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M12.4077 1H12.9077C14.0123 1 14.9077 1.89543 14.9077 3V13C14.9077 14.1046 14.0123 15 12.9077 15H2.90771C1.80315 15 0.907715 14.1046 0.907715 13V3C0.907715 1.89543 1.80314 1 2.90771 1H5.10034C5.83943 1 6.43858 1.59915 6.43858 2.33824C6.43858 3.07732 7.03773 3.67647 7.77681 3.67647H14.4077M8.5 1H8.90771C10.0123 1 10.9077 1.89543 10.9077 3V3.5M3.90771 8H9.90771M3.90771 11.5H11.9077"
                                                    stroke="currentColor" stroke-linecap="round"></path>
                                            </svg>
                                        </div>

                                        <div class="grow ml-6">
                                            <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                                                Tabs
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                                                A framework for building web user interfaces.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- End Card -->

                                <!-- Card -->
                                <a class="bg-white p-4 transition duration-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-white/[.05]"
                                    href="../docs/frameworks-vuejs.html">
                                    <div class="flex">
                                        <div class="mt-1.5 flex justify-center flex-shrink-0 rounded-l-xl">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-gray-200" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z" />
                                            </svg>
                                        </div>

                                        <div class="grow ml-6">
                                            <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                                                Scrollspy
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                                                A framework for building web user interfaces.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- End Card -->

                                <!-- Card -->
                                <a class="bg-white p-4 transition duration-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-white/[.05]"
                                    href="../docs/frameworks-vuejs.html">
                                    <div class="flex">
                                        <div class="mt-1.5 flex justify-center flex-shrink-0 rounded-l-xl">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-gray-200" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M8 6.00002V13M3 8.00002H6M10 8.00002H13M3 11H6M10 11H13M1 5.50002V13.5C1 14.6046 1.89543 15.5 3 15.5H13C14.1046 15.5 15 14.6046 15 13.5V5.50002C15 4.39545 14.1046 3.50002 13 3.50002H11.2024C10.6481 3.50002 10.1186 3.26992 9.74033 2.86465L8.73105 1.78329C8.33572 1.35971 7.66428 1.35971 7.26894 1.78329L6.25967 2.86465C5.88142 3.26992 5.35193 3.50002 4.79756 3.50002H3C1.89543 3.50002 1 4.39545 1 5.50002Z"
                                                    stroke="currentColor" stroke-linecap="round"></path>
                                            </svg>
                                        </div>

                                        <div class="grow ml-6">
                                            <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                                                Mega Menu <span
                                                    class="ml-1 inline bg-blue-50 border border-blue-300 text-blue-600 text-[.6125rem] leading-4 uppercase rounded-full py-0.5 px-2 dark:bg-blue-900/[.75] dark:border-blue-700 dark:text-blue-500">Hot</span>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                                                A framework for building web user interfaces.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- End Card -->

                                <!-- Card -->
                                <a class="bg-white p-4 transition duration-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-white/[.05]"
                                    href="../docs/frameworks-vuejs.html">
                                    <div class="flex">
                                        <div class="mt-1.5 flex justify-center flex-shrink-0 rounded-l-xl">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-gray-200" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v2A1.5 1.5 0 0 1 14.5 5h-13A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-13z">
                                                </path>
                                                <path
                                                    d="M2 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm10.823.323-.396-.396A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="grow ml-6">
                                            <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                                                Dropdown
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                                                A framework for building web user interfaces.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- End Card -->
                            </div>
                            <!-- End Grid -->
                        </div>

                        <div class="py-3 sm:py-6">
                            <h4 class="mb-2 text-xs font-semibold uppercase text-gray-600 dark:text-gray-400">
                                Advanced
                            </h4>

                            <!-- Grid -->
                            <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3">
                                <!-- Card -->
                                <a class="bg-white p-4 transition duration-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-white/[.05]"
                                    href="../docs/frameworks-vuejs.html">
                                    <div class="flex">
                                        <div class="mt-1.5 flex justify-center flex-shrink-0 rounded-l-xl">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-gray-200" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.5 6a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM6 6a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z">
                                                </path>
                                                <path
                                                    d="M12 1a2 2 0 0 1 2 2 2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2 2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10ZM2 12V5a2 2 0 0 1 2-2h9a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1Zm1-4v5a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V8H3Zm12-1V5a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v2h12Z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="grow ml-6">
                                            <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                                                Modal
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                                                A framework for building web user interfaces.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- End Card -->

                                <!-- Card -->
                                <a class="bg-white p-4 transition duration-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-white/[.05]"
                                    href="../docs/frameworks-vuejs.html">
                                    <div class="flex">
                                        <div class="mt-1.5 flex justify-center flex-shrink-0 rounded-l-xl">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-gray-200" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z">
                                                </path>
                                                <path
                                                    d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="grow ml-6">
                                            <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                                                Offcanvas
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                                                A framework for building web user interfaces.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- End Card -->

                                <!-- Card -->
                                <a class="bg-white p-4 transition duration-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-white/[.05]"
                                    href="../docs/frameworks-vuejs.html">
                                    <div class="flex">
                                        <div class="mt-1.5 flex justify-center flex-shrink-0 rounded-l-xl">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-gray-200" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z">
                                                </path>
                                                <path
                                                    d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v2H1V3a1 1 0 0 1 1-1h12zM1 13V6h4v8H2a1 1 0 0 1-1-1zm5 1V6h9v7a1 1 0 0 1-1 1H6z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="grow ml-6">
                                            <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                                                Sidebar <span
                                                    class="ml-1 inline bg-blue-50 border border-blue-300 text-blue-600 text-[.6125rem] leading-4 uppercase rounded-full py-0.5 px-2 dark:bg-blue-900/[.75] dark:border-blue-700 dark:text-blue-500">New</span>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                                                A framework for building web user interfaces.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- End Card -->

                                <!-- Card -->
                                <a class="bg-white p-4 transition duration-300 rounded-md hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-white/[.05]"
                                    href="../docs/frameworks-vuejs.html">
                                    <div class="flex">
                                        <div class="mt-1.5 flex justify-center flex-shrink-0 rounded-l-xl">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-gray-200" width="16"
                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M7.646.146a.5.5 0 0 1 .708 0L10.207 2H14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h3.793L7.646.146zM1 7v3h14V7H1zm14-1V4a1 1 0 0 0-1-1h-3.793a1 1 0 0 1-.707-.293L8 1.207l-1.5 1.5A1 1 0 0 1 5.793 3H2a1 1 0 0 0-1 1v2h14zm0 5H1v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2zM2 4.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z">
                                                </path>
                                            </svg>
                                        </div>

                                        <div class="grow ml-6">
                                            <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-500">
                                                Popover
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                                                A framework for building web user interfaces.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <!-- End Card -->
                            </div>
                            <!-- End Grid -->

                            <p class="mt-4 text-xs text-gray-500">
                                Completely unstyled, fully accessible UI <a
                                    class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium"
                                    href="../plugins.html">plugins</a> for popular features that for one reason or
                                another don't belong in core.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                    <a class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                        href="../docs/index.html">
                        Installation Guide
                        <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path
                                d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Enrollments Table Modal -->
</x-app-layout>
