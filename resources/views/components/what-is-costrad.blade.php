<div class="text-center grid place-items-center space-y-6 py-16">
    {{-- Image --}}
    <div class="w-[126px] rounded-full aspect-square relative ">

        <div
            class=" w-[126px] blur hidden dark:inline-block absolute inset-0 rounded-full  bg-gradient-to-r from-purple-600 to-pink-600 z-10">
        </div>
        {{-- <img class="w-[126px] aspect-square absolute inset-0 z-20" src="{{ asset('images/logo/costrad.png') }}"
            alt="{{ $costrad->name ?? "College of Sustainable Transformation and Development"}}"> --}}

            <img class="w-[126px] aspect-square absolute inset-0 z-20" src="{{ asset('storage/' . optional($costrad)->logo) }}"
            alt="{{ optional($costrad)->name ?? "College of Sustainable Transformation and Development"}}">

    </div>

    {{-- Title --}}
    <div class="max-w-5xl space-y-4 ">
        <p class=" text-3xl font-bold
         text-slate-800 px-5 text-gradient1">
           {{  __( "Transform your life and pursue your dreams in our 5-week COSTrAD
            program. Apply now and don't miss this turning
            point.") }}
        </p>

    </div>
    {{-- <hr class="border border-gray-500/50"> --}}

    <!-- Icon Blocks -->
    <div class="max-w-[75rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-12 text-left">
            <!-- Icon Block -->
            <div>
                <svg class="w-9 h-9 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
                <div
                    class="bg-gradient-to-r from-gray-200 to-white/0 h-0.5 mt-6 dark:from-gray-700 dark:to-slate-900/0">
                    <div class="bg-gray-400 w-9 h-0.5"></div>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ __('Life Changing') }}</h3>
                    <p class="mt-1 text-gray-600 dark:text-gray-400">{{ __('A window to reboot and rediscover your life
                        purpose.') }}</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                <svg class="w-9 h-9 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z" />
                    <path
                        d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z" />
                    <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z" />
                </svg>
                <div
                    class="bg-gradient-to-r from-gray-200 to-white/0 h-0.5 mt-6 dark:from-gray-700 dark:to-slate-900/0">
                    <div class="bg-gray-400 w-9 h-0.5"></div>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{  __('Speed & Accuracy') }}</h3>
                    <p class="mt-1 text-gray-600 dark:text-gray-400">{{  __('Accelerated learning and Skills Acquisition.') }}</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                <svg class="w-9 h-9 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                </svg>
                <div
                    class="bg-gradient-to-r from-gray-200 to-white/0 h-0.5 mt-6 dark:from-gray-700 dark:to-slate-900/0">
                    <div class="bg-gray-400 w-9 h-0.5"></div>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Intensive</h3>
                    <p class="mt-1 text-gray-600 dark:text-gray-400">5-weeks of total immersion in an intensive program.
                    </p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div>
                <svg class="w-9 h-9 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path
                        d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
                <div
                    class="bg-gradient-to-r from-gray-200 to-white/0 h-0.5 mt-6 dark:from-gray-700 dark:to-slate-900/0">
                    <div class="bg-gray-400 w-9 h-0.5"></div>
                </div>
                <div class="mt-5">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">All-Encompassing</h3>
                    <p class="mt-1 text-gray-600 dark:text-gray-400">{{ __('COSTrAD curriculum spans all subjects taught in all
                        8 institutes.') }}</p>
                </div>
            </div>
            <!-- End Icon Block -->
        </div>
    </div>
    <!-- End Icon Blocks -->

    <div class="mx-auto py-6 text-center w-full">
        {{-- <a href="#"> <button class="cbutton font-bold">Learn More About
                costrad</button>
        </a> --}}
        <a href="{{ route('institutes.show', [$costrad->slug]) }}"> <button class="cbutton font-bold">Learn More About
                costrad</button>
        </a>
    </div>
</div>
