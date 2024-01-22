<x-app-layout>

    <x-backend-page-header model-name="Administration" description="Staff Management" add-button="false"
        class="mx-4">
        <x-lucide-bell class="w-5 h-5 text-current" />
        </x-backend-page-header>


        <div class="m-4 dark:text-white">

            <div
                class="bg-gray-100 dark:bg-firefly-900 dark:text-firefly-100 rounded-2xl w-full px-6 py-4 flex flex-col md:flex-row
        items-center text-gray-800 justify-between gap-5 ">
                <div class="flex items-center ">

                    <div
                        class="hidden md:flex px-5  py-3.5 bg-white   w-full border-firefly-200 shadow-sm  text-sm
                focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-black
                 dark:border-firefly-700 dark:text-firefly-400 rounded-lg font-semibold text-gray-700">
                        <livewire:clock />
                    </div>
                </div>

                <div class="flex w-full items-center md:flex-1 ">
                    <div
                        class="bg-white  border-firefly-200 shadow-sm text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-black dark:border-firefly-700 dark:text-firefly-400 px-5  py-3.5 rounded-lg font-semibold text-info flex items-center  self-stretch justify-between w-full ">
                        <span class="text-sm font-semibold inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-2 fill-firefly-800 mr-1"
                                viewBox="0 0 24 24">
                                <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2z"></path>
                            </svg>
                            <span class="ml-1 w-20">Available</span>
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5  stroke-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </span>
                    </div>

                </div>
                <div
                    class="w-full md:w-auto flex items-center space-x-3  bg-gray-900 hover:bg-slate-800 dark:hover:bg-black   cursor-pointer text-white dark:text-firefly-400  px-6 py-3 rounded-lg">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                    </span>
                    <span>
                        Meeting Now
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 md:gap-4 my-4 md:mb-0 mt-6">
                <div class="col-span-2 md:col-span-9">
                    <!-- staff Members -->
                    {{-- @livewire('admin.staff.staff-members') --}}
                    <livewire:staff-members />
                    <!-- end staff Members -->

                    <!-- staff Members -->
                </div>
                <!-- profile -->
                <div
                    class=" h-fit md:col-span-3 md:my-0 my-4 px-10 py-16 rounded-2xl
                relative bg-gray-50 border-gray-300/30 dark:border-gray-700/30 border-2 dark:bg-black dark:text-firefly-300">

                    <a href="#" class="absolute top-4 right-4 text-gray-400 hover:text-accent-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                            </path>
                        </svg>
                    </a>
                    <div class="relative flex justify-center items-center flex-col text-gray-500 text-sm">

                        <span class="relative">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->full_name }}"
                                class="w-14 h-14 rounded-full mb-3" srcset="">
                            @auth
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-3 w-3  fill-green-500 stroke-white stroke-2 absolute bottom-3 right-1"
                                    viewBox="0 0 24 24">
                                    <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2z"></path>
                                </svg>
                            @endauth
                        </span>
                        <div class="">{{ Auth::user()->name }}</div>
                        <div class="text-xxs text-gray-400 mt-1 capitalize">{{ __('Roles:') }}
                            {{ Auth::user()->user_role ?? 'None' }}</div>
                    </div>



                    <div class="mt-8 text-sm">
                        <div class="text-gray-500">Email</div>
                        <div class="mt-1.5 font-semibold ">{{ Auth::user()->email }}</div>

                        <div class="text-gray-500 mt-5">Telephone</div>
                        <div class="mt-1.5 font-semibold">{{ Auth::user()->profile->telephone ?? ' Telephone Number' }}</div>

                        <div class="text-gray-500 mt-5">Profile</div>
                        <div class="mt-1.5 font-semibold">{{ Auth::user()->profile->bio ?? ' Bio Details' }}</div>

                    </div>
                </div>
                <!-- /profile -->

            </div>

        </div>

</x-app-layout>
