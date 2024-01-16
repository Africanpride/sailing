<x-front-layout>

    <section class="relative z-20 overflow-hidden p-4  pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="container mx-auto">

            <div class="container mx-auto">
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="mx-auto mb-[60px] max-w-[920px] text-center lg:mb-20 space-y-3">
                            <x-top-title>
                                <span>FAQ: Any Questions? Answered</span>
                                <x-slot name="icon">
                                    <x-lucide-info class="text-current w-5 h-5 " />
                                </x-slot>


                                <x-slot name="paragraph">
                                    Get answers to your questions anytime, anywhere about <a href="{{ url('costrad') }}"
                                        class=" bg-clip-text bg-gradient-to-l from-firefly-600 to-violet-500 text-transparent
                                     dark:from-firefly-400 dark:to-violet-400">COSTrAD</a>.
                                    Browse our comprehensive FAQs for valuable insights and solutions, available around
                                    the
                                    clock to help you out.
                                </x-slot>

                            </x-top-title>
                        </div>
                    </div>
                </div>
            </div>


            <!-- FAQ -->
            <div class="max-w-[85rem] py-5 sm:px-6 lg:px-8 lg:py-14 mx-auto">


                <div class="max-w-full mx-auto">
                    <!-- Accordion -->
                    <div class="hs-accordion-group grid md:grid-cols-2 gap-4">

                        <div class="border border-gray-500/20  hover:shadow-md transition hs-accordion hs-accordion-active:bg-gray-100 rounded-xl p-6 dark:hs-accordion-active:bg-white/[.05] active"
                            id="hs-basic-with-title-and-arrow-stretched-heading-one">
                            <button
                                class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400"
                                aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-one">
                                Can I cancel at anytime?
                                <svg class="hs-accordion-active:hidden block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400"
                                    width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                                <svg class="hs-accordion-active:block hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400"
                                    width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11L8.16086 5.31305C8.35239 5.13625 8.64761 5.13625 8.83914 5.31305L15 11"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </button>
                            <div id="hs-basic-with-title-and-arrow-stretched-collapse-one"
                                class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                                aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-one">
                                <p class="text-gray-800 dark:text-gray-200">
                                    Yes, you can cancel anytime no questions are asked while you cancel but we would
                                    highly appreciate if you will give us some feedback.
                                </p>
                            </div>
                        </div>

                        <div class="border border-gray-500/20  hover:shadow-md transition hs-accordion hs-accordion-active:bg-gray-100 rounded-xl p-6 dark:hs-accordion-active:bg-white/[.05]"
                            id="hs-basic-with-title-and-arrow-stretched-heading-two">
                            <button
                                class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400"
                                aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-two">
                                My team has credits. How do we use them?
                                <svg class="hs-accordion-active:hidden block w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400"
                                    width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                                <svg class="hs-accordion-active:block hidden w-3 h-3 text-gray-600 group-hover:text-gray-500 dark:text-gray-400"
                                    width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11L8.16086 5.31305C8.35239 5.13625 8.64761 5.13625 8.83914 5.31305L15 11"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </button>
                            <div id="hs-basic-with-title-and-arrow-stretched-collapse-two"
                                class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-two">
                                <p class="text-gray-800 dark:text-gray-200">
                                    Once your team signs up for a subscription plan. This is where we sit down, grab
                                    a cup of coffee and dial in the details.
                                </p>
                            </div>
                        </div>


                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
            <!-- End FAQ -->
        </div>

        <div class="absolute bottom-0 right-0 z-[-1]">
            <svg width="1440" height="886" viewBox="0 0 1440 886" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5"
                    d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
                    fill="url(#paint0_linear)"></path>
                <defs>
                    <linearGradient id="paint0_linear" x1="1308.65" y1="1142.58" x2="602.827" y2="-418.681"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3056D3" stop-opacity="0.36"></stop>
                        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0"></stop>
                        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144"></stop>
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </section>

</x-front-layout>
