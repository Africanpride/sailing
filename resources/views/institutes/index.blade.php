<x-front-layout>
    <div class="isolate relative z-20 overflow-hidden pt-24 pb-12 ">
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
                <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                    @forelse ($institutes as $institute)
                    <div class="w-full h-auto min-h-[500px] ">
                        <img src="{{ $institute->featured_image }}" alt=""
                            class="rounded-t-2xl object-cover  shadow-2xl h-48 w-full ">
                        <div class="bg-white border border-s-0 rounded-b-3xl pb-2 ">


                            <div class="w-5/6 m-auto h-[7rem] min-h-[7rem] space-y-3">
                                <h2 class="text-center text-gray-800 md:text-[10px] font-bold pt-3 uppercase px-4 ">
                                    {{ $institute->name }}
                                </h2>
                                <p class="text-center text-[12px] text-gray-500  line-clamp-3">{!! $institute->overview !!}
                                </p>
                            </div>



                            <div class="py-3 text-center">
                                <a href="{{ route('institutes.show', [$institute]) }}">
                                    <x-button classs="lg:text-sm text-lg font-bold w-full">Register for
                                        {{ $institute->editions()->latest()->first()->title }}</x-button>
                                </a>
                            </div>

                            <div class="bg-gray-200/50 grid grid-cols-4 m-auto md:p-3 mx-2 p-3 rounded-3xl w-auto">
                                <div class="col-span-1 ">
                                    <img class="w-15 md:w-15 md:h-15" src="{{ $institute->institute_logo }}"
                                        alt="{{ $institute->acronym }}">
                                </div>
                                <div class="col-span-3 flex flex-row items-center p-3">
                                    <div>
                                        <p class="text-gray-800 font-bold lg:text-sm">
                                            {{ $institute->editions()->latest()->first()->title }}
                                        </p>
                                        <p class="text-gray-500 text-sm">
                                            {{ $institute->editions()->latest()->first()->duration }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse


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






</x-front-layout>
<script>
    function addCalendar() {
        // Replace the URL below with the URL of the public calendar you want to add
        const calendarUrl = "https://calendar.google.com/calendar/ical/en.gh%23holiday%40group.v.calendar.google.com/public/basic.ics";

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
