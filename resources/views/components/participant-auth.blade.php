<div class="hs-dropdown relative inline-flex" data-hs-dropdown-placement="bottom-right">
    @auth
        <button id="hs-dropdown-with-header" type="button"
            class="inline-flex flex-shrink-0 justify-center items-center gap-2 h-[3.375rem] w-[3.375rem] rounded-full font-medium hover:bg-white/[.2] text-white align-middle focus:outline-none  transition-all text-xs">
            <div class="relative inline-block">
                <img class="inline-block size-[42px] rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                    alt="Image Description">
                @can('pendingInvoices')
                    <span class="absolute bottom-0 right-0 block h-1.5 w-1.5 rounded-full ring-2 ring-white bg-red-400"></span>
                @else
                    <span
                        class="absolute bottom-0 right-0 block h-1.5 w-1.5 rounded-full ring-2 ring-white bg-green-400"></span>
                @endcan
            </div>

        </button>

        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] z-10 bg-white shadow-md rounded-lg p-4 dark:bg-firefly-900 dark:border dark:border-gray-700"
            aria-labelledby="hs-dropdown-with-header">
            <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Signed in as') }}</p>
                <p class="text-sm font-medium text-gray-800 dark:text-gray-300">{{ Auth::user()->email }}</p>
            </div>
            <div class="mt-2 py-2 first:pt-0 last:pb-0">

                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="{{ auth()->user()->dashboard() }}">
                    <x-lucide-layout-dashboard class="w-5 h-5 text-current" />
                    {{ __('My Dashboard') }}
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="{{ route('profile.show') }}">
                    <x-lucide-contact class="w-5 h-5 text-current" />
                    Manage Profile
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="{{ route('my-applications') }}">
                    <x-heroicon-o-folder-arrow-down class="w-5 h-5 text-current" />
                    <div class="w-full flex items-center justify-between">
                        <span>My Applications </span>
                        <span
                            class="w-5 h-5 bg-gray-200 dark:bg-gray-950 dark:text-white text-[9px] text-center flex justify-center items-center rounded-full">
                            {{ auth()->user()->applications_count }}
                        </span>
                    </div>
                </a>
                @can('pendingInvoices')
                    <a class="relative flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                        href="{{ url('invoices') }}">

                        <x-lucide-credit-card class="w-5 h-5 text-current" />

                        {{ __('Pending Invoices') }}
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                        </span>
                    </a>
                @else
                    <a class="relative flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                        href="{{ url('invoices') }}">

                        <x-lucide-credit-card class="w-5 h-5 text-current" />

                        {{ __('My Invoices') }}
                    </a>
                @endcan

                <a id="open_preferences_center"
                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="#">
                    <x-lucide-cookie class="w-5 h-5 text-current" />
                    Manage Cookies
                </a>
                <form id="signout" method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                        href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        <x-lucide-log-out class="w-5 h-5 text-current" />
                        Sign Out
                    </a>
                </form>

            </div>
        </div>

    @endauth

    @guest
        <a href="{{ url('login') }}" class="dark:text-white flex items-center gap-2 pl-4">
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
            <span class="text-xs"> Log In/Signup</span>
        </a>
    @endguest
</div>
