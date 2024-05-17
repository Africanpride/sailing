<x-participant-layout>
    <section class="mainblock">
        <div class="innerblock delay-900 duration-900 animate-in slide-in-from-left-96">
            <div
                class="order-last flex h-auto flex-col justify-between space-y-5 border-none bg-firefly-100/60 p-2 pt-2 text-firefly-950 dark:bg-gray-950 dark:text-white md:order-first md:col-span-8 md:rounded-l-3xl md:p-6 md:pl-8">

                <div class="flex items-center justify-between gap-4">
                    {{-- <x-dark-switch /> --}}

                    {{-- <div class="flex-1 justify-center  border-b-2 border-gray-200 dark:border-gray-900">
                        <ul class="list-disc space-x-6">
                            <li class="inline-block">
                                <a class="hover:text-blue-70 inline-flex items-center gap-x-2 whitespace-nowrap text-sm text-blue-600 focus:text-blue-700 focus:outline-none dark:text-blue-500 dark:focus:text-blue-400"
                                    href="#">
                                    Link
                                </a>
                            </li>

                            <li class="inline-block"><a
                                    class="hover:text-blue-70 pointer-events-none inline-flex items-center gap-x-2 whitespace-nowrap text-sm text-blue-600 opacity-50 focus:text-blue-700 focus:outline-none dark:text-blue-500 dark:focus:text-blue-400"
                                    href="#">
                                    Disabled
                                </a></li>
                        </ul>
                    </div> --}}
                    <div class="w-full">
                        <input
                            class="block w-full rounded-xl border-gray-200 px-5 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-900 dark:bg-slate-950 dark:text-gray-400 dark:focus:ring-gray-600"
                            type="text" placeholder="Search ...">
                    </div>
                </div>
                <div class="font-['inter'] text-3xl">My Dashboard</div>
                <div class="flex">
                    <div
                        class="flex w-full rounded-lg bg-gray-200 p-1 transition hover:bg-gray-200 dark:bg-gray-900 dark:hover:bg-gray-700">
                        <nav class="flex w-full space-x-1" role="tablist" aria-label="Tabs">
                            <button
                                class="active inline-flex flex-1 items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-sm font-medium text-gray-500 hs-tab-active:bg-white hs-tab-active:text-gray-900 hover:hover:text-blue-600 hover:text-gray-900 disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400 dark:hs-tab-active:bg-gray-800 hs-tab-active:dark:bg-gray-800 hs-tab-active:dark:text-gray-400 dark:hover:text-white"
                                id="segment-item-1" data-hs-tab="#segment-1" type="button" role="tab"
                                aria-controls="segment-1">
                                My Institutes
                            </button>
                            <button
                                class="inline-flex flex-1 items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-sm font-medium text-gray-500 hs-tab-active:bg-white hs-tab-active:text-gray-900 hover:hover:text-blue-600 hover:text-gray-900 disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400 dark:hs-tab-active:bg-gray-800 hs-tab-active:dark:bg-gray-800 hs-tab-active:dark:text-gray-400 dark:hover:text-white"
                                id="segment-item-2" data-hs-tab="#segment-2" type="button" role="tab"
                                aria-controls="segment-2">
                                My Applications <span
                                class="hs-tab-active:bg-blue-100 hs-tab-active:text-blue-600 dark:hs-tab-active:bg-blue-800 dark:hs-tab-active:text-white ms-1 h-5 w-5 flex justify-center items-center rounded-full text-xs font-medium bg-gray-300 text-gray-800 dark:bg-gray-700 dark:text-gray-300">{{ $applications->count() }}</span>
                            </button>
                            <button
                                class="inline-flex flex-1 items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-sm font-medium text-gray-500 hs-tab-active:bg-white hs-tab-active:text-gray-900 hover:hover:text-blue-600 hover:text-gray-900 disabled:pointer-events-none disabled:opacity-50 dark:text-gray-400 dark:hs-tab-active:bg-gray-800 hs-tab-active:dark:bg-gray-800 hs-tab-active:dark:text-gray-400 dark:hover:text-white"
                                id="segment-item-3" data-hs-tab="#segment-3" type="button" role="tab"
                                aria-controls="segment-3">
                                Applications
                            </button>
                        </nav>
                    </div>
                </div>

                <div class="mt-3">
                    <div id="segment-1" role="tabpanel" aria-labelledby="segment-item-1">
                        <div class="container mx-auto rounded-lg px-4 py-2 shadow-sm">

                            <div class="flex items-center justify-between">
                                <h2 class="font-['cabin'] text-xl font-bold">Upcoming Schools</h2>
                                <a class="text-indigo-500 hover:text-indigo-700" href="#">View all ></a>
                            </div>
                            <div class="mt-4 grid gap-4 md:grid-cols-4">

                                <div
                                    class="text-accent-400 hover:text-accent-500 group relative flex aspect-square cursor-pointer flex-col items-center justify-center rounded-2xl border border-firefly-300/70 bg-none text-sm text-gray-500 hover:font-medium hover:shadow hover:ring-2 hover:ring-gray-300 dark:bg-gray-950 hover:dark:ring-gray-900">

                                    <span
                                        class="group-hover:text-accent-500 text-accent-400 hover:border-secondary-focus mb-3 rounded-full border border-dashed border-current bg-firefly-50 p-2.5 dark:bg-black">
                                        <label class="cursor-pointer" for="my-modal-3">
                                            <svg class="h-5 w-5 stroke-current" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4">
                                                </path>
                                            </svg>
                                        </label>
                                    </span>
                                    <label class="cursor-pointer" for="my-modal-3">
                                        <div class="dark:text-white">New Application</div>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="hidden" id="segment-2" role="tabpanel" aria-labelledby="segment-item-2">
                        <livewire:my-application-data />
                    </div>
                    <div class="hidden" id="segment-3" role="tabpanel" aria-labelledby="segment-item-3">
                        <p class="text-gray-500 dark:text-gray-400">
                            This is the <em class="font-semibold text-gray-800 dark:text-gray-200">third</em> item's tab
                            body.
                        </p>
                    </div>
                </div>

            </div>

            <div
                class="flex flex-col justify-start space-y-4 bg-white p-2 dark:bg-firefly-950 md:col-span-4 md:rounded-r-3xl md:p-6 md:pr-8">
                <div class="flex items-start justify-between">
                    <div class="flex items-center justify-start gap-2">
                        <span class="icon-display">
                            <x-dark-switch />
                        </span>
                        <span class="icon-display">
                            <x-lucide-mail class="h-5 w-5 text-current dark:text-yellow-500" />
                        </span>
                        <span class="icon-display">
                            <x-lucide-bell class="h-5 w-5 text-current dark:text-yellow-500" />
                        </span>

                    </div>

                    <div>
                        <div class="group block flex-shrink-0">
                            <div class="flex items-center gap-2">
                                <div class="ms-3">
                                    @auth
                                        <div class="leading-tight tracking-tight">
                                            <h3 class="text-sm font-semibold text-gray-800 dark:text-white">
                                                {{ Auth::user()->full_name }}</h3>
                                            <p class="text-right text-xs font-medium text-gray-400">
                                                {{ Auth::user()->user_role }}</p>
                                        </div>
                                    @endauth
                                </div>
                                <x-participant-auth />
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    Next Column
                </div>
            </div>
        </div>
    </section>

</x-participant-layout>
