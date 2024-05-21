<div class="soft-scrollbar hs-overlay scrollbar-y dark:scrollbar-y fixed bottom-0 left-0 top-0 z-[60] hidden -translate-x-full transform overflow-y-auto overflow-x-hidden border-r bg-white pb-10 pt-5 duration-300 hs-overlay-open:translate-x-0 dark:border-slate-800 dark:bg-black md:w-2/12 lg:bottom-0 lg:right-auto lg:block lg:translate-x-0"
    id="application-sidebar">
    <div class="px-4">
        <a class="flex-none text-xl font-semibold dark:text-white" href="{{ url('/') }}"
            aria-label="Brand">{{ config('app.name') }}</a>
    </div>

    <nav class="hs-accordion-group flex w-full flex-col flex-wrap p-4" data-hs-accordion-always-open>
        <ul class="space-y-1.5">

            <li>
                <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                    href="{{ Auth::user()?->dashboard() }}">
                    <span class="flex">
                        <x-heroicon-o-building-office-2 class="h-6 w-6 text-current" />
                    </span>
                    <span class="capitalize">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li>
                <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                    href="{{ route('applications') }}">
                    <span class="flex">
                        <x-lucide-calendar-days class="h-6 w-6 text-current" />

                    </span>
                    <span class="capitalize">{{ __('New Applications') }}</span>
                </a>
            </li>
            @can('isParticipant')
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ url('profile') }}">
                        <span class="flex">
                            <x-lucide-contact class="h-6 w-6 text-current" />
                        </span>
                        <span class="capitalize">{{ __('Profile') }}</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ url('admin/institutes/') }}">
                        <span class="flex">
                            <x-lucide-book-open-check class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Next Institute') }}</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('my-applications') }}">
                        <span class="flex">
                            <x-heroicon-o-folder-arrow-down class="h-6 w-6 text-current" />
                        </span>
                        <span class="capitalize">{{ __('My Applications') }}</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ url('invoices') }}">
                        <span class="flex">
                            <x-bi-arrow-down-up class="h-6 w-6 text-current" />
                        </span>
                        <span class="capitalize">{{ __('Payment History') }}</span>
                    </a>
                </li>
            @endcan

            @can('isAdmin')
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('staff') }}">
                        <span class="flex">
                            <x-heroicon-o-user-circle class="h-6 w-6 text-current" />
                        </span>
                        <span class="capitalize">{{ __('COSTrAD Staff') }}</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('participants') }}">
                        <span class="flex">
                            <x-lucide-scan-face class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Participants') }}</span>
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('analytics') }}">
                        <span class="flex">
                            <x-lucide-activity class="h-6 w-6 text-current" />
                        </span>
                        <span class="capitalize">{{ __('Analytics') }}</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('editions') }}">
                        <span class="flex">
                            <x-lucide-anchor class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Institute Editions') }}</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('myInstitutes') }}">
                        <span class="flex">
                            <x-lucide-book-open-check class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('My Institutes') }}</span>
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ url('enrollments') }}">
                        <span class="flex">
                            <x-lucide-library class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Enrollment List') }}</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('transactions.index') }}">
                        <span class="flex">
                            <x-bi-arrow-down-up class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Transactions') }}</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('donations.index') }}">
                        <span class="flex">
                            <x-lucide-wallet class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Donations') }}</span>
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('announcements.index') }}">
                        <span class="flex">
                            <x-lucide-bell-ring class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Announcements') }}</span>
                    </a>
                </li>

                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('publications-list') }}">
                        <span class="flex">
                            <x-lucide-newspaper class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Publication') }}</span>
                    </a>
                </li>
            </ul>

            <hr class="my-4 border-firefly-100 dark:border-slate-900/60" />

            <ul>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('roles') }}">
                        <span class="flex">
                            <x-heroicon-o-document-check class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Roles & Permissions') }}</span>
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm text-firefly-900 hover:bg-firefly-100 focus:ring-2 focus:ring-blue-500 dark:text-firefly-500 dark:hover:bg-firefly-700 dark:hover:text-firefly-300"
                        href="{{ route('logs') }}">
                        <span class="flex">
                            <x-heroicon-o-finger-print class="h-6 w-6 text-current" />

                        </span>
                        <span class="capitalize">{{ __('Authentication Logs') }}</span>
                    </a>
                </li>
            @endcan
        </ul>
    </nav>

    <x-nav-icons />

</div>
