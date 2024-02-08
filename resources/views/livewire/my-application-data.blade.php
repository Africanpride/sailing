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
                    <span class="lg:pl-2">
                        Institute
                    </span>
                </th>

                <th scope="col"
                    class="hidden md:table-cell px-6 py-3 text-left text-xs leading-4 font-medium  uppercase tracking-wider dark:text-secondary-400">
                    Applicant Details
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs hidden md:table-cell leading-4 font-medium  uppercase tracking-wider  text-left">
                    Invoice Status
                </th>

                <th scope="col"
                    class="px-6 py-3 text-xs   leading-4 font-medium  uppercase tracking-wider  text-left">
                    Action: Pay invoice
                </th>
            </tr>
        </x-slot>

        <x-slot name="tableBody">
            @if ($myApplications->count() > 0)


                @foreach ($myApplications as $application)
                    <tr wire:key="{{ $application->id }}">


                        <td
                            class="px-6 py-3   w-auto whitespace-no-wrap text-sm  font-medium text-secondary-900 dark:text-white">
                            <div class="flex items-center">
                                <div class="shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full"
                                        src="{{ $application->edition->institute_logo }}"
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

                            <span
                                class="py-1 px-3.5 inline-flex items-center gap-x-1 text-xs font-medium bg-{{ $application->invoice?->status == 'paid' ? 'teal' : 'red' }}-100 text-{{ $application->invoice?->status == 'paid' ? 'teal' : 'red' }}-800 rounded-full dark:bg-{{ $application->invoice?->status == 'paid' ? 'teal' : 'red' }}-500/10 dark:text-{{ $application->invoice?->status == 'paid' ? 'teal' : 'red' }}-500">

                                @if ($application->invoice?->status == 'paid')
                                    <svg class="flex-shrink-0 w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                    {{ __('Invoice Paid') }}
                                @else
                                    <svg class="flex-shrink-0 w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" x2="12" y1="2" y2="6" />
                                        <line x1="12" x2="12" y1="18" y2="22" />
                                        <line x1="4.93" x2="7.76" y1="4.93" y2="7.76" />
                                        <line x1="16.24" x2="19.07" y1="16.24" y2="19.07" />
                                        <line x1="2" x2="6" y1="12" y2="12" />
                                        <line x1="18" x2="22" y1="12" y2="12" />
                                        <line x1="4.93" x2="7.76" y1="19.07" y2="16.24" />
                                        <line x1="16.24" x2="19.07" y1="7.76" y2="4.93" />
                                    </svg>
                                    {{ __('Invoice Payment Pending') }}
                                @endif


                            </span>





                        </td>


                        <td
                            class="px-6 py-3 text-sm leading-5  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-center">

                            @if ($application->status == 'approved')
                                <x-button class="w-auto" data-hs-overlay="#invoice-{{ $application->id }}">
                                    @if ($application->invoice?->status == 'paid')
                                        View invoice: {{ $application->invoice?->invoice_number }}
                                    @else
                                        Pay invoice: {{ $application->invoice?->invoice_number }}
                                    @endif
                                </x-button>


                                <div id="invoice-{{ $application->id }}"
                                    class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
                                    data-hs-overlay-keyboard="false">
                                    <div
                                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                                        <div
                                            class="flex flex-col w-full bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                            <div
                                                class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                <h3 class="font-bold text-gray-800 dark:text-white">
                                                    Invoice No:
                                                    <span
                                                        class="capitalize  ">{{ $application->invoice?->invoice_number ?? ' - ' }}</span>
                                                </h3>

                                                <button type="button"
                                                    class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                    data-hs-overlay="#invoice-{{ $application->id }}">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="flex-shrink-0 w-4 h-4"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path d="M18 6 6 18" />
                                                        <path d="m6 6 12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-4">
                                                <div
                                                    class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-slate-900">
                                                    <!-- Grid -->
                                                    <div class="flex justify-between">
                                                        <div>
                                                            <x-branding />
                                                        </div>
                                                        <!-- Col -->

                                                        <div class="text-right">
                                                            <h2
                                                                class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-200">
                                                                Invoice #</h2>
                                                            <span
                                                                class="mt-1 block text-gray-500 text-md">{{ $application->invoice?->invoice_number }}</span>

                                                            <address
                                                                class="mt-4 not-italic text-gray-800 dark:text-gray-200">

                                                                P.O Box CT 4467, <br>
                                                                Cantonment, Accra,<br>
                                                                Ghana.<br>
                                                            </address>
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- End Grid -->

                                                    <!-- Grid -->
                                                    <div class="mt-8 grid sm:grid-cols-2 gap-3">
                                                        <div class="text-left">
                                                            <h3
                                                                class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                                                Bill to:</h3>
                                                            <h3
                                                                class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                                                {{ $application->applicant->full_name }}</h3>
                                                            <address class="mt-2 not-italic text-gray-500 w-2/4">
                                                                {{ $application->applicant->profile->address }},
                                                                {{ $application->applicant->profile->country }}.

                                                            </address>
                                                        </div>
                                                        <!-- Col -->

                                                        <div class="sm:text-right space-y-2">
                                                            <!-- Grid -->
                                                            <div
                                                                class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                                                    <dt
                                                                        class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">
                                                                        Invoice date:</dt>
                                                                    <dd class="col-span-2 text-gray-500">
                                                                        {{ $application->invoice?->created_at->format('d-m-Y') }}
                                                                    </dd>
                                                                </dl>
                                                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                                                    <dt
                                                                        class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">
                                                                        Due date:</dt>
                                                                    <dd class="col-span-2 text-gray-500">
                                                                        {{ $application->invoice?->due_date->format('d-m-Y') }}
                                                                    </dd>
                                                                </dl>
                                                            </div>
                                                            <!-- End Grid -->
                                                        </div>
                                                        <!-- Col -->
                                                    </div>
                                                    <!-- End Grid -->

                                                    <!-- Table -->
                                                    <div class="mt-6">
                                                        <div
                                                            class="border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
                                                            <div class="hidden sm:grid sm:grid-cols-5">
                                                                <div
                                                                    class="text-left sm:col-span-2 text-xs font-medium text-gray-500 uppercase">
                                                                    Item</div>
                                                                <div
                                                                    class="text-xs font-medium text-gray-500 uppercase">
                                                                    Qty</div>
                                                                <div
                                                                    class=" text-xs font-medium text-gray-500 uppercase">
                                                                    Rate</div>
                                                                <div
                                                                    class="text-right text-xs font-medium text-gray-500 uppercase">
                                                                    Amount</div>
                                                            </div>

                                                            <div
                                                                class="hidden sm:block border-b border-gray-200 dark:border-gray-700">
                                                            </div>

                                                            <div class="grid grid-cols-3 sm:grid-cols-5 gap-2 ">
                                                                <div class="col-span-full sm:col-span-2">

                                                                    <p
                                                                        class="font-medium  text-left text-gray-800 dark:text-gray-200">
                                                                        {{ $application->edition->title }}</p>
                                                                </div>
                                                                <div>
                                                                    <h5
                                                                        class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                                        Qty</h5>
                                                                    <p class="text-gray-800 dark:text-gray-200">1</p>
                                                                </div>
                                                                <div>
                                                                    <h5
                                                                        class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                                        Rate</h5>
                                                                    <p class="text-gray-800 dark:text-gray-200">5</p>
                                                                </div>
                                                                <div>
                                                                    <h5
                                                                        class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                                        Amount</h5>
                                                                    <p
                                                                        class="sm:text-right text-gray-800 dark:text-gray-200">
                                                                        ${{ $application->edition->price }}</p>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="sm:hidden border-b border-gray-200 dark:border-gray-700">
                                                            </div>


                                                            <div
                                                                class="sm:hidden border-b border-gray-200 dark:border-gray-700">
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <!-- End Table -->

                                                    <!-- Flex -->
                                                    <div class="mt-8 flex sm:justify-end">
                                                        <div class="w-full max-w-2xl sm:text-right space-y-2">
                                                            <!-- Grid -->
                                                            <div
                                                                class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                                                    <dt
                                                                        class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">
                                                                        Subtotal:</dt>
                                                                    <dd class="col-span-2 text-gray-500">
                                                                        ${{ $application->edition->price }}</dd>
                                                                </dl>

                                                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                                                    <dt
                                                                        class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">
                                                                        Total:</dt>
                                                                    <dd class="col-span-2 text-gray-500">
                                                                        ${{ $application->edition->price }}</dd>
                                                                </dl>

                                                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                                                    <dt
                                                                        class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">
                                                                        Tax:</dt>
                                                                    <dd class="col-span-2 text-gray-500">$0.00</dd>
                                                                </dl>

                                                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                                                    <dt
                                                                        class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">
                                                                        Amount paid:</dt>
                                                                    <dd class="col-span-2 text-gray-500">$0.00</dd>
                                                                </dl>

                                                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                                                    <dt
                                                                        class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">
                                                                        Due balance:</dt>
                                                                    <dd class="col-span-2 text-gray-500">
                                                                        ${{ $application->edition->price }}</dd>
                                                                </dl>
                                                            </div>
                                                            <!-- End Grid -->
                                                        </div>
                                                    </div>
                                                    <!-- End Flex -->

                                                    <div class="mt-8 sm:mt-12 text-left">
                                                        <h4
                                                            class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                                            Thank you!</h4>
                                                        <p class="text-gray-500">If you have any questions concerning
                                                            this
                                                            invoice, contact us via phone or email below. Include
                                                            invoice
                                                            number
                                                            in the subject line.</p>
                                                        <div class="mt-2">
                                                            <p
                                                                class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                                                                info@costrad.org</p>
                                                            <p
                                                                class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                                                                {{ config('app.telephone') }}</p>
                                                        </div>
                                                    </div>

                                                    <p class="mt-5 text-sm text-gray-500">© {{ now()->format('Y') }}
                                                        COSTrAD.
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="flex justify-between items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                <x-button
                                                    class="bg-red-500 hover:bg-red-600 w-full flex justify-center items-center gap-2 text-center "
                                                    data-hs-overlay="#invoice-{{ $application->id }}">
                                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                                        <path
                                                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                                                        </path>
                                                    </svg>
                                                    Generate PDF
                                                </x-button>
                                                @if ($application->invoice?->status == 'paid')
                                                    <x-link-button class="w-full"
                                                        href="{{ route('receipt', $application->invoice->invoice_number) }}"
                                                        target="_blank">View
                                                        Receipt</x-link-button>
                                                @else
                                                    <x-button class="w-full"
                                                        wire:click.prevent="payInvoice({{ $application->invoice }})">
                                                        Pay invoice
                                                    </x-button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                {{-- If Application rejected?  --}}
                                @if ($application->status == 'rejected')
                                    <span
                                        class="py-1 px-3.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                        <svg class="flex-shrink-0 w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z" />
                                            <path d="M12 9v4" />
                                            <path d="M12 17h.01" />
                                        </svg>
                                        {{ __('Application Rejected') }}
                                    </span>
                                @else
                                    <span
                                        class="py-1 px-3.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                        <svg class="flex-shrink-0 w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z" />
                                            <path d="M12 9v4" />
                                            <path d="M12 17h.01" />
                                        </svg>
                                        {{ __('Awaiting Admission Decision') }}
                                    </span>
                                @endif
                            @endif

                        </td>


                    </tr>
                @endforeach


        </x-slot>
        @endif

        <x-slot name="pagination">
            {!! $myApplications->links() !!}
        </x-slot>
    </x-table>



</div>
