<x-app-layout>
    <div>
        <x-table :showPagination="true">
            <x-slot name="tableHead">
                <tr
                    class="bg-gray-200 dark:border-secondary-900 dark:bg-black text-secondary-900  dark:text-secondary-400">

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs leading-4 font-medium  uppercase tracking-wider dark:text-secondary-400">
                        <span class="lg:pl-2">Name</span>
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs leading-4 font-medium  uppercase tracking-wider dark:text-secondary-400">
                        Email Address
                    </th>
                    <th scope="col"
                        class="px-6 py-3  uppercase tracking-wider  hidden md:table-cell text-left text-xs leading-4 font-medium ">
                        IP Address
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs leading-4 font-medium  uppercase tracking-wider  hidden md:table-cell text-left">
                        Date
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs leading-4 font-medium  uppercase tracking-wider  hidden md:table-cell text-left">
                        Login Status
                    </th>

                </tr>
            </x-slot>
            <x-slot name="tableBody">

                @foreach ($logs as $log)
                    @php
                        $user = App\Models\User::find($log->authenticatable_id);
                    @endphp
                    <tr>
                        <td
                            class="px-6 py-3 whitespace-no-wrap text-sm leading-5 font-medium text-secondary-900 dark:text-white">
                            <div class="flex items-center">
                                <div class="shrink-0 h-10 w-10">

                                    @if ($user && $user->profile_photo_url)
                                        <img class="h-10 w-10 rounded-full" src="{{ asset($user->profile_photo_url) }}"
                                            alt="User avatar">
                                    @else
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://ui-avatars.com/api/?name={{ $log->firstName }}+{{ $log->lastName }}&amp;color=1d4ed8&amp;background=dbeafe"
                                            alt="User avatar">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium">
                                        {{ $log->firstName . ' ' . $log->lastName }}

                                    </div>
                                    <div class="text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                                        Registered <time datetime="{{ $log->login_at }}"
                                            class="capitalize">{{ $user->created_at->diffForHumans() }}
                                        </time>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-3 text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg> <span class="ml-1.5">{{ $log->email }}</span>
                            </div>
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-left">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-secondary-100 text-secondary-800 dark:bg-secondary-900 dark:text-secondary-400">
                                {{ $log->ip_address }}
                            </span>
                        </td>
                        <td
                            class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-secondary-500 dark:text-secondary-400 text-left">
                            {{ $log->login_at }}

                        </td>
                        <td
                            class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-secondary-500 dark:text-secondary-400 text-left">


                            @if ($log->login_successful === 1 || $log->login_successful === true)
                                <x-success-badge />
                            @else
                                <x-fail-badge />
                            @endif

                        </td>

                    </tr>
                @endforeach

            </x-slot>

            <x-slot name="pagination">
                {{ $logs->onEachSide(5)->links() }}
            </x-slot>
        </x-table>
    </div>

</x-app-layout>
