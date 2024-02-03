<div class="">






    <div class="  overflow-hidden ">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 ">
            <div class="w-full md:col-span-6 relative">
                <div class="absolute top-2 right-2 cursor-pointer">
                    @if ($search !== '')
                        <div wire:click="resetFilters"
                            class="cursor-pointer delay-200 duration-500 bg-red-50 dark:bg-red-500/10 transition-colors dark:hover:bg-red-500/20 hover:bg-red-100 grid h-6 place-items-center rounded-full w-6">
                            <x-heroicon-o-x-circle class="w-5 h-5 text-red-500" />
                        </div>
                    @endif
                    {{-- {{ ($search !== '') ? 'Not null' : 'null' }} --}}
                </div>

                <input wire:model.live.debounce.200ms="search" wire:keydown.escape="resetFilters"
                    wire:keydown.tab="resetFilters" type="text"
                    placeholder="Search by First Name, Last Name, Email ..."
                    class="py px-3 pr-9 block w-full border focus:border-blue-500 focus:ring-blue-500  dark:border dark:text-gray-400 dark:bg-black ">
            </div>
            <div class="w-full md:col-span-2 ">
                <select wire:model.live="orderBy"
                    class="py px-3 pr-9 block w-full border focus:border-blue-500 focus:ring-blue-500 dark:bg-black dark:border dark:text-gray-400"
                    id="grid-state">
                    <option value="firstName">First Name</option>
                    <option value="lastName">Last Name</option>
                    <option value="email">Email</option>
                    <option value="created_at">Sign Up Date</option>
                </select>

            </div>
            <div class="w-full md:col-span-2 ">
                <select wire:model.live="orderAsc"
                    class="py px-3 pr-9 block w-full border focus:border-blue-500 focus:ring-blue-500 dark:bg-black dark:border dark:text-gray-400"
                    id="grid-state">
                    <option value="0">Descending</option>
                    <option value="1">Ascending</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

                </div>
            </div>
            <div class="w-full md:col-span-2 ">
                <select wire:model.live="perPage"
                    class="py px-3 pr-9 block w-full border focus:border-blue-500 focus:ring-blue-500
                     dark:bg-black dark:border dark:text-gray-400"
                    id="grid-state">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

                </div>
            </div>

        </div>

    </div>



    <x-table :showPagination="true">
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
                    Institute
                </th>
                <th scope="col" class="px-6 py-3 text-xs leading-4 font-medium  uppercase tracking-wider  text-left">
                    Country
                </th>
                <th scope="col" class="px-6 py-3 text-xs leading-4 font-medium  uppercase tracking-wider  text-left">
                    Telephone
                </th>
                <th scope="col" class="px-6 py-3 text-xs leading-4 font-medium  uppercase tracking-wider  text-left">
                    Ban/Deny Access
                </th>
            </tr>
        </x-slot>

        <x-slot name="tableBody">

            @foreach ($users as $user)
            <tr wire:key="{{ $user->id }}">

                <div id="hs-scroll-inside-body-modal-{{ $user->id  }}"
                    class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                    <div
                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-3xl sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]">
                        <div
                            class="max-h-full h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                <h3 class="font-bold text-gray-800 dark:text-white">
                                    Approve Application: {{ $user->full_name }}
                                </h3>
                                <button type="button"
                                    class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    data-hs-overlay="#hs-scroll-inside-body-modal-{{ $user->id  }}">
                                    <span class="sr-only">Close</span>
                                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18" />
                                        <path d="m6 6 12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="h-full overflow-y-auto p-4">
                                <div class="space-y-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be bold</h3>
                                        <p class="mt-1 text-gray-800 dark:text-gray-400">
                                            Motivate teams to do their best work. Offer best practices to get users
                                            going in the right direction. Be bold and offer just enough help to get the
                                            work started, and then get out of the way. Give accurate information so
                                            users can make educated decisions. Know your user's struggles and desired
                                            outcomes and give just enough information to let them get where they need to
                                            go.
                                        </p>
                                    </div>


                                </div>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                <button type="button"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    data-hs-overlay="#hs-scroll-inside-body-modal-{{ $user->id  }}">
                                    Close
                                </button>
                                <x-button type="button" wire:click.prevent="saveChanges"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save changes
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>

                <td data-hs-overlay="#hs-scroll-inside-body-modal-{{ $user->id  }}"
                class="px-6 py-3 cursor-pointer  w-auto whitespace-no-wrap text-sm  font-medium text-secondary-900 dark:text-white">
                <div class="flex items-center">
                            <div class="shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}"
                                    alt="User avatar">
                            </div>
                            <div class="ml-4">
                                <div class="text-[12px] leading-5 font-medium whitespace-nowrap">
                                    {{ $user->full_name }}
                                </div>
                                <div class="text-[10px] leading-5 text-secondary-700 dark:text-secondary-400">

                                    Registered <time datetime="{{ $user->created_at }}"
                                        class="capitalize">{{ $user->created_at->diffForHumans() }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td
                        class="hidden md:table-cell px-6 py-3 text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                        <div class="flex justify-start items-center gap-x-2 ">
                            <svg class="w-5 h-5  {{ is_null($user->email_verified_at) ? 'text-red-500' : 'text-green-500' }}"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700"
                                role="tooltip">
                                {{ is_null($user->email_verified_at) ? 'Email Unverified' : 'Email Verified' }}
                            </span>
                            <span>{{ $user->email }}</span>
                        </div>
                    </td>
                    <td class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-left">
                        <span
                            class="inline-flex items-center justify-center h-7 w-7 rounded-full ring-2 ring-white bg-gray-800 dark:bg-gray-900 dark:ring-gray-800">
                            <span class="text-xs font-medium leading-none text-white uppercase">0</span>
                        </span>
                    </td>
                    <td
                        class="px-6 py-3 text-sm leading-5 text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">

                        <span class="capitalize  ">{{ $user->profile->country }}</span>

                    </td>
                    <td
                        class="px-6 py-3 text-sm leading-5 text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">

                        {{ $user->profile?->telephone }}

                    </td>
                    <td
                        class="px-6 py-3 text-sm leading-5 text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">

                        <div>

                            <input wire:click="toggleBan({{ $user }})" type="checkbox"
                                id="{{ $user->id }}" name="toggle"
                                class="relative w-[3.25rem] h-7 bg-gray-300 checked:bg-none checked:bg-red-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200  ring-1 ring-transparent focus:border-red-600 focus:ring-red-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-red-600 dark:focus:ring-offset-gray-800 before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-red-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-red-200"
                                {{ $user->ban ? 'checked' : ' ' }}>

                            <label for="toggle{{ $user->id }}" for="hs-basic-usage"
                                class="sr-only">switch</label>

                        </div>

                    </td>


                </tr>
            @endforeach

        </x-slot>

        <x-slot name="pagination">
            {!! $users->links() !!}
        </x-slot>
    </x-table>



</div>
