<div>

    <div class="grid md:grid-cols-3 gap-4 px-4 py-2 ">
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
                            {{ 'GHS ' . number_format($this->totalAmountForMonth() / 100, 2, '.', ',') }}
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

        <div
            class=" rounded-2xl h-36 bg-gray-200/50   dark:bg-gray-950 dark:text-white  p-6   shadow flex flex-col justify-betweendark:border-gray-700/10  border-gray-500/10">
            <div class="text-slate-800 dark:text-white capitalize flex-none text-lg font-['anton']">
                <div class="flex justify-between items-center">
                    <div class="dark:text-white font-bold">
                        Up-Next:
                    </div>
                    <a href="#"
                        class="btn  h-6 w-6 rounded-full bg-gray-500/50 dark:bg-gray-800 p-0 font-medium text-slate-800 dark:text-white hover:bg-white  hover:shadow-lg hover:shadow-slate-300/50 focus:bg-slate-500/50 focus:shadow-lg focus:shadow-slate-200/50 active:bg-white /80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90  grid place-items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-45" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex justify-between items-center gap-x-4">

                <div>
                    <img class="inline-block h-[2.975rem] w-[2.975rem] rounded-full ring-2 ring-white dark:ring-gray-800"
                        src="#">

                </div>
                <div class="tracking-widest uppercase text-gradient__teal font-bold text-3xl">
                    {{-- {{ $nextInstitute->acronym }} --}}
                </div>
            </div>
            <div class="text-sm tracking-tight">
                <div class=" font-bold">123, {{ now()->format('Y') }}</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-12 md:gap-4 px-4 py-2">

        {{-- <livewire:admin.transactions.latest-transaction-list /> --}}
        <div class="md:col-span-12 rounded-2xl">
            <div class="grid gap-4 grid-cols-1 ">
                <div class="bg-white dark:bg-gray-950 dark:text-white rounded-2xl shadow py-4" id="chartline"></div>
            </div>
        </div>

        <div class="md:col-span-12 rounded-2xl">

            <div class="bg-white dark:bg-gray-950 dark:text-white shadow-lg" id="chartpie"></div>

        </div>
    </div>


    @assets
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @endassets

    @script


    <script>
        var chart = document.querySelector('#chartline')
        var options = {
            series: [{
                name: 'TEAM A',
                type: 'area',
                data: [44, 55, 31, 47, 31, 43, 26, 41, 31, 47, 33]
            }, {
                name: 'TEAM B',
                type: 'line',
                data: [55, 69, 45, 61, 43, 54, 37, 52, 44, 61, 43]
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            stroke: {
                curve: 'smooth'
            },
            fill: {
                type: 'solid',
                opacity: [0.35, 1],
            },
            labels: ['Dec 01', 'Dec 02', 'Dec 03', 'Dec 04', 'Dec 05', 'Dec 06', 'Dec 07', 'Dec 08', 'Dec 09 ',
                'Dec 10', 'Dec 11'
            ],
            markers: {
                size: 0
            },
            yaxis: [{
                    title: {
                        text: 'Series A',
                    },
                },
                {
                    opposite: true,
                    title: {
                        text: 'Series B',
                    },
                },
            ],
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function(y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(0) + " points";
                        }
                        return y;
                    }
                }
            }
        };
        var chart = new ApexCharts(chart, options);
        chart.render();
    </script>
    <script>
        var chart = document.querySelector('#chartpie')
        var options = {
            series: [44, 55, 67, 83],
            chart: {
                height: 350,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: '22px',
                        },
                        value: {
                            fontSize: '16px',
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            formatter: function(w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 249
                            }
                        }
                    }
                }
            },
            labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
        };
        var chart = new ApexCharts(chart, options);
        chart.render();
    </script>

@endscript
</div>
