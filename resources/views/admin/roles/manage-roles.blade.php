<x-app-layout>
    <x-backend-page-header modelName="RBAC / ACL" description="Roles & Permissions" add-button="false" class="mx-4">
        <x-heroicon-o-user-group class="w-5 h-5 text-current" />
    </x-backend-page-header>

    <div class="p-4 space-y-4">

        <!-- Jumbotron -->
        <div class="p-6 shadow rounded-lg bg-firefly-50 dark:bg-firefly-900 dark:text-white ">

            <div class="space-y-3">
                <p class="max-w-7xl">
                    These are the Roles already in <b>{{ config('app.name') }}</b> with their
                    associated permissions. You can assign new roles to existing member here. A role provides access to
                    predefined menus and features so that depending on the assigned role and permissions a user can
                    have access to what they need.
                </p>
                <p class="max-w-7xl">
                    Roles would be assigned available Permissions.
                </p>




                <div class="gap-4 grid grid-cols-1 md:flex justify-start items-center">

                    <x-generic-button onclick="Livewire.dispatch('openModal', { component: 'add-role' })">

                        <span class="flex items-center justify-center gap-2">
                            <x-green-shield-icon class="w-6 h-6 text-green-500 " />
                            Add New Role
                        </span>
                    </x-generic-button>
                    <x-generic-button
                        onclick="Livewire.dispatch('openModal', { component: 'add-permission' })">
                        <span class="flex items-center justify-center gap-2">
                            <x-heroicon-o-adjustments-horizontal class="w-6 h-6 text-yellow-400 " />
                            Add New Permission
                        </span>
                    </x-generic-button>
                </div>

            </div>
            <hr class="my-6 dark:border-gray-600 border-firefly-200" />
            <livewire:available-roles />
            <hr class="my-6 dark:border-gray-600 border-firefly-200" />
            {{-- <livewire:admin.available-permissions /> --}}
        </div>
        <!-- Jumbotron -->

        <!-- Jumbotron -->
        <div class="p-6 shadow  bg-gray-100 dark:bg-slate-900/10 dark:text-white ">
            <div class="flex flex-row justify-between my-2">
                <h2 class="font-semibold text-3xl">Administrator Privileges</h2>
            </div>
            <div class="space-y-3">
                <p class="max-w-2xl">
                    These are members of <b>{{ config('app.name') }}</b> with Administrator Privileges in the
                    organization. You may create new roles and permissions here.
                </p>
            </div>



            <div>
                <x-table :showPagination="false">
                    <x-slot name="tableHead">
                        <tr class="bg-gray-200 dark:border-secondary-900 dark:bg-black text-secondary-900  dark:text-secondary-400">


                            <th scope="col"
                                class="px-6 py-3 text-left text-xs leading-4 font-medium  uppercase tracking-wider dark:text-secondary-400">
                                <span class="lg:pl-2">Name</span>
                            </th>
                            <th scope="col"
                                class="hidden md:table-cell px-6 py-3 text-left text-xs leading-4 font-medium  uppercase tracking-wider dark:text-secondary-400">
                                Email Address
                            </th>
                            <th scope="col"
                                class="px-6 py-3  uppercase tracking-wider  hidden md:table-cell text-left text-xs leading-4 font-medium ">
                                Role
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs leading-4 font-medium  uppercase tracking-wider  text-left">
                                Logged In
                            </th>
                        </tr>
                    </x-slot>
                    <x-slot name="tableBody">

                        @foreach ($admins as $admin)
                            <tr>
                                <td
                                    class="px-6 py-3 whitespace-no-wrap text-sm leading-5 font-medium text-secondary-900 dark:text-white">
                                    <div class="flex items-center">
                                        <div class="shrink-0 h-10 w-10">

                                            @if ($admin && $admin->profile_photo_url)
                                                <img class="h-10 w-10 rounded-full"
                                                    src="{{ asset($admin->profile_photo_url) }}" alt="User avatar">
                                            @else
                                                <img class="h-10 w-10 rounded-full"
                                                    src="https://ui-avatars.com/api/?name={{ $admin->firstName }}+{{ $admin->lastName }}&amp;color=1d4ed8&amp;background=dbeafe"
                                                    alt="User avatar">
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium">
                                                {{ $admin->firstName . ' ' . $admin->lastName }}

                                            </div>
                                            <div class="text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                                                Registered <time datetime="{{ $admin->login_at }}"
                                                    class="capitalize">{{ $admin->created_at->diffForHumans() }}
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="hidden md:table-cell px-6 py-3 text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd"></path>
                                        </svg> <span class="ml-1.5">{{ $admin->email }}</span>
                                    </div>
                                </td>
                                <td
                                    class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-left">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-secondary-100 text-secondary-800 dark:bg-secondary-900 dark:text-secondary-400">
                                        <ul>

                                            @foreach ($admin->getRoleNames() as $role)
                                                <li class="flex space-x-3">
                                                    <svg class="flex-shrink-0 h-4 w-4 mt-0.5 text-teal-500"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12" />
                                                    </svg>
                                                    <span class="text-gray-600 dark:text-white">
                                                        {{ $role }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </span>
                                </td>
                                <td
                                    class="px-6 py-3 text-sm leading-5 text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">
                                    @if ($admin->isLoggedIn === 1 || $admin->isLoggedIn === true)
                                        <x-success-badge message="Online" />
                                    @else
                                        <x-fail-badge message="Offline" />
                                    @endif


                                </td>


                            </tr>
                        @endforeach

                    </x-slot>

                    {{-- <x-slot name="pagination">
                            {{ $admins->onEachSide(5)->links() }}
                        </x-slot> --}}
                </x-table>
            </div>

        </div>
        </div>
        <!-- Jumbotron -->




    </div>


</x-app-layout>
