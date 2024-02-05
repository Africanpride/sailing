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
                    class="hidden md:table-cell px-6 py-3 text-left text-xs leading-4 font-medium  uppercase tracking-wider dark:text-secondary-400">
                    Email Address
                </th>
                <th scope="col"
                    class="px-6 py-3  uppercase tracking-wider  hidden md:table-cell text-left text-xs leading-4 font-medium ">
                    Institute
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs hidden md:table-cell leading-4 font-medium  uppercase tracking-wider  text-left">
                    Country
                </th>

                <th scope="col"
                    class="px-6 py-3 text-xs   leading-4 font-medium  uppercase tracking-wider  text-left">
                    Approve/Reject
                </th>
            </tr>
        </x-slot>

        <x-slot name="tableBody">

            @foreach ($applications as $application)
                <tr wire:key="{{ $application->applicant->id }}">


                    <td data-hs-overlay="#hs-scroll-inside-body-modal-{{ $application->applicant->id }}"
                        class="px-6 py-3 cursor-pointer  w-auto whitespace-no-wrap text-sm  font-medium text-secondary-900 dark:text-white">
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

                                    Applied <time datetime="{{ $application->created_at }}"
                                        class="capitalize">{{ $application->created_at->diffForHumans() }}
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
                        class="px-6 py-3 cursor-pointer hidden md:table-cell   w-auto whitespace-no-wrap text-sm  font-medium text-secondary-900 dark:text-white">
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
                        class="px-6 py-3 text-sm leading-5  hidden md:table-cell  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-center">

                        <span class="capitalize  ">{{ $application->applicant->profile->country }}</span>

                    </td>


                    <td
                        class="px-6 py-3 text-sm leading-5  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-center">

                        <div>
                            <div id="hs-scroll-inside-body-modal-{{ $application->applicant->id }}"
                                class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                                <div
                                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-xl sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]">

                                    <div
                                        class="max-h-full h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                        <div
                                            class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                            <h3 class="font-bold text-gray-800 dark:text-white">
                                                Approve/Reject Application
                                            </h3>
                                            <button type="button"
                                                class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:bg-slate-600 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                data-hs-overlay="#hs-scroll-inside-body-modal-{{ $application->applicant->id }}">
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
                                        <div class="h-full overflow-y-auto p-4">
                                            <div class="space-y-4">

                                                <div class="space-y-3">
                                                    {{-- <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                                                        @if ($application->applicant->editions->count() > 0)
                                                            <ul class=" grid grid-cols-1 md:grid-cols-3 gap-3">

                                                                @foreach ($application->applicant->editions as $myUnpaidEdition)
                                                                    <li wire:key={{ $myUnpaidEdition->id }}
                                                                        class="relative  p-4 transition duration-300 z-10 before:absolute rounded-xl bg-gray-300/30 hover:bg-gray-200/50 dark:bg-firefly-900 dark:hover:bg-firefly-900/50">
                                                                        <div
                                                                            class="flex absolute top-3 right-3 cursor-pointer ">
                                                                            <input type="checkbox"
                                                                                class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                                                id="hs-default-checkbox">

                                                                        </div>
                                                                        <div class="flex text-left">
                                                                            <img class="object-cover w-16 h-16 mr-4 rounded-full shadow-md "
                                                                                src="{{ $myUnpaidEdition->institute_logo }}"
                                                                                alt="{{ $myUnpaidEdition->acronym }}" />
                                                                            <div class="flex flex-col justify-center">
                                                                                <p class="text-lg font-bold uppercase">
                                                                                </p>
                                                                                <p class="text-sm text-gray-500">
                                                                                    {{ $myUnpaidEdition->title }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif

                                                    </h3> --}}
                                                    <!-- Card start -->
                                                    <div
                                                        class="mx-auto bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg">
                                                        <div
                                                            class="border-b border-gray-300/50 dark:border-gray-700/50 px-4 pb-6">
                                                            <div class="text-center my-4">
                                                                <img class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                                                                    src="{{ $application->applicant->profile_photo_url }}"
                                                                    alt="">
                                                                <div class="py-2">
                                                                    <h3
                                                                        class="font-bold text-2xl text-gray-800 dark:text-white mb-1">
                                                                        {{ $application->applicant->full_name }}</h3>
                                                                    <div
                                                                        class="inline-flex text-gray-700 dark:text-gray-300 items-center">
                                                                        <svg class="h-5 w-5 text-gray-400 dark:text-gray-600 mr-1"
                                                                            fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            height="24">
                                                                            <path class=""
                                                                                d="M5.64 16.36a9 9 0 1 1 12.72 0l-5.65 5.66a1 1 0 0 1-1.42 0l-5.65-5.66zm11.31-1.41a7 7 0 1 0-9.9 0L12 19.9l4.95-4.95zM12 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                                        </svg>
                                                                        {{ $application->applicant->profile?->city }},
                                                                        {{ $application->applicant->profile?->country }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex gap-2 px-2 w-1/2 mx-auto">
                                                                <button
                                                                    class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 md:px-8 py-2">
                                                                    Curriculum Vitae
                                                                </button>

                                                            </div>
                                                        </div>


                                                        <div class="px-4 py-4">
                                                            <div
                                                                class="flex gap-2 items-center text-gray-800 dark:text-gray-300 mb-4">
                                                                <svg class="h-6 w-6 text-gray-600 dark:text-gray-400"
                                                                    fill="currentColor"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" width="24"
                                                                    height="24">
                                                                    <path class=""
                                                                        d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z" />
                                                                </svg>
                                                                <span><strong
                                                                        class="text-black dark:text-white">{{ $application->applicant->attendedEditions->count() }}</strong>
                                                                    Previous Participation</span>
                                                            </div>
                                                            <div class="flex">
                                                                @if ($application->applicant->attendedEditions->count() > 0)
                                                                    <div class="flex justify-end mr-2">

                                                                        @foreach ($application->applicant->attendedEditions as $attendedEdition)
                                                                            <img class="border-2 border-white dark:border-gray-800 rounded-full h-10 w-10 -mr-2"
                                                                                src="{{ $attendedEdition->institute_logo }}"
                                                                                alt="">
                                                                        @endforeach


                                                                        <span
                                                                            class="flex items-center justify-center bg-white dark:bg-gray-800 text-sm text-gray-800 dark:text-white font-semibold border-2 border-gray-200 dark:border-gray-700 rounded-full h-10 w-10">
                                                                            +999
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Card end -->

                                                </div>


                                            </div>
                                        </div>
                                        <div
                                            class="flex justify-between items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                            <x-button
                                                class="bg-gray-500 dark:bg-gray-900 hover:bg-gray-600 dark:hover:bg-gray-950 w-full "
                                                data-hs-overlay="#hs-scroll-inside-body-modal-{{ $application->applicant->id }}">
                                                Cancel
                                            </x-button>
                                            {{-- <x-link-button class="w-full" href="{{ route('profile.show') }}">View
                                                Profile</x-link-button> --}}
                                            <x-button wire:click.prevent="rejectApplication({{ $application }})"
                                                class=" bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 w-full ">
                                                Reject
                                            </x-button>
                                            <x-button wire:click.prevent="approveApplication({{ $application }})"
                                                class="disabled:pointer-events-none dark:focus:outline-none
                                                dark:focus:ring-1 dark:focus:ring-gray-600 w-full ">
                                                Approve
                                            </x-button>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <x-link-button class="w-full"
                                data-hs-overlay="#hs-scroll-inside-body-modal-{{ $application->applicant->id }}">Aprove/Reject</x-link-button>

                        </div>

                    </td>


                </tr>
            @endforeach

        </x-slot>

        <x-slot name="pagination">
            {!! $applications->links() !!}
        </x-slot>
    </x-table>



</div>
