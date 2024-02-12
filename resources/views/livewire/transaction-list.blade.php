<div>

    <div class="  overflow-hidden ">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 ">
            <div class="w-full md:col-span-6 relative">
                <div class="absolute top-2 right-2 cursor-pointer">
                    @if ($search !== '')
                        <div wire:click="resetFilters"
                            class="cursor-pointer delay-200 duration-500 bg-red-50 dark:bg-red-500/10 transition-colors dark:hover:bg-red-500/20 hover:bg-red-100 grid h-6 place-items-left rounded-full w-6">
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
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-left px-2 text-gray-700">

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
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-left px-2 text-gray-700">

                </div>
            </div>

        </div>

    </div>



    <x-table :showPagination="true">
        <x-slot name="tableHead">
            <tr class="bg-gray-300/50 dark:bg-black">
                <th scope="col"
                    class="px-6 py-3 text-left text-xs  hidden md:table-cell leading-4 font-medium uppercase tracking-wider dark:text-secondary-400">
                    <span>
                        Transaction Type
                    </span>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider dark:text-secondary-400">
                    <span>
                        Amount
                    </span>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left  hidden md:table-cell text-xs leading-4 font-medium uppercase tracking-wider dark:text-secondary-400">
                    <span>
                        Fees
                    </span>
                </th>

                <th scope="col"
                    class="px-6 py-3 hidden md:table-cell text-left text-xs leading-4 font-medium uppercase tracking-wider">
                    Reference
                </th>

                <th scope="col"
                    class="px-6 py-3 hidden md:table-cell text-xs leading-4 font-medium uppercase tracking-wider text-left">
                    Date
                </th>
                <th scope="col"
                    class="px-6 py-3 hidden md:table-cell text-xs leading-4 font-medium uppercase tracking-wider text-left">
                    Transaction Status
                </th>
                <th scope="col" class="px-6 py-3  text-xs leading-4 font-medium uppercase tracking-wider text-left">
                    Action
                </th>
            </tr>
        </x-slot>

        <x-slot name="tableBody">

            <div>
                @foreach ($transactions as $transaction)
                    <tr wire:key="{{ $transaction->id }}">



                        <td
                            class="px-6 py-3 text-sm leading-5  hidden md:table-cell  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">

                            @if ($transaction->type == 'donation')
                                <div class="flex items-center gap-x-2">
                                    <div class="shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                            src="{{ asset('storage/images/logos/costrad.png') }}" alt="User avatar">
                                    </div>
                                    <div>COSTrAD <br>Donation</div>
                                </div>
                            @elseif ($transaction->type == 'edition')
                                @php
                                    $edition = Edition::find($transaction->transactionable_id);
                                @endphp
                                <div class="flex items-center gap-x-2">
                                    <div class="shrink-0 h-10 w-10">

                                        <img class="h-10 w-10 rounded-full" src="{{ $edition->institute_logo }}"
                                            alt="Edition avatar">
                                    </div>
                                    <div class="uppercase text-sm">{{ $edition->title }} <br> Payment</div>
                                </div>
                            @endif

                        </td>
                        <td
                            class="px-6 py-3 text-sm leading-5    text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">

                            <span class="capitalize  ">{{ $transaction->currency }}
                                {{ number_format($transaction->amount / 100, 2) }}</span>

                        </td>
                        <td
                            class="px-6 py-3 text-sm leading-5  hidden md:table-cell  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">

                            <span class="capitalize  ">{{ $transaction->currency }}
                                {{ number_format($transaction->fees / 100, 2) }}</span>

                        </td>



                        <td
                            class="px-6 py-3 text-sm leading-5  hidden md:table-cell  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">
                            <div>
                                {{ $transaction->reference }}
                            </div>
                        </td>

                        <td
                            class="px-6 py-3 text-sm leading-5 hidden md:table-cell  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">
                            <div>
                                {{ $transaction->created_at }}
                            </div>
                        </td>
                        <td
                            class="px-6 py-3 text-sm leading-5 hidden md:table-cell  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">
                            @if ($transaction->refund)
                                {{ $transaction->refund->message }}
                            @else
                                {{ __('Processed') }}
                            @endif

                            {{-- @if ($transaction->refunds->count() > 0)
                                @foreach ($transaction->refunds as $refund)
                                    {{ $refund->message }}
                                @endforeach
                            @else
                                {{ $transaction->created_at }}
                            @endif --}}

            </div>
            </td>
            <td
                class="px-6 py-3 text-sm leading-5  text-secondary-500 dark:text-secondary-400 text-secondary-500 dark:text-secondary-400 text-left">
                @if ($transaction->refund)
                    <x-button class="w-full bg-pink-700 hover:bg-pink-600">
                        Refunded
                    </x-button>
                @else
                    <x-button class="w-full bg-green-700 hover:bg-green-600"
                        data-hs-overlay="#transactionDetails-{{ $transaction->id }}">
                        Reverse
                    </x-button>
                @endif


                <div id="transactionDetails-{{ $transaction->id }}"
                    class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static]"
                    data-hs-overlay-keyboard="false">
                    <div
                        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                        <div
                            class="flex flex-col w-full bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                <h3 class="font-bold text-gray-800 dark:text-white">
                                    Reverse Transaction (Reference Number) : <span
                                        class="capitalize  ">{{ $transaction->reference }}</span>
                                </h3>

                                <button type="button"
                                    class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    data-hs-overlay="#transactionDetails-{{ $transaction->id }}">
                                    <span class="sr-only">Close</span>
                                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 6 6 18" />
                                        <path d="m6 6 12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                                <div>
                                    <fieldset class="grid md:grid-cols-1 gap-4 w-full ">

                                        <div class="flex justify-between items-center w-full">
                                            <div class="text-left">
                                                @if ($transaction->type == 'donation')
                                                    <div class="flex items-center gap-x-2">
                                                        <div class="shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ asset('storage/images/logos/costrad.png') }}"
                                                                alt="User avatar">
                                                        </div>
                                                        <div class="font-sans font-bold">COSTrAD Donation</div>
                                                    </div>
                                                @elseif ($transaction->type == 'edition')
                                                    @php
                                                        $edition = Edition::find($transaction->transactionable_id);
                                                    @endphp
                                                    <div class="flex items-center gap-x-2">
                                                        <div class="shrink-0 h-10 w-10">

                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ $edition->institute_logo }}"
                                                                alt="Edition avatar">
                                                        </div>
                                                        <div class="uppercase text-sm font-sans font-bold">
                                                            {{ $edition->title }} Payment</div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="w-2/4 flex item-center justify-between font-bold font-sans">
                                                <div class="text-sm text-firefly-500 ms-3 dark:text-firefly-400">
                                                    Amount: {{ $transaction->currency }}
                                                    {{ number_format($transaction->amount / 100, 2) }}
                                                </div>
                                                <div class="text-sm text-firefly-500 ms-3 dark:text-firefly-400">
                                                    Fees: {{ $transaction->currency }}
                                                    {{ number_format($transaction->fees / 100, 2) }}
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>


                                    <div class="py-5">
                                        <!-- Textarea -->
                                        <div class="relative">
                                            <textarea id="hs-textarea-ex-1" wire:model="reversalReason"
                                                class="p-4 pb-12 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                placeholder="Reason for reversal..."></textarea>

                                        </div>
                                        <!-- End Textarea -->
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex justify-between items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                <x-button class="bg-red-500 hover:bg-red-600 w-full "
                                    data-hs-overlay="#transactionDetails-{{ $transaction->id }}">
                                    Cancel
                                </x-button>

                                <x-button class="w-full"
                                    wire:click.prevent="reverseTransaction({{ $transaction->paystackTransactionID }})">
                                    Reverse Transaction</x-button>
                            </div>
                        </div>
                    </div>
                </div>

            </td>


            </tr>
            @endforeach
</div>

</x-slot>
{{--
        <x-slot name="pagination">
            {!! $transactions->links() !!}
        </x-slot> --}}
</x-table>



</div>
