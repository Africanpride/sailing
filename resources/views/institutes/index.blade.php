<x-front-layout>
    <div class="isolate relative  overflow-hidden pt-24 pb-12 ">
        <div class="w-full px-4">
            <div class="mx-auto mb-[60px] max-w-[920px] text-center lg:mb-10 space-y-3">
                <x-top-title>
                    COSTrAD & Institutes
                    <x-slot name="icon">
                        <x-lucide-trending-up class="dark:text-white  w-5 h-5 " />
                    </x-slot>

                    <x-slot name="paragraph">

                        The College of Sustainable Transformation and Development <a href="{{ url('costrad') }}"
                            class=" bg-clip-text bg-gradient-to-l from-firefly-600 to-violet-500 text-transparent dark:from-firefly-400 dark:to-violet-400 font-bold">COSTrAD</a>
                        is an initiative of the Logos-Rhema Foundation for Leadership Resource Development, a
                        Non-Governmental Foundation registered in Ghana.

                    </x-slot>

                </x-top-title>
            </div>
        </div>

        <section class="lg:max-w-screen-xl mx-auto py-6 sm:max-w-xl">
            <!-- Announcement Banner -->
            <div class="bg-gradient-to-r from-firefly-700 to-firefly-500 ">
                <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
                    <!-- Grid -->
                    <div class="grid justify-center md:grid-cols-2 md:justify-between md:items-center gap-2">
                        <div class="text-center md:text-left md:order-2 md:flex md:justify-end md:items-center">
                            <p class="mr-5 inline-block text-xs font-semibold text-white">
                                Ready? Add Full Schedule To Your Calender
                            </p>
                            <span
                                class="py-1 px-3 inline-flex justify-center items-center gap-2 rounded-md border-2 border-white font-medium text-white hover:bg-white hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 transition-all text-sm cursor-pointer"
                                onclick="addCalendar()">
                                Calender
                            </span>
                        </div>
                        <!-- End Col -->

                        <div class="flex  items-center">
                            <a class="py-2 md:px-3 inline-flex justify-center items-center gap-2 rounded-md font-medium text-white hover:bg-white/[.1] focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 transition-all text-sm"
                                href="#">
                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                                </svg>
                                Watch Video
                            </a>
                            <span class="inline-block border-r border-white/[.3] w-px h-5 mx-2"></span>
                            <a class="py-2 md:px-3 inline-flex justify-center items-center gap-2 rounded-md font-medium text-white hover:bg-white/[.1] focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 transition-all text-sm"
                                href="{{ route('institutes.show', [$nextInstitute]) }}">
                                Explore what's Next: <span
                                    class="uppercase text-gradient__teal ">{{ $nextInstitute->acronym }}</span>
                            </a>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Grid -->
                </div>
            </div>
            <!-- End Announcement Banner -->
        </section>
        <section class="hidden">
            <div class="w-full bg-center bg-cover h-[38rem]"
                style="background-image: url('https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1374&q=80');">
                <div class="flex items-center justify-center w-full h-full bg-gray-900/40">
                    <div class="text-center">
                        <h1 class="text-3xl font-semibold text-white lg:text-4xl">Build your new <span
                                class="text-blue-400">Saas</span> Project</h1>
                        <button
                            class="w-full px-5 py-2 mt-4 text-sm font-medium text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md lg:w-auto hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            Start
                            project</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-4 md:p-2">
            <div class="lg:max-w-screen-xl lg:py-6 mx-auto py-4 sm:max-w-xl">
                <div class="grid gap-x-2 gap-y-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-4 z-50">
                    @foreach ($institutes as $institute)
                        <div class="text-gray-500 dark:text-white " key="{{ $institute->id }}">
                            @php
                                $edition = $institute->editions()->latest()->first();
                            @endphp


                            <div class="bg-center bg-cover h-40 rounded-t-2xl"
                                style="background-image:url('{{ $institute->featured_image }}')"></div>
                            <div class="p-2 border-s-0 shadow-lg rounded-b-3xl bg-white dark:bg-gray-950">
                                <div
                                    class="flex flex-col h-auto md:h-[10rem] justify-between min-h-[9rem] space-y-2 p-2 ">

                                    <a href="{{ route('institutes.show', $institute) }}"
                                        class="text-xs text-gray-950 dark:text-gray-200 text-center  uppercase font-semibold tracking-wide">
                                        {{ $institute->name }}
                                    </a>

                                    <div class="mt-1 line-clamp-3 text-sm ">
                                        {!! $institute->overview !!}
                                    </div>

                                    <div x-data="{ isOpen: false }">
                                        <button onclick="{toggleFrontHeader()}"
                                            class="flex justify-center text-center rounded-3xl  py-2  px-4 bg-blue-500/25 dark:bg-lime-500 hover:bg-lime-600 uppercase transition duration-300 ease-in-out
                                        text-firefly-900 hover:text-white text-[10px] font-bold w-full"
                                            @click="isOpen = true
                                            $nextTick(() => $refs.modalCloseButton())
                                            ">
                                            Start Application &#8212;
                                            {{ $institute->editions()->latest()->first()->title }}
                                        </button>

                                        <div style="z-index: 999;" id="showModal"
                                            class="bg-gray-800 w-full h-full fixed top-0 left-0 "
                                            x-show="isOpen">

                                            <div
                                                class="mt-4 opacity-100 duration-500 ease-out transition-all sm:max-w-3xl sm:w-full m-3 sm:mx-auto overflow-y-auto z-50 ">
                                                <div
                                                    class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-950">
                                                    <div
                                                        class="absolute bg-gray-950/80 right-2 rounded-full top-2 z-50">
                                                        <button type="button" onclick="{toggleFrontHeaderOn()}"
                                                            class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md  text-white hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                                                            @click="isOpen = false" x-ref="modalCloseButton">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="w-3 h-3" width="8" height="8"
                                                                viewBox="0 0 8 8" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div class="aspect-w-16 aspect-h-8 relative">
                                                        <div
                                                            class="absolute bottom-0 left-0 right-0 top-0 grid place-items-center">
                                                            <img class="inline-block h-[6.975rem] w-[6.975rem] rounded-full ring-2 ring-white dark:ring-gray-800"
                                                                src="{{ $institute->institute_logo }}"
                                                                alt="{{ $institute->name }}">
                                                        </div>
                                                        <img class="w-full object-cover rounded-t-xl h-52"
                                                            src="{{ $institute->featured_image }}"
                                                            alt="{{ $institute->name }}">
                                                    </div>
                                                    <div class="p-4  overflow-y-auto space-y-2 ">
                                                        <div
                                                            class="py-3 flex items-center text-sm text-gray-800 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:after:border-gray-600 uppercase font-bold">
                                                            {{ $edition->acronym }} -
                                                            {{ Carbon\Carbon::parse($edition->year)->format('Y') }}
                                                            Edition
                                                        </div>
                                                        @auth
                                                            <livewire:profile-percentage />
                                                        @endauth

                                                        <div class="grid md:grid-cols-2 gap-2 ">
                                                            <div
                                                                class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 cursor-pointer dark:focus:ring-gray-600">
                                                                <div class="p-4 md:p-5">
                                                                    <div class="flex">
                                                                        <x-heroicon-o-user-circle
                                                                            class=" flex-shrink-0 w-8 h-8 text-gray-800  dark:text-gray-200" />


                                                                        <div class="grow ms-5">
                                                                            <h3
                                                                                class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                                                                Step 1: Create Account
                                                                            </h3>
                                                                            <p class="text-[10px] text-gray-500">
                                                                                Create a onetime Account on the website.
                                                                                This account will be used for all
                                                                                your activities on this platform.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Card -->
                                                            <div
                                                                class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 cursor-pointer dark:focus:ring-gray-600">
                                                                <div class="p-4 md:p-5">
                                                                    <a href="{{ route('profile.show') }}"
                                                                        class="flex">
                                                                        <x-eos-fingerprint
                                                                            class=" flex-shrink-0 w-8 h-8 text-gray-800  dark:text-gray-200" />

                                                                        <div class="grow ms-5">
                                                                            <h3
                                                                                class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                                                                Step 2: Complete Profile
                                                                            </h3>
                                                                            <p class="text-[10px] text-gray-500">
                                                                                Complete your profile to start using the
                                                                                platform. This is to enable us
                                                                                serve you better.
                                                                            </p>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!-- End Card -->
                                                            <div class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 cursor-pointer dark:focus:ring-gray-600"
                                                                wire:click.prevent="application">
                                                                <div class="p-4 md:p-5">
                                                                    <div class="flex">
                                                                        <x-eos-school-o
                                                                            class=" flex-shrink-0 w-8 h-8 text-gray-800  dark:text-gray-200" />

                                                                        <div class="grow ms-5">
                                                                            <h3
                                                                                class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                                                                Step 3: Apply to Institute
                                                                            </h3>
                                                                            <p class="text-[10px] text-gray-500">
                                                                                There are 9 Institutes. With an account
                                                                                created and profile completed
                                                                                (once)
                                                                                , applying is just a click
                                                                                away.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Card -->
                                                            <div
                                                                class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 cursor-pointer dark:focus:ring-gray-600">
                                                                <div class="p-4 md:p-5">
                                                                    <div class="flex">
                                                                        <x-fluentui-payment-16-o
                                                                            class=" flex-shrink-0 w-8 h-8 text-gray-800  dark:text-gray-200" />

                                                                        <div class="grow ms-5">
                                                                            <h3
                                                                                class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                                                                Step 4: Complete payment
                                                                            </h3>
                                                                            <p class="text-[10px] text-gray-500">
                                                                                After acceptance, effect payment to
                                                                                reserve your place to complete
                                                                                application process.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Card -->


                                                        </div>

                                                        {{-- Pass the institute to Start Application component --}}
                                                       <livewire:start-application :institute="$institute"  />
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <a href="{{ route('institutes.show', $institute) }}"
                                    class="bg-blue-100 hover:bg-slate-200 dark:bg-gray-800 dark:hover:bg-gray-700
                                    grid grid-cols-4  m-auto
                                    md:p-3 p-3 rounded-2xl w-auto">

                                    <div class="col-span-1 ">
                                        <img class="w-15 md:w-15 md:h-15" src="{{ $institute->institute_logo }}"
                                            alt="{{ $institute->acronym }}">
                                    </div>
                                    <div class="col-span-3 flex justify-between items-center gap-2">
                                        <div class="  p-3">
                                            <p class="text-gray-800 dark:text-white  font-bold lg:text-sm">
                                                {{ $institute->editions()->latest()->first()->title }}
                                            </p>
                                            <p class="text-gray-500 dark:text-white  text-sm">
                                                {{ $institute->editions()->latest()->first()->duration }}
                                            </p>
                                        </div>
                                        <div class=" flex items-center ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-circle"><circle cx="12" cy="12" r="10"/><path d="m10 8 4 4-4 4"/></svg>
                                        </div>
                                    </div>


                                </a>

                            </div>



                        </div>
                    @endforeach


                </div>
            </div>
        </section>


        <div
            class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
            <svg class="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]"
                viewBox="0 0 1155 678">
                <path fill="url(#ecb5b0c9-546c-4772-8c71-4d3f06d544bc)" fill-opacity=".3"
                    d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                <defs>
                    <linearGradient id="ecb5b0c9-546c-4772-8c71-4d3f06d544bc" x1="1155.49" x2="-78.208"
                        y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9089FC" />
                        <stop offset="1" stop-color="#FF80B5" />
                    </linearGradient>
                </defs>
            </svg>
        </div>

    </div>


    <script>
        //  Hide front-header because it is misbehaving. We'll find a solution later
        function toggleFrontHeader() {
            const frontHeader = document.getElementById('front-header');
            const footer = document.getElementById('front-header');
            const showModal = document.getElementById('showModal');
            if (frontHeader) {
                frontHeader.style.display = 'none';
                footer.style.display = 'none';
                showModal.style.zIndex = 1000; // Set a high z-index value

            }
        }

        function toggleFrontHeaderOn() {
            const frontHeader = document.getElementById('front-header');
            const footer = document.getElementById('front-header');
            if (frontHeader) {
                frontHeader.style.display = 'flex';
                footer.style.display = 'flex';
            }
        }

        function addCalendar() {
            // Replace the URL below with the URL of the public calendar you want to add
            const calendarUrl =
                "https://calendar.google.com/calendar/ical/en.gh%23holiday%40group.v.calendar.google.com/public/basic.ics";

            // Replace the text below with the name you want to give to the added calendar
            const calendarName = "Public Calendar";

            // Create a new calendar object
            const newCalendar = {
                calendarName: calendarName,
                calendarUrl: calendarUrl
            };

            // Use the webcal protocol to add the calendar to the user's calendar app
            window.open("webcal://" + calendarUrl);
        }
    </script>
</x-front-layout>

