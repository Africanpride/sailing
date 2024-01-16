<x-front-layout>
    <section class="max-w-8xl p-4 md:px-8   mx-auto  ">
        <div class="{{ $isMobile ? '' : 'kenburns' }} min-h-[55svh] bg-center bg-cover bg-no-repeat relative rounded-3xl md:min-h-[85svh] h-[95svh]"
            style="background-image: url('{{ asset('images/main/un2.jpg') }}');">


            <div
                class="absolute bottom-0 left-0 right-0 max-w-md text-center mx-auto p-6 md:left-auto md:text-left md:mx-0">
                <!-- Card -->
                <div
                    class="bg-white dark:bg-firefly-900 flex-col gap-4 inline-flex justify-between md:p-4 px-2 rounded-2xl shadow-2xl">
                    <div class="hidden md:block">
                        <h3 class=" font-bold text-gray-800 text-sm dark:text-gray-200">
                            {{ __('COSTrAD: A Critical Mandate.') }}
                        </h3>
                        <p class="mt-2 text-gray-800 dark:text-gray-200 text-xs text-left">
                            {{ __("The College of Sustainable
                                                        Transformation and Development (COSTrAD) and the various institutes are committed to the
                                                        restoration, transformation and development of all spheres of society.") }}
                        </p>
                    </div>

                    <div class="inline-flex">
                        <a class="p-2 md:p-0 flex items-center gap-2 text-xs text-gray-800 hover:text-gray-500 dark:text-white dark:hover:text-gray-400"
                            href="#">
                            <svg class="w-4 h-auto" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                <path
                                    d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z">
                                </path>
                            </svg>
                            {{ __('Watch our AudioVisual') }}
                        </a>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </section>


    <section class="w-full items-center flex flex-col justify-center py-8">
        <div class="hidden md:block">
            <svg width="317" height="120" viewBox="0 0 317 120" fill="none">
                <path transform="tranfirefly(-36,0)" d="m197.32283 25.03412l-0 100.48032" stroke="gray"
                    stroke-opacity="0.2">
                </path>
                <path transform="tranfirefly(-36,0)" d="m197.32283 25.03412l-0 100.48032" stroke="url(#pulse-1)"
                    stroke-linecap="round" stroke-width="2"></path>
                <path d="m197.32283 25.03412-0 20" stroke="gray"
                    style="transform: tranfireflyX(-36px) tranfireflyY(118.724px); transform-origin: 197.323px 35.0341px;"
                    transform-origin="197.3228302001953px 35.034119606018066px"></path>
            </svg>
        </div>
        <h2
            class="mt-4 max-w-6xl text-firefly-900 text-lg md:text-5xl tracking-tight  font-bold  font-['inter'] uppercase prominent-titles">
            ... doing the seemingly impossible
        </h2>
        {{-- <h2
            class="  px-5 text-gradient1 inline-block mt-5 text-3xl md:text-4xl font-extrabold  bg-clip-text bg-gradient-to-l from-firefly-600 to-violet-500 text-transparent dark:from-firefly-400 dark:to-violet-400 uppercase">
            ...doing the seemingly impossible.
        </h2> --}}
        <span class="md:text-lg font-bold uppercase text-gray-400 dark:text-white text-center mt-2 px-6 sm:px-0">
            Explore what COSTrAD can help you achieve.
        </span>
    </section>


    <section class="max-w-auto  mx-auto h-auto pt-16">

        <div class="  md:py-24 ">

            <div class="px-4 mx-auto max-w-8xl sm:px-6 lg:px-8">
                <div class="grid items-stretch gap-y-10 md:grid-cols-2 md:gap-x-6">
                    <div class="relative grid grid-cols-2 gap-4 mt-10 md:mt-0 py-12 h-auto">
                        <div class="overflow-hidden aspect-w-3 aspect-h-4 rounded-2xl">
                            <img class="object-cover object-top origin-top scale-150 "
                                src="{{ asset('images/main/leader2.jpg') }}" alt="" />
                        </div>

                        <div class="relative">
                            <div class="h-full overflow-hidden aspect-w-3 aspect-h-4 rounded-2xl">
                                <img class="object-cover object-top origin-top scale-150"
                                    src="{{ asset('images/main/leader4.jpg') }}" alt="" />
                            </div>

                        </div>

                        <div class="absolute -translate-x-1/2 left-[50%]  ">
                            <img class="w-32 h-32 rotating" src="{{ asset('images/main/round-text-costrad.png') }}"
                                alt="" />
                        </div>
                    </div>

                    <div class="flex flex-col items-start justify-center md:px-8 space-y-6 text-left ">

                        <h2
                            class="uppercase font-['anton'] text-5xl md:text-5xl leading-tight tracking-tight   bg-clip-text bg-gradient-to-l from-firefly-700 to-firefly-900 text-transparent dark:from-yellow-500 dark:to-firefly-700 ">
                            The Vital Role of Leadership Training Today
                        </h2>
                        <p>
                            At the <span>College of Systainable Transformation and Development COSTrAD</span>, You would
                            find more reasons why leadership training is essential and how
                            leadership impacts family, governance, economy and every aspect of society. We teach you
                            the necessary skills and qualities to effectively lead and manage people, organizations,
                            and systems. Leaders must possess strong communication, decision-making, and
                            problem-solving skills, as well as the ability to inspire and motivate others.

                        </p>
                        {{-- <p>
                            Effective leadership involves being able to adapt to changing circumstances and make
                            difficult decisions when necessary. Through COSTrAD and it's various Institutes,
                            individuals, business leader and political leaders can gain the knowledge and skills
                            necessary to navigate complex political and social environments, build strong teams, and
                            create positive change within their
                            communities. Do you want to acquire what it takes to make a mark in your area of
                            operation? Book your seat early as space could fill up quickly.
                        </p> --}}


                        <div class=" w-full mx-auto py-8 md:py-6 ">
                            <a href="{{ url('about') }}">
                                <button class="cbutton !py-1 font-bold" style="width:50%;">Learn More About
                                    costrad</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="max-w-8xl p-4 md:px-8   mx-auto h-auto">

        <div
            class=" min-h-[600px] mx-auto rounded-2xl border  border-gray-300/10 text-center space-y-5
         bg-firefly-500/10 dark:bg-black py-16 dark:bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))]
          from-firefly-900 to-firefly-900/80">

            <x-what-is-costrad />

        </div>
    </section>



{{-- <x-subscribe /> --}}
</x-front-layout>
