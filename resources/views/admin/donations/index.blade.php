<x-app-layout>
    <x-backend-page-header model-name="Donations " description="COSTrAD Donations" add-button="false" class="mx-4">
        <x-heroicon-o-user-group class="w-5 h-5 text-current" />
    </x-backend-page-header>

    <section class="relative">
        {{-- <p class="text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-200 px-6">
            {{ __('Global Donations List') }}
        </p> --}}
        <!-- Jumbotron -->
        <div class="p-6 shadow  bg-gray-100 dark:bg-slate-900/10 dark:text-white ">



            <div class=" border dark:border-0 overflow-hidden ">
                <div class="overflow-x-auto">
                    <div class="align-middle inline-block min-w-full">

                        <x-table :showPagination="false">
                            <x-slot name="tableHead">
                                <tr
                                    class="bg-gray-200 dark:border-secondary-900 dark:bg-black text-secondary-900  dark:text-secondary-400">


                                    <th scope="col"
                                        class="px-3  py-2  text-left text-[11px] leading-4 font-medium  uppercase tracking-wider dark:text-secondary-400">
                                        <span class="lg:pl-2">Institute</span>
                                    </th>
                                    <th scope="col"
                                        class="py-2  text-left text-[11px] leading-4 font-medium  uppercase tracking-wider dark:text-secondary-400 ">
                                        <span class="lg:pl-2">Participant</span>

                                    </th>
                                    <th scope="col"
                                        class="px-3  py-2   uppercase tracking-wider  hidden md:table-cell text-left text-[11px] leading-4 font-medium ">
                                        Payment Reference
                                    </th>
                                </tr>
                            </x-slot>

                            <x-slot name="tableBody">
                                @if ($donations->count() > 0)

                                    @foreach ($donations as $donation)
                                        <tr>
                                            <td
                                                class="hidden md:table-cell px-3  py-2  whitespace-no-wrap text-sm leading-5 font-medium text-secondary-900 dark:text-white">
                                                <div class="flex items-center">
                                                    {{-- <div class="shrink-0 h-12 w-12">
                                                        <img class="h-12 w-12 rounded-full"
                                                            src="{{ $donation->institute->institute_logo }}"
                                                            alt="User avatar">
                                                    </div> --}}
                                                    <div class="ml-3">
                                                        <div
                                                            class="text-sm capitalize leading-5 font-medium whitespace-nowrap">
                                                            {{ $donation->donor_name }}
                                                        </div>
                                                        <div
                                                            class="text-sm capitalize leading-5 font-medium whitespace-nowrap">
                                                            {{ $donation->created_at }},
                                                            {{ now()->format('Y') }}
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-2  whitespace-no-wrap text-[12px] leading-5 ">
                                                <div class="grid grid-cols-1 gap-1">

                                                    <div
                                                        class=" leading-5  text-firefly-500 whitespace-nowrap flex gap-x-2 justify-start items-center">

                                                        <x-lucide-shield-check class="w-4 h-4 text-green-500" />
                                                        <span class="capitalize">
                                                            {{ $donation->donor_name }}</span>
                                                    </div>

                                                    <div
                                                        class=" leading-5 dark:text-white whitespace-nowrap flex gap-x-2 items-center">
                                                        <x-lucide-at-sign class="w-4 h-4 text-green-500" />
                                                        <span class="capitalize">{{ $donation->donor_email }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-3  py-2  text-sm leading-5 ">
                                                <div class="flex items-center">

                                                    <span
                                                        class="ml-1.5 whitespace-no-wrap text-secondary-500 dark:text-secondary-400">{{ $donation->id }}</span>
                                                </div>
                                                <div class="ml-1.5 whitespace-no-wrap ">
                                                    GHS {{ number_format($donation->amount / 100, 2) }}
                                                </div>
                                            </td>




                                        </tr>
                                    @endforeach
                                @else
                                    <div>
                                        <livewire:nothing-here />
                                    </div>
                                @endif
                            </x-slot>

                        </x-table>

                    </div>
                    <div
                        class=" {{ $donations->count() > 10 ? 'visible' : 'hidden' }} px-3  py-3 sm:px-6 border-t border-secondary-200 rounded-b-md bg-white dark:bg-secondary-800 dark:border-secondary-900">
                        <div>
                            {{ $donations->links() }}

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->



    </section>

</x-app-layout>
