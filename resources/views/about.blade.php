<x-front-layout>

    <div class="space-y-4">

        <section class="relative z-20 overflow-hidden p-4  pt-20 pb-8 md:pt-[120px] md:pb-[70px]">
            <div class="container mx-auto">
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="mx-auto mb-[60px] max-w-[920px] text-center md:mb-16 space-y-3">

                            <x-top-title>
                                COSTrAD: A Leadership Development Initiative
                                <x-slot name="icon">
                                    <x-lucide-globe class="dark:text-white  w-5 h-5 " />
                                </x-slot>

                                <x-slot name="paragraph">

                                    The College of Sustainable Transformation and Development (<a
                                        href="{{ route('institutes.show', [\App\Models\Institute::whereAcronym('costrad')->first()->slug]) }}"
                                        class=" bg-clip-text bg-gradient-to-l from-firefly-600 to-violet-500 text-transparent dark:from-firefly-400 dark:to-violet-400 font-bold">COSTrAD</a>)
                                    is an initiative of the Logos-Rhema Foundation for Leadership Resource Development,
                                    a Non-Governmental Foundation registered in Ghana.

                                </x-slot>

                            </x-top-title>
                        </div>
                    </div>
                </div>
            </div>


        </section>

        <section class="max-w-8xl p-4 md:px-6 mx-auto h-auto">

            <div class="relative overflow-hidden rounded-2xl bg-cover "
                style="background-image: url('{{ asset('images/main/lecture_in_progress.jpg') }}');">


                <div class="relative z-10 py-8 shadow-2xl  p-4 md:p-8 mx-auto ">
                    <div class="py-10">
                        <div class="text-center mx-auto ">
                            <span
                                class="inline-block text-lg font-medium bg-clip-text bg-gradient-to-l from-firefly-600 to-violet-500 text-transparent dark:from-firefly-400 dark:to-violet-400 uppercase ">
                                COSTrAD: Our Transformational Vision
                            </span>

                            <!-- Title -->
                            <div class="mt-5 max-w-4xl mx-auto">
                                <p class="block  text-white text-xl md:text-3xl font-['anton'] font-thin  uppercase">
                                    Seeing the invisible, hearing the inaudible, touching the intangible, perceiving the
                                    imperceptible and doing the seemingly impossible.
                                </p>
                            </div>
                            <!-- End Title -->

                            <!-- Buttons -->
                            <div class="mt-8 grid gap-3 w-full sm:inline-flex sm:justify-center">
                                <a class="inline-flex justify-center items-center gap-x-3 text-center bg-firefly-600 hover:bg-firefly-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-firefly-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 "
                                    href="{{ url('our-process') }}">
                                    Start the Journey
                                    <svg class="w-3 h-3" width="16" height="16" viewBox="0 0 16 16"
                                        fill="none">
                                        <path
                                            d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </a>
                                <a class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-firefly-500 hover:bg-gray-800 hover:text-white focus:outline-none transition-all text-sm dark:text-white dark:hover:bg-gray-800 dark:hover:border-gray-900  "
                                    href="{{ url('/institutes') }}">
                                    <x-lucide-globe class="w-5 h-5 text-current " />
                                    Our Institutes
                                </a>

                            </div>
                            <!-- End Buttons -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- agenda -->
        <section class="max-w-8xl w-full px-4 py-10 md:px-8 md:py-10 mx-auto  dark:bg-firefly-900">
            <!-- Grid -->
            <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 ">
                <div>

                    <img class="rounded-2xl h-auto md:h-['90vh']" src="{{ asset('images/main/lecture_hall.jpg') }}"
                        alt="Costrad on leadership">

                    <!-- End Col -->
                </div>
                <div class="mt-5 sm:mt-10 md:mt-0">
                    <div class="space-y-6 sm:space-y-8">
                        <!-- Title -->
                        <div class="space-y-2 md:space-y-4">
                            <h4 class="text-firefly-700 dark:text-gray-200 font-semibold uppercase">
                                Discover Our Agenda
                            </h4>
                            <h2
                                class="uppercase font-['anton'] text-2xl md:text-5xl leading-tight tracking-tight text-gray-900 dark:text-white">
                                Developing The Transformational
                                Capacity of Nations
                            </h2>
                            <p class="text-lg text-firefly-700 dark:text-white prose dark:prose-invert">
                                Our agenda touches key areas in governance, building strong institutions, Economy,
                                Education
                                and
                                Skills development, Innovation and Technology as well as social foundations and belief
                                systems. These are just
                                some of
                                the key factors that contribute to a nation's transformational capacity, and the
                                specific
                                mix of factors will vary depending on the context and challenges faced by each
                                individual
                                and nation. Our goals align if making an impact in the list below is of interest to you;
                            </p>
                        </div>
                        <!-- End Title -->
                        <div class="grid grid-cols-2 gap-4">

                            <!-- List -->
                            <ul role="list" class="space-y-2 sm:space-y-4 text-[12px]">
                                <li class="flex space-x-3">
                                    <!-- Solid Check -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-firefly-600 dark:text-firefly-500"
                                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.1965 7.85999C15.1965 3.71785 11.8387 0.359985 7.69653 0.359985C3.5544 0.359985 0.196533 3.71785 0.196533 7.85999C0.196533 12.0021 3.5544 15.36 7.69653 15.36C11.8387 15.36 15.1965 12.0021 15.1965 7.85999Z"
                                            fill="currentColor" fill-opacity="0.1" />
                                        <path
                                            d="M10.9295 4.88618C11.1083 4.67577 11.4238 4.65019 11.6343 4.82904C11.8446 5.00788 11.8702 5.32343 11.6914 5.53383L7.44139 10.5338C7.25974 10.7475 6.93787 10.77 6.72825 10.5837L4.47825 8.5837C4.27186 8.40024 4.25327 8.0842 4.43673 7.87781C4.62019 7.67142 4.93622 7.65283 5.14261 7.83629L7.01053 9.49669L10.9295 4.88618Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!-- End Solid Check -->

                                    <span class=" sm:text-base text-gray-500">
                                        <span class="font-bold">Strong Social Foundations</span>
                                    </span>
                                </li>

                                <li class="flex space-x-3">
                                    <!-- Solid Check -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-firefly-600 dark:text-firefly-500"
                                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.1965 7.85999C15.1965 3.71785 11.8387 0.359985 7.69653 0.359985C3.5544 0.359985 0.196533 3.71785 0.196533 7.85999C0.196533 12.0021 3.5544 15.36 7.69653 15.36C11.8387 15.36 15.1965 12.0021 15.1965 7.85999Z"
                                            fill="currentColor" fill-opacity="0.1" />
                                        <path
                                            d="M10.9295 4.88618C11.1083 4.67577 11.4238 4.65019 11.6343 4.82904C11.8446 5.00788 11.8702 5.32343 11.6914 5.53383L7.44139 10.5338C7.25974 10.7475 6.93787 10.77 6.72825 10.5837L4.47825 8.5837C4.27186 8.40024 4.25327 8.0842 4.43673 7.87781C4.62019 7.67142 4.93622 7.65283 5.14261 7.83629L7.01053 9.49669L10.9295 4.88618Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!-- End Solid Check -->

                                    <span class=" sm:text-base text-gray-500">
                                        Good <span class="font-bold"> Governance</span>
                                    </span>
                                </li>


                                <li class="flex space-x-3">
                                    <!-- Solid Check -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-firefly-600 dark:text-firefly-500"
                                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.1965 7.85999C15.1965 3.71785 11.8387 0.359985 7.69653 0.359985C3.5544 0.359985 0.196533 3.71785 0.196533 7.85999C0.196533 12.0021 3.5544 15.36 7.69653 15.36C11.8387 15.36 15.1965 12.0021 15.1965 7.85999Z"
                                            fill="currentColor" fill-opacity="0.1" />
                                        <path
                                            d="M10.9295 4.88618C11.1083 4.67577 11.4238 4.65019 11.6343 4.82904C11.8446 5.00788 11.8702 5.32343 11.6914 5.53383L7.44139 10.5338C7.25974 10.7475 6.93787 10.77 6.72825 10.5837L4.47825 8.5837C4.27186 8.40024 4.25327 8.0842 4.43673 7.87781C4.62019 7.67142 4.93622 7.65283 5.14261 7.83629L7.01053 9.49669L10.9295 4.88618Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!-- End Solid Check -->

                                    <span class=" sm:text-base text-gray-500">
                                        Education and skills development
                                    </span>
                                </li>
                            </ul>
                            <!-- End List -->
                            <!-- List -->
                            <ul role="list" class="space-y-2 sm:space-y-4">
                                <li class="flex space-x-3">
                                    <!-- Solid Check -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-firefly-600 dark:text-firefly-500"
                                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.1965 7.85999C15.1965 3.71785 11.8387 0.359985 7.69653 0.359985C3.5544 0.359985 0.196533 3.71785 0.196533 7.85999C0.196533 12.0021 3.5544 15.36 7.69653 15.36C11.8387 15.36 15.1965 12.0021 15.1965 7.85999Z"
                                            fill="currentColor" fill-opacity="0.1" />
                                        <path
                                            d="M10.9295 4.88618C11.1083 4.67577 11.4238 4.65019 11.6343 4.82904C11.8446 5.00788 11.8702 5.32343 11.6914 5.53383L7.44139 10.5338C7.25974 10.7475 6.93787 10.77 6.72825 10.5837L4.47825 8.5837C4.27186 8.40024 4.25327 8.0842 4.43673 7.87781C4.62019 7.67142 4.93622 7.65283 5.14261 7.83629L7.01053 9.49669L10.9295 4.88618Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!-- End Solid Check -->

                                    <span class="text-sm sm:text-base text-gray-500">
                                        <span class="font-bold">Innovation and technology</span>
                                    </span>
                                </li>
                                <li class="flex space-x-3">
                                    <!-- Solid Check -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-firefly-600 dark:text-firefly-500"
                                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.1965 7.85999C15.1965 3.71785 11.8387 0.359985 7.69653 0.359985C3.5544 0.359985 0.196533 3.71785 0.196533 7.85999C0.196533 12.0021 3.5544 15.36 7.69653 15.36C11.8387 15.36 15.1965 12.0021 15.1965 7.85999Z"
                                            fill="currentColor" fill-opacity="0.1" />
                                        <path
                                            d="M10.9295 4.88618C11.1083 4.67577 11.4238 4.65019 11.6343 4.82904C11.8446 5.00788 11.8702 5.32343 11.6914 5.53383L7.44139 10.5338C7.25974 10.7475 6.93787 10.77 6.72825 10.5837L4.47825 8.5837C4.27186 8.40024 4.25327 8.0842 4.43673 7.87781C4.62019 7.67142 4.93622 7.65283 5.14261 7.83629L7.01053 9.49669L10.9295 4.88618Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!-- End Solid Check -->

                                    <span class="text-sm sm:text-base text-gray-500">
                                        <span class="font-bold">Sustainable </span> Development
                                    </span>
                                </li>

                                <li class="flex space-x-3">
                                    <!-- Solid Check -->
                                    <svg class="flex-shrink-0 h-6 w-6 text-firefly-600 dark:text-firefly-500"
                                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.1965 7.85999C15.1965 3.71785 11.8387 0.359985 7.69653 0.359985C3.5544 0.359985 0.196533 3.71785 0.196533 7.85999C0.196533 12.0021 3.5544 15.36 7.69653 15.36C11.8387 15.36 15.1965 12.0021 15.1965 7.85999Z"
                                            fill="currentColor" fill-opacity="0.1" />
                                        <path
                                            d="M10.9295 4.88618C11.1083 4.67577 11.4238 4.65019 11.6343 4.82904C11.8446 5.00788 11.8702 5.32343 11.6914 5.53383L7.44139 10.5338C7.25974 10.7475 6.93787 10.77 6.72825 10.5837L4.47825 8.5837C4.27186 8.40024 4.25327 8.0842 4.43673 7.87781C4.62019 7.67142 4.93622 7.65283 5.14261 7.83629L7.01053 9.49669L10.9295 4.88618Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!-- End Solid Check -->

                                    <span class="text-sm sm:text-base text-gray-500">
                                        Understanding <span class="font-bold">Systems</span>
                                    </span>
                                </li>

                            </ul>
                            <!-- End List -->
                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </section>

        <!-- End agenda -->
        <section class="max-w-8xl p-4 md:p-8 mx-auto">

            <div
                class="  mx-auto rounded-2xl border  border-gray-300/10 text-center space-y-5
            bg-slate-500/10 dark:bg-black py-16 dark:bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))]
             from-firefly-900 to-firefly-900/80">
                <div class="md:p-12 p-4">
                    <!-- End Mission -->
                    <div
                        class="max-w-10xl md:max-w-6xl mx-auto relative text-center px-4 sm:px-6 md:px-8 py-10 md:py-24 space-y-3">
                        <div
                            class="inline-block bg-gradient-to-tl from-firefly-600 via-transparent to-purple-400 p-px rounded-md mb-3">
                            <div
                                class="bg-white rounded-md py-1.5 px-3 text-xl font-bold md:text-3xl md:leading-tight dark:bg-slate-900">

                                <span
                                    class="bg-clip-text bg-gradient-to-tl from-firefly-600 to-purple-400 text-transparent">
                                    Our Mission 20 Years +
                                </span>
                            </div>
                        </div>

                        <p class="block font-thin text-firefly-800 text-xl md:text-3xl  dark:text-gray-200  uppercase">
                            Our Mission is to raise and develop generations of
                            transformational leaders, equipped to bring systemic and sustainable change, to every sphere
                            of
                            society.
                        </p>

                        <div class="mt-5 hidden">
                            <a class="inline-flex justify-center items-center gap-x-3 text-center bg-firefly-600 hover:bg-firefly-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-firefly-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 "
                                href="https://github.com/htmlstreamofficial/preline/tree/main/examples/html"
                                target="_blank">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z">
                                    </path>
                                </svg>
                                Download examples
                            </a>
                        </div>
                    </div>
                    <!-- End Mission -->
                </div>
            </div>
        </section>


        <section class="max-w-8xl p-4 md:px-8   mx-auto h-auto ">

            <div class="relative overflow-hidden rounded-2xl bg-cover z-10"
                style="background-image: url('{{ asset('images/main/lecture_in_progress2.jpg') }}'); ">

                <div class="absolute inset-0 w-full h-full bg-gray-950 opacity-25 dark:opacity-40 z-20"></div>

                <div class="h-auto md:p-8   mx-auto p-4 relative shadow-2xl z-30">
                    <div class=" py-32 space-y-6">
                        <div class="text-center mx-auto">
                            {{-- <span
                                class="inline-block text-lg font-medium bg-clip-text bg-gradient-to-l from-firefly-600 to-violet-500 text-transparent dark:from-firefly-400 dark:to-violet-400 uppercase ">
                                COSTrAD: Our Transformational Vision
                            </span> --}}

                            <!-- Title -->
                            <div class="mb-5 max-w-4xl mx-auto">
                                <p
                                    class="block  text-white text-xl max-w-3xl mx-auto md:text-3xl font-['anton'] font-thin  uppercase">
                                    Empowering visionary leaders to drive transformative change across all societal
                                    domains.
                                </p>
                            </div>
                            <!-- End Title -->

                        </div>
                        <div class="max-w-7xl grid grid-cols-3 md:grid-cols-9 gap-6 md:gap-6 mx-auto my-8">
                            @foreach (App\Models\Institute::all() as $institute)
                                <div
                                    class="flex md:flex-col justify-start items-center gap-2 text-center text-white space-y-2 font-extrabold font-['inter'] text-xs md:text-lg">

                                    <a class="flex flex-shrink-0 hover:-translate-y-1 items-center justify-center text-center transition"
                                        href="{{ route('institutes.show',[$institute]) }}">
                                        <img class="w-12 md:w-24" src="{{ $institute->institute_logo }}"
                                            alt="{{ $institute->name }}">
                                    </a>
                                    <div class="uppercase">
                                        {{ $institute->acronym }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mx-auto text-center max-w-2xl pt-5">
                            <a href="{{ route('institutes.index') }}">
                                <x-button
                                    class="!mx-auto md:!w-1/3 text-center bg-firefly-800 dark:bg-firefly-900 dark:hover:bg-firefly-800 py-3 text-xl !font-extrabold ">
                                    {{ __('Institutes') }}
                                </x-button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- agenda -->
        <section class="max-w-[85rem] w-full px-4 py-10 sm:px-6 md:px-8 md:py-14 mx-auto   dark:bg-firefly-900/50">
            <!-- Grid -->
            <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">

                <div class="my-5 sm:mt-10 md:mt-0">
                    <div class="space-y-6 sm:space-y-8">
                        <!-- Title -->
                        <div class="space-y-2 md:space-y-4">
                            <h4 class="text-firefly-700 dark:text-gray-200 font-semibold uppercase  ">
                                A Journey for Now and Beyond </h4>
                            <h2
                                class="uppercase font-['anton'] text-2xl md:text-5xl leading-tight tracking-tight text-gray-900 dark:text-white">
                                Global Sustainable Transformation Leadership
                                Training.
                            </h2>
                            <p class="text-lg text-gray-500 dark:text-white prose dark:prose-invert">
                                The College of Sustainable Transformation and Development (COSTrAD) and the various
                                institutes are committed to the restoration, transformation and development of all
                                spheres
                                of society.

                                These sustainable transformation educational platforms seek to do this by training and
                                developing strategic transformational leaders, in a world characterized by increasing
                                complexity and confronted by varied challenges, to harness the most strategic
                                (qualitative
                                and quantitative) resources within their environment to solve societal challenges.
                            </p>
                        </div>
                        <!-- End Title -->

                    </div>
                </div>

                <div>
                    <img class="rounded-xl h-auto" src="{{ asset('images/main/lecture1.jpg') }}"
                        alt="Costrad on leadership">
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </section>


        <!-- End agenda -->
        <section class="max-w-8xl p-4 md:p-8   mx-auto">

            <div
                class=" min-h-[500px] mx-auto rounded-2xl border  border-gray-300/10 text-center space-y-5
            bg-slate-500/10 dark:bg-black py-16 dark:bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))]
             from-firefly-900 to-firefly-900/80">

             <x-team />

            </div>
        </section>



    </div>




<x-subscribe />

</x-front-layout>
