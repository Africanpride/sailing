<x-participant-layout>
    <section class="mainblock  ">
        <div class="innerblock animate-in slide-in-from-left-96 delay-900 duration-900">
            <div
                class="order-last flex flex-col justify-between space-y-5 border-none bg-firefly-100/60 p-2 pt-2 text-firefly-950 dark:bg-gray-950 dark:text-white md:order-first md:col-span-8 md:rounded-l-3xl md:p-6 md:pl-8">

                <div class="flex items-center justify-between gap-4">
                    {{-- <x-dark-switch /> --}}

                    {{-- <div class="flex-1 border-b-2 border-gray-200 dark:border-gray-700">
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
                    <div class="md:w-full">
                        <input
                            class="block w-full rounded-full border-gray-200 px-5 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-gray-700 dark:bg-slate-900 dark:text-gray-400 dark:focus:ring-gray-600"
                            type="text" placeholder="Search ...">
                    </div>
                </div>
                <div class="container mx-auto rounded-lg px-4 py-2 shadow-sm">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold">Upcoming Schools</h2>
                        <a class="text-indigo-500 hover:text-indigo-700" href="#">View all ></a>
                    </div>
                    <div class="mt-4 grid grid-cols-4 gap-4">
                        <div
                            class="text-accent-400 hover:text-accent-500 group relative flex aspect-square cursor-pointer flex-col items-center justify-center rounded-2xl border border-firefly-300/70 bg-none text-sm text-gray-500 hover:font-medium hover:shadow hover:ring-2 hover:ring-gray-300 dark:bg-gray-950 hover:dark:ring-gray-700">

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
                                <div class="dark:text-white">Add New</div>
                            </label>
                        </div>

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
