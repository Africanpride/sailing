<div>

    <div class="grid md:grid-cols-2 gap-4 px-4 py-2 ">
        <div
            class="dark:border-gray-700/10  border-gray-500/10 rounded-2xl h-36 bg-gray-200/50   dark:bg-gray-950 dark:text-white p-6   shadow flex flex-col justify-between  ">
            <div class="text-slate-800 dark:text-white capitalize flex-none text-lg font-['anton']">Donations</div>
            <div class="flex justify-between items-center">
                <div class="capitalize flex-none text-lg font-semibold dark:text-white">
                    <div class=" text-xl gap-x-2 ">
                        <span class=" text-slate-700 dark:text-slate-200">
                            {{ 'GHS ' . number_format(App\Models\Donation::sum('amount') / 100, 2, '.', ',') }}
                        </span>

                    </div>
                </div>
                <div>
                    <x-lucide-wallet class="w-12 h-12 dark:text-firefly-500  text-firefly-500/80" />
                </div>
            </div>
            <div class="text-sm tracking-tight">
                <span class="font-bold">Latest:
                    {{ 'GHS ' . number_format(App\Models\Donation::all()->last()?->amount / 100, 2, '.', ',') ?? 'No Donations Yet' }}
                </span>
            </div>
        </div>
        <div
            class="relativedark:border-gray-700/10  border-gray-500/10 rounded-2xl h-36 bg-gray-200/50   dark:bg-gray-950 dark:text-white  p-6   shadow flex flex-col justify-between  ">
            <div
                class="absolute top-3 right-3 w-6 h-6 bg-firefly-300/50 text-firefly-900 font-bold rounded-full flex justify-center items-center text-[11px] dark:text-white">
                {{ $this->totalsForMonth() }}
            </div>
            <div class="text-slate-800 dark:text-white capitalize flex-none text-lg font-['anton'] ">
                Total For: {{ \Carbon\Carbon::parse(now())->format('M, Y') }}</div>
            <div class="flex justify-between items-center">
                <div class="capitalize flex-none text-lg font-semibold dark:text-white">
                    <div class=" text-xl gap-x-2 ">
                        <span class=" text-slate-700 dark:text-slate-200">
                            {{ 'GHS ' .  number_format($this->totalAmountForMonth() / 100, 2, '.', ',') }}
                        </span>

                    </div>
                </div>
                <div>
                    <x-lucide-coins class="w-12 h-12 dark:text-firefly-500  text-firefly-500/80" />
                </div>
            </div>
            <div class="text-sm tracking-tight">
                <span class="font-bold">Monthly Transactions</span>
                {{-- <span class="font-bold">Latest: {{ App\Models\Transaction::latestFormattedAmount() }}</span> --}}
            </div>
        </div>


    </div>

</div>
