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
                    placeholder="Search by Start date, ID, Edition ID etc ..."
                    class="py px-3 pr-9 block w-full border focus:border-blue-500 focus:ring-blue-500  dark:border dark:text-gray-400 dark:bg-black ">
            </div>
            <div class="w-full md:col-span-2 ">
                <select wire:model.live="orderBy"
                    class="py px-3 pr-9 block w-full border focus:border-blue-500 focus:ring-blue-500 dark:bg-black dark:border dark:text-gray-400"
                    id="grid-state">
                    <option value="id">ID</option>
                    <option value="user_id">Applicant</option>
                    <option value="edition_id">Edition</option>
                    <option value="created_at">Date</option>
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
                    class="px-6 py-3  uppercase tracking-wider  hidden md:table-cell text-left text-xs leading-4 font-medium ">
                    Institute
                </th>
                <th scope="col"
                    class="hidden md:table-cell px-6 py-3 text-left text-xs leading-4 font-medium  uppercase tracking-wider dark:text-secondary-400">
                    Email Address
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs hidden md:table-cell leading-4 font-medium  uppercase tracking-wider  text-left">
                    Approved By
                </th>

                <th scope="col"
                    class="px-6 py-3 text-xs   leading-4 font-medium  uppercase tracking-wider  text-left">
                    Scholarship & Payment Options
                </th>
            </tr>
        </x-slot>

        <x-slot name="tableBody">

            @foreach ($unpaidApplications as $application)
                <tr wire:key="{{ $application->id }}">


                    <td data-hs-overlay="#hs-scroll-inside-body-modal-{{ $application->id }}"
                        class="px-6 py-3      w-auto whitespace-no-wrap text-sm  font-medium text-secondary-900 dark:text-white">
                        <div class="flex items-center">
                            <div class="shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ $application->applicant->profile_photo_url }}"
                                    alt=" {{ $application->applicant->full_name }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-[12px] leading-5 font-medium whitespace-nowrap">
                                    {{ $application->applicant->full_name }}
                                </div>
                                <div class="text-[10px] leading-5 text-secondary-700 dark:text-secondary-400">

                                    Country: <span
                                        class="capitalize">{{ $application->applicant->profile->country }}</span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td
                        class="px-6 py-3     hidden md:table-cell   w-auto whitespace-no-wrap text-sm  font-medium text-secondary-900 dark:text-white">
                        <div class="flex items-center">
                            <div class="shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{ $application->edition->institute_logo }}"
                                    alt="{{ $application->edition->acronym }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm leading-5 whitespace-nowrap uppercase font-bold ">
                                    {{ $application->edition->title }}
                                </div>
                                <div class="text-[10px] leading-5 text-secondary-700 dark:text-secondary-400">

                                    Period: <time datetime="{{ $application->edition->duration }}"
                                        class="capitalize">{{ $application->edition->duration }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td
                        class="hidden md:table-cell px-6 py-3 text-sm  leading-5 text-secondary-500 dark:text-secondary-400 space-y-2">
                        <a href="email:{{ $application->applicant->email }}"
                            class="flex justify-start items-center gap-x-2 ">
                            <svg class="w-5 h-5  {{ is_null($application->applicant->email_verified_at) ? 'text-red-500' : 'text-green-500' }}"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700"
                                role="tooltip">
                                {{ is_null($application->applicant->email_verified_at) ? 'Email Unverified' : 'Email Verified' }}
                            </span>
                            <span>{{ $application->applicant->email }}</span>
                        </a>
                        <a href="tel:{{ $application->applicant->profile?->telephone }}"
                            class="flex justify-start items-center gap-x-2 ">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-5 h-5  {{ is_null($application->applicant->email_verified_at) ? 'text-red-500' : 'text-green-500' }}">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>

                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-slate-700"
                                role="tooltip">
                                {{ is_null($application->applicant->email_verified_at) ? 'Email Unverified' : 'Email Verified' }}
                            </span>

                            <span>{{ $application->applicant->profile?->telephone }}</span>
                        </a>

                    </td>

                    <td
                        class="px-6 py-3 text-sm leading-5  hidden md:table-cell  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">

                        <span class="capitalize  ">
                            @php
                                $userId = $application->approved_by;
                                $user = \App\Models\User::find($userId);
                            @endphp

                            {{ $user ? $user->full_name : 'User not found' }} <br>
                            Role: {{ $user ? ucwords(str_replace('_', ' ', $user->user_role)) : 'No Role' }}
                            {{-- {{ fn(Query $query) => User::find($application->approved_by)->full_name }} --}}
                        </span>

                    </td>


                    <td
                        class="px-6 py-3 text-sm leading-5  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-center gap-3 grid md:grid-cols-2 ">

                        <x-button class="w-full bg-green-700 hover:bg-green-600"
                            data-hs-overlay="#cashOrFree-{{ $application->id }}">
                            Pay Cash
                        </x-button>
                        <x-button class="w-full" data-hs-overlay="#cashOrFree-{{ $application->id }}">
                            Scholarship</x-button>


                        <div id="cashOrFree-{{ $application->id }}"
                            class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
                            data-hs-overlay-keyboard="false">
                            <div
                                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                                <div
                                    class="flex flex-col w-full bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                    <div
                                        class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                        <h3 class="font-bold text-gray-800 dark:text-white">
                                            Cash Payment IFO: <span
                                                class="capitalize  ">{{ $application->applicant->full_name }}</span>
                                        </h3>
                                        <h3 class="font-bold text-gray-800 dark:text-white">
                                            Institute : <span
                                                class="capitalize  ">{{ $application->edition->title }}</span>
                                        </h3>

                                        <button type="button"
                                            class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                            data-hs-overlay="#cashOrFree-{{ $application->id }}">
                                            <span class="sr-only">Close</span>
                                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18" />
                                                <path d="m6 6 12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="p-4 overflow-y-auto">
                                        <div>

                                            <fieldset class="block w-full ">
                                                <select
                                                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                    wire:model="paymentOption">
                                                    <option value="fullPayment">{{ __('Full Payment') }}</option>
                                                    <option value="partPayment">{{ __('Part Payment') }}</option>
                                                </select>
                                            </fieldset>



                                            {{-- Cash Payment --}}

                                            <div class="py-5">
                                                <div>
                                                    <label for="hs-input-with-leading-and-trailing-icon" class="block text-sm font-medium mb-2 dark:text-white text-left">
                                                        Amount (GHS)
                                                    </label>
                                                    <input type="number"

                                                           wire:model="cashPaymentAmount"
                                                           id="hs-input-with-leading-and-trailing-icon"
                                                           class="py-3 px-4 pl-9 pr-16 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-firefly-500 focus:ring-firefly-500 dark:bg-firefly-900 dark:border-gray-700 dark:text-gray-400"
                                                           placeholder="{{ $application->edition->cedi_equivalent }}"
                                                           required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div
                                        class="flex justify-between items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                        <x-button class="bg-red-500 hover:bg-red-600 w-full "
                                            data-hs-overlay="#cashOrFree-{{ $application->id }}">
                                            Cancel
                                        </x-button>
                                        <x-button class="w-full" wire:click="cashPayment('{{ $application->id }}')">
                                            Cash Payment
                                        </x-button>
                                        <x-button class="w-full" wire:click="scholarshipDetails('{{ $application->id }}')">Approve For
                                            Scholarship</x-button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </td>


                </tr>
            @endforeach

        </x-slot>

        <x-slot name="pagination">
            {!! $unpaidApplications->links() !!}
        </x-slot>
    </x-table>



</div>
