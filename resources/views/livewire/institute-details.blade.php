<div>
    {{-- @can('userEnrolled', $institute)

        <div x-data="{ showBanner: {{ $this->instituteAlreadyEnrolled() ? 'true' : 'false' }} }" x-show="showBanner"
            class="bg-gradient-to-r dark:from-firefly-800 from-blue-700 to-violet-600">
            <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
                <div
                    class="py-1.5 text-center md:text-left grid justify-center items-center gap-1.5 md:flex md:justify-between">
                    <p class="mr-2 inline-block text-xs sm:text-sm text-white font-bold">
                        You are Enrolled!
                    </p>
                    <div class="flex justify-center md:justify-start items-center gap-x-2.5">
                        <span
                            class="py-1.5 px-1 inline-flex justify-center items-center gap-x-1.5 rounded-md font-semibold text-white/90 decoration-2    transition-all text-xs">
                            <span>{{ $institute->name }}</span>: <span class="text-gradient-copilot">
                                @if ($institute->acronym == 'costrad')
                                    <span class=" tracking-wide">{{ __('COSTrAD') }}</span>
                                @else
                                    <span class="uppercase tracking-wide">{{ $institute->acronym }}
                                        {{ \Carbon\Carbon::parse($institute->startDate)->format('Y') }} </span>
                                @endif
                            </span>
                        </span>
                        <div class="inline-block h-3 border-r border-white/50"></div>

                        <form method="GET" action="{{ route('myEnrolments', [$institute->id]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <button
                                class="btn cursor-pointer py-1.5 px-2.5 inline-flex justify-center items-center gap-x-1.5 rounded-md bg-white/10 font-semibold text-white hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-violet-900 transition-all text-xs"
                                type="submit">
                                Visit My Enrollments
                                <x-lucide-arrow-right class="w-3 h-3 text-current" />
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    @endcan --}}

    <div class="space-y-4 pt-4">

        <section class="max-w-8xl p-4 md:px-8   mx-auto h-auto relative">


            <div class="{{ $isMobile ? '' : 'kenburns' }} min-h-[55vh] bg-center bg-cover bg-no-repeat rounded-3xl md:min-h-[85vh] relative"
                style="background-image: url('{{ $institute->featured_image }}');">

                <div
                    class="absolute bottom-0 left-0 max-w-screen-2xl  md:left-auto md:mx-0 md:text-left mx-auto p-4 right-0">
                    <!-- Card -->
                    <div
                        class="prose dark:prose-invert px-6 py-5
                         prose-a:text-firefly-500 bg-white dark:bg-firefly-900 space-y-4  rounded-2xl shadow-2xl">
                        <div class="text-sm font-bold flex justify-between items-center">
                            <div> <span
                                    class="uppercase ">{{ $institute->acronym }}</span>{{ __(': A Critical Mandate.') }}
                            </div>
                            <div class="text-gradient__teal">{{ $institute->duration }}, {{ now()->format('Y') }}</div>
                        </div>

                        <div
                            class="hidden justify-between items-center dark:text-gray-200 font-extrabold text-gray-800 text-left text-sm">
                            <h3 class="hidden md:flex  ">
                                <span class="uppercase ">{{ $institute->acronym }}</span>
                                : A Critical Mandate.
                            </h3>
                            <div class="text-gradient__teal">{{ $institute->duration }}, {{ now()->format('Y') }}
                            </div>
                        </div>

                        <div
                            class="my-2 text-gray-800 dark:text-gray-200 text-xs md:text-justify line-clamp-6 md:line-clamp-none">

                            <span class="text-xs font-extralight	 ">{!! $institute->overview !!}</span>

                        </div>

                        <div class="hidden md:flex justify-between items-center">
                            <div class="not-prose">

                                <a class=" flex items-center gap-2 text-xs text-gray-800 hover:text-gray-500 dark:text-white dark:hover:text-gray-400"
                                    href="#">
                                    <svg class="w-4 h-auto" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path
                                            d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z">
                                        </path>
                                    </svg>
                                    Watch our AudioVisual
                                </a>
                            </div>

                            <div x-data="{ progress: {{ $institute->progress }} }" class="w-3/5">
                                <span x-show="progress > 0">
                                    <div
                                        class="relative flex w-full h-5.5 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
                                        <div class="flex flex-col justify-center overflow-hidden bg-firefly-800 text-[9px] text-white text-center 	"
                                            role="progressbar" style="width: {{ $institute->progress }}%"
                                            aria-valuenow="{{ $institute->progress }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class=" text-[9px] whitespace-nowrap text-center px-2">Progress
                                                {{ $institute->progress }}% </span>
                                        </div>
                                    </div>
                                </span>
                            </div>

                        </div>

                        <!-- End Card -->
                    </div>
                </div>
        </section>

        <section class="max-w-8xl p-4 md:px-8   mx-auto h-auto">
            <div
                class="min-h-[600px] md:min-h-max bg-firefly-500/10 border border-gray-300/10 dark:bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] dark:bg-black from-firefly-900 mx-auto p-8 rounded-3xl space-y-5 text-left to-firefly-900 py-16">

                <img class="inline-block w-16 md:w-24 rounded-full ring-2 ring-white dark:ring-gray-800"
                    src="{{ $institute->institute_logo }}" alt="{{ $institute->name }}">
                <div class="max-w-xl">
                    <div
                        class="bg-gradient-to-r from-gray-200 to-white/0 h-0.5 mt-6 dark:from-gray-700 dark:to-firefly-900/0">
                        <div class="bg-gray-300 w-[4.975rem] h-0.5"></div>
                    </div>
                </div>
                <h2 class="mt-5 font-semibold text-sky-500 text-gradient1">{{ __('Overview') }}</h2>
                <p
                    class="mt-4 gap-3 text-md md:text-3xl sm:text-xl text-firefly-900 font-extrabold tracking-tight dark:text-firefly-50 ">
                    <span>{{ $institute->name }}:</span>
                    <span class="text-gradient1">
                        @if ($institute->acronym == 'costrad')
                            (<span>{{ __('COSTrAD') }}</span>)
                        @else
                            <span class="uppercase">({{ $institute->acronym }}) </span>
                        @endif
                    </span>
                </p>
                <div class="mt-4 max-w-6xl space-y-6 text-[16px] "> {!! $institute->introduction ??
                    ' Foundations for brain architecture in early childhood, Early childhood development, Developing children into sons, Strategic Innovative and effective child development systems and Futuristic systems of education.' !!}
                </div>
                <div class="py-5">
                    <div class="flex space-x-1">
                        <svg class="h-4 w-4 text-yellow-500 dark:text-white" width="51" height="51"
                            viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                fill="currentColor"></path>
                        </svg>
                        <svg class="h-4 w-4 text-yellow-500 dark:text-white" width="51" height="51"
                            viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                fill="currentColor"></path>
                        </svg>
                        <svg class="h-4 w-4 text-yellow-500 dark:text-white" width="51" height="51"
                            viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                fill="currentColor"></path>
                        </svg>
                        <svg class="h-4 w-4 text-yellow-500 dark:text-white" width="51" height="51"
                            viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                fill="currentColor"></path>
                        </svg>
                        <svg class="h-4 w-4 text-yellow-500 dark:text-gray-200" width="51" height="51"
                            viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M49.6867 20.0305C50.2889 19.3946 49.9878 18.1228 49.0846 18.1228L33.7306 15.8972C33.4296 15.8972 33.1285 15.8972 32.8275 15.2613L25.9032 0.317944C25.6021 0 25.3011 0 25 0V42.6046C25 42.6046 25.3011 42.6046 25.6021 42.6046L39.7518 49.9173C40.3539 50.2352 41.5581 49.5994 41.2571 48.6455L38.5476 32.4303C38.5476 32.1124 38.5476 31.7944 38.8486 31.4765L49.6867 20.0305Z"
                                fill="transparent"></path>
                            <path
                                d="M0.313299 20.0305C-0.288914 19.3946 0.0122427 18.1228 0.915411 18.1228L16.2694 15.8972C16.5704 15.8972 16.8715 15.8972 17.1725 15.2613L24.0968 0.317944C24.3979 0 24.6989 0 25 0V42.6046C25 42.6046 24.6989 42.6046 24.3979 42.6046L10.2482 49.9173C9.64609 50.2352 8.44187 49.5994 8.74292 48.6455L11.4524 32.4303C11.4524 32.1124 11.4524 31.7944 11.1514 31.4765L0.313299 20.0305Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>

                    <p class="mt-3 text-sm text-gray-800 dark:text-white">
                        <span class="font-bold">4.6</span> /5 - <span class="hidden">from 12k</span> Participant
                        Ratings
                    </p>

                    <div class="mt-5 hidden">
                        <!-- Star -->
                        <svg class="h-auto w-16 text-yellow-500 dark:text-white" width="80" height="27"
                            viewBox="0 0 80 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.558 9.74046H11.576V12.3752H17.9632C17.6438 16.0878 14.5301 17.7245 11.6159 17.7245C7.86341 17.7245 4.58995 14.7704 4.58995 10.6586C4.58995 6.62669 7.70373 3.51291 11.6159 3.51291C14.6498 3.51291 16.4063 5.42908 16.4063 5.42908L18.2426 3.51291C18.2426 3.51291 15.8474 0.878184 11.4961 0.878184C5.94724 0.838264 1.67578 5.50892 1.67578 10.5788C1.67578 15.5289 5.70772 20.3592 11.6558 20.3592C16.8854 20.3592 20.7177 16.8063 20.7177 11.4969C20.7177 10.3792 20.558 9.74046 20.558 9.74046Z"
                                fill="currentColor"></path>
                            <path
                                d="M27.8621 7.78442C24.1894 7.78442 21.5547 10.6587 21.5547 14.012C21.5547 17.4451 24.1096 20.3593 27.9419 20.3593C31.415 20.3593 34.2094 17.7645 34.2094 14.0918C34.1695 9.94011 30.896 7.78442 27.8621 7.78442ZM27.902 10.2994C29.6984 10.2994 31.415 11.7764 31.415 14.0918C31.415 16.4072 29.7383 17.8842 27.902 17.8842C25.906 17.8842 24.3491 16.2874 24.3491 14.0519C24.3092 11.8962 25.8661 10.2994 27.902 10.2994Z"
                                fill="currentColor"></path>
                            <path
                                d="M41.5964 7.78442C37.9238 7.78442 35.2891 10.6587 35.2891 14.012C35.2891 17.4451 37.844 20.3593 41.6763 20.3593C45.1493 20.3593 47.9438 17.7645 47.9438 14.0918C47.9038 9.94011 44.6304 7.78442 41.5964 7.78442ZM41.6364 10.2994C43.4328 10.2994 45.1493 11.7764 45.1493 14.0918C45.1493 16.4072 43.4727 17.8842 41.6364 17.8842C39.6404 17.8842 38.0835 16.2874 38.0835 14.0519C38.0436 11.8962 39.6004 10.2994 41.6364 10.2994Z"
                                fill="currentColor"></path>
                            <path
                                d="M55.0475 7.82434C51.6543 7.82434 49.0195 10.7784 49.0195 14.0918C49.0195 17.8443 52.0934 20.3992 54.9676 20.3992C56.764 20.3992 57.6822 19.7205 58.4407 18.8822V20.1198C58.4407 22.2754 57.1233 23.5928 55.1273 23.5928C53.2111 23.5928 52.2531 22.1557 51.8938 21.3573L49.4587 22.3553C50.297 24.1517 52.0135 26.0279 55.0874 26.0279C58.4407 26.0279 60.9956 23.9122 60.9956 19.481V8.18362H58.3608V9.26147C57.6423 8.38322 56.5245 7.82434 55.0475 7.82434ZM55.287 10.2994C56.9237 10.2994 58.6403 11.7365 58.6403 14.1317C58.6403 16.6068 56.9636 17.9241 55.2471 17.9241C53.4507 17.9241 51.774 16.4471 51.774 14.1716C51.8139 11.6966 53.5305 10.2994 55.287 10.2994Z"
                                fill="currentColor"></path>
                            <path
                                d="M72.8136 7.78442C69.62 7.78442 66.9453 10.2994 66.9453 14.0519C66.9453 18.004 69.9393 20.3593 73.093 20.3593C75.7278 20.3593 77.4044 18.8822 78.3625 17.6048L76.1669 16.1277C75.608 17.006 74.6499 17.8443 73.093 17.8443C71.3365 17.8443 70.5381 16.8862 70.0192 15.9281L78.4423 12.4152L78.0032 11.3772C77.1649 9.46107 75.2886 7.78442 72.8136 7.78442ZM72.8934 10.2196C74.0511 10.2196 74.8495 10.8184 75.2487 11.5768L69.6599 13.9321C69.3405 12.0958 71.097 10.2196 72.8934 10.2196Z"
                                fill="currentColor"></path>
                            <path d="M62.9531 19.9999H65.7076V1.47693H62.9531V19.9999Z" fill="currentColor"></path>
                        </svg>
                        <!-- End Star -->
                    </div>
                </div>
            </div>

        </section>


        <section class="max-w-8xl p-4 md:px-8   mx-auto h-auto">
            <div class="gap-4 grid grid-cols-1 md:gap-3 md:grid-cols-5 pb-4">

                @foreach ($images as $image)
                    <div class="group rounded-xl overflow-hidden cursor-pointer" href="#">
                        <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                            <img class="w-full h-full  absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
                                src="{{ $image->getUrl() }}" style="aspect-ratio: 16 / 7;" alt="Image Description">

                        </div>
                    </div>
                    {{-- <img src="{{ $image->getUrl() }}" alt="" style="aspect-ratio: 16 / 10;" class="rounded-2xl
            group-hover:scale-105 transition-transform duration-500 ease-in-out "> --}}
                @endforeach
            </div>
        </section>

        <section class="max-w-8xl md:px-8   mx-auto h-auto">

            <div
                class="dark:ring-gray-700 lg:flex lg:max-w-none lg:mx-0 max-w-2xl mx-auto ring-1 ring-gray-200 rounded-3xl">
                <div class="p-8 sm:p-10 lg:flex-auto space-y-4">
                    <h4 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-50 ">
                        {{ $institute->name }}
                    </h4>
                    <div class=" text-[16px]  text-gray-600 dark:text-gray-300 pb-5">
                        {!! $institute->about !!}
                    </div>
                    <div class=" flex items-center gap-x-4 py-6">
                        <h4 class="flex-none text-sm font-semibold leading-6 text-firefly-600 dark:text-firefly-400">
                            What’s included
                        </h4>
                        <div class="h-px flex-auto bg-gray-100 dark:bg-gray-600"></div>
                    </div>
                    <ul role="list"
                        class="mt-3 grid grid-cols-1 gap-2 text-sm leading-6 text-gray-600 dark:text-gray-300 sm:grid-cols-2">

                        {{-- @foreach ($institute->services as $service)
                            <li class="flex gap-x-3">
                                <button
                                    class="btn  h65 w-6 rounded-full bg-gray-400/40 p-0 font-medium text-firefly-800 hover:bg-firefly-200 hover:shadow-lg hover:shadow-firefly-200/50 focus:bg-firefly-200 focus:shadow-lg focus:shadow-firefly-200/50 active:bg-firefly-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:hover:shadow-navy-450/50 dark:focus:bg-navy-450 dark:focus:shadow-navy-450/50 dark:active:bg-navy-450/90  grid place-items-center ">
                                    <x-lucide-check class="h-5 w-5 text-current dark:text-white" />
                                </button>
                                <span class="text-gray-900 dark:text-gray-300">{{ $service }}</span>
                            </li>
                        @endforeach --}}
                    </ul>

                </div>

                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                    <div
                        class="rounded-2xl bg-gray-300/30 dark:bg-blue-900/10 h-full py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                        <div class="mx-auto max-w-xs px-8">
                            <p class="text-base font-bold text-gray-600 dark:text-gray-500">Pay once, own it
                                forever
                            </p>
                            <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                <span class="text-5xl font-bold tracking-tight text-gray-900 dark:text-gray-100">$
                                    {{ $institute->price }}</span>
                                <span
                                    class="text-sm font-semibold leading-6 tracking-wide text-gray-600 dark:text-gray-400">USD</span>
                            </p>


                            <div class="text-center w-auto py-5">
                                <x-button type="button" class=""
                                    data-hs-overlay="#hs-subscription-with-image">
                                    <span class="capitalize"> {{ __('Enroll for ') }}</span><span
                                        class="uppercase">{{ $institute->acronym }}</span>
                                </x-button>
                            </div>

                            <p class="mt-6 text-xs leading-5 text-gray-600 dark:text-gray-400">
                                Gain knowledge that lasts a lifetime. Invoices and receipts
                                available for easy company reimbursement.
                            </p>


                        </div>
                    </div>
                </div>

            </div>

        </section>


        <section class="h-auto max-w-8xl   md:px-8 mx-auto pt-8">
            <figure>
                <img class=" rounded-3xl" src="{{ asset('images/main/world-map.svg') }}" alt="Image Description">
            </figure>
        </section>



        {{-- <div class="">
            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal d-none"
                role="form">
                <input type="hidden" name="institute" value="{{ $institute->name }}">
                <input type="hidden" name="institute_id" value="{{ $institute->id }}">
                @csrf


                <!-- Invoice -->
                <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">

                    <div id="payment-invoice"
                        class="hs-overlay hs-overlay-open:translate-x-0 hidden translate-x-full fixed top-0 right-0 transition-all duration-300 transform h-full max-w-md w-full z-[60] bg-white border-r dark:bg-gray-800 dark:border-gray-700"
                        tabindex="-1">
                        <div style="background-image: url('{{ asset('images/main/abstract-bg-1.svg') }}');  background-repeat: no-repeat;
              background-size: auto 300px; "
                            class="relative overflow-hidden min-h-[8rem] text-center  bg-no-repeat bg-center">
                            <!-- Close Button -->
                            <div class="absolute top-2 right-2">
                                <button type="button"
                                    class="py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-xs dark:bg-firefly-900 dark:hover:bg-firefly-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                    data-hs-overlay="#payment-invoice">
                                    Close
                                </button>
                            </div>
                            <!-- End Close Button -->

                            <!-- SVG Background Element -->
                            <figure class="absolute inset-x-0 bottom-0">
                                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px"
                                    y="0px" viewBox="0 0 1920 100.1">
                                    <path fill="currentColor" class="fill-white dark:fill-gray-800"
                                        d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                                </svg>
                            </figure>
                            <!-- End SVG Background Element -->
                        </div>

                        <div class="relative z-10 -mt-12">
                            <!-- Icon -->
                            <span
                                class="mx-auto flex justify-center items-center w-[62px] h-[62px] rounded-full border border-gray-200 bg-white text-gray-700 shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                            <!-- End Icon -->
                        </div>

                        <!-- Body -->
                        <div class="p-4 sm:p-5 overflow-y-auto space-y-4">
                            <div class="text-center">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                    Invoice For <span class="text-gradient1">
                                        @if ($institute->acronym == 'costrad')
                                            (<span>{{ __('COSTrAD') }}</span>)
                                        @else
                                            <span class="uppercase">({{ $institute->acronym }}) </span>
                                        @endif
                                    </span>
                                </h3>
                                <p class="text-sm text-gray-500">
                                    Invoice #3682303
                                </p>
                            </div>

                            <!-- Grid -->
                            <div class="pt-5 grid grid-cols-3 gap-3">
                                <div>
                                    <span class="block text-xs uppercase text-gray-500">Total Amount:</span>
                                    <span
                                        class=" text-[11px] font-medium text-gray-800 dark:text-gray-200 inline-block">${{ $institute->price }}
                                        /{{ __('GHS ') }} {{ $institute->local_currency }}</span>
                                </div>
                                <!-- End Col -->

                                <div>
                                    <span class="block text-xs uppercase text-gray-500">Invoice Date:</span>
                                    <span
                                        class=" text-[11px] font-medium text-gray-800 dark:text-gray-200 inline-block">{{ now()->format('M d, Y') }}</span>
                                </div>
                                <!-- End Col -->

                                <div>
                                    <span class="block text-xs uppercase text-gray-500">Payment methods:</span>
                                    <div class=" pt-2">
                                        <img src="{{ asset('images/main/cards.png') }}" alt="Donate with Credit Card"
                                            class="w-auto rounded-md">
                                    </div>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Grid -->

                            <div>
                                <h4 class="text-xs font-semibold uppercase text-gray-800 dark:text-gray-200">Summary
                                </h4>

                                <ul class="mt-3 flex flex-col">
                                    <li
                                        class="inline-flex items-center gap-x-4 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-gray-700 dark:text-gray-200">
                                        <div class="flex gap-x-2 items-center justify-between w-full ">
                                            <span class="capitalize ">{{ $institute->name }}
                                                <span class="uppercase">({{ $institute->acronym }})</span> </span>
                                            <span>GHS{{ $institute->local_currency }}</span>
                                        </div>
                                    </li>

                                    <li
                                        class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-semibold bg-gray-50 border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-firefly-800 dark:border-gray-700 dark:text-gray-200">
                                        <div class="flex gap-x-2 items-center justify-between w-full ">
                                            <span>Total Amount Due</span>
                                            <span>GHS {{ $institute->local_currency }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Button -->
                            <div class="mt-5 flex justify-between gap-x-2">
                                <a
                                    class="py-1 px-3 w-full inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-firefly-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </svg>
                                    <span>Invoice PDF</span>
                                </a>
                                <button
                                    class=" flex justify-center items-center w-full rounded-md bg-firefly-600 px-3 py-1 text-center text-sm font-semibold text-white shadow-sm hover:bg-firefly-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-firefly-600 dark:bg-firefly-800 dark:hover:bg-firefly-700 dark:focus-visible:outline-firefly-800"
                                    href="#">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                        <path
                                            d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    </svg>
                                    <span class="px-2"> Initiate Payment</span>
                                </button>
                            </div>
                            <!-- End Buttons -->

                            <div class="p-3 text-[12px] space-y-4 border border-gray-500/20 rounded-xl">
                                <div class=" flex gap-2 ">
                                    <span class="mx-auto text-center">
                                        <svg class="w-8 h-8" viewBox="0 0 35 35" fill="none" class="mx-auto">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.375 9.7155C4.375 7.83237 5.58001 6.1605 7.36651 5.56501L16.1165 2.64834C17.0145 2.34899 17.9855 2.34899 18.8835 2.64834L27.6335 5.56501C29.42 6.1605 30.625 7.83237 30.625 9.7155V17.4997C30.625 25.5235 22.5164 30.3939 19.046 32.111C18.0651 32.5962 16.9349 32.5962 15.954 32.111C12.4836 30.3939 4.375 25.5235 4.375 17.4997V9.7155Z"
                                                fill="#27B67A">
                                            </path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M22.9065 13.5521C23.476 14.1217 23.476 15.045 22.9065 15.6145L17.8982 20.6229C16.873 21.6481 15.211 21.6481 14.1858 20.6229L12.0941 18.5312C11.5246 17.9617 11.5246 17.0383 12.0941 16.4688C12.6636 15.8993 13.587 15.8993 14.1565 16.4688L16.042 18.3543L20.8441 13.5521C21.4136 12.9826 22.337 12.9826 22.9065 13.5521Z"
                                                fill="white">
                                            </path>
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-left">
                                            We do not store any credit card information on our server. 100% secure
                                            payments are processed by PayStack and site is secured by SSL encryption. If
                                            you
                                            have any questions, please contact us at <span>
                                                <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium"
                                                    href="mailto:info@costrad.org">info@costrad.org</a> or call at <a
                                                    class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium"
                                                    href="tel:+233208127797">+233 20 812 7797 </a></span>
                                        </p>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- End Body -->
                    </div>
                </div>
                <!-- End Invoice -->
            </form>
        </div> --}}
    </div>

    <div id="hs-subscription-with-image"
        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-950">
                <div class="absolute bg-gray-900/50 right-2 rounded-full top-2 z-[10]">
                    <button type="button"
                        class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md  text-white hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                        data-hs-overlay="#hs-subscription-with-image">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" width="8" height="8" viewBox="0 0 8 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </div>

                <div class="aspect-w-16 aspect-h-8 relative">
                    <div class="absolute bottom-0 left-0 right-0 top-0 grid place-items-center">
                        <img class="inline-block h-[6.975rem] w-[6.975rem] rounded-full ring-2 ring-white dark:ring-gray-800"
                            src="{{ $institute->institute_logo }}" alt="{{ $institute->name }}">
                    </div>
                    <img class="w-full object-cover rounded-t-xl h-52" src="{{ $institute->featured_image }}"
                        alt="{{ $institute->name }}">
                </div>

                <form method="POST" action="#" accept-charset="UTF-8" class="form-horizontal d-none"
                    role="form">
                    <input type="hidden" name="institute" value="{{ $institute->acronym }}">
                    <input type="hidden" name="institute_id" value="{{ $institute->id }}">
                    @csrf

                    <div class="p-4 sm:p-8 text-center overflow-y-auto space-y-4">
                        <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-gray-200 uppercase">
                            <span class="px-2">{{ $institute->acronym }} {{ now()->format('Y') }}</span> 🎉
                        </h3>
                        <div>
                            <fieldset class="grid grid-cols-2 gap-4">

                                <div>
                                    <input type="radio" name="paymentoption" value="fullPayment" id="fullPayment"
                                        class="peer hidden [&:checked_+_label_svg]:block" checked />

                                    <label for="fullPayment"
                                        class="block cursor-pointer rounded-lg border border-gray-200 dark:border-gray-700/50 bg-white dark:bg-gray-950 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500">
                                        <div class="flex items-center justify-between">
                                            <p class="text-gray-700 dark:text-white text-lg">Full Payment</p>

                                            <svg class="hidden h-5 w-5 text-blue-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <p class="mt-1 text-left text-firefly-500">{{ '$' . $institute->price }}</p>
                                    </label>
                                </div>

                                <div>
                                    <input type="radio" name="paymentoption" value="partPayment" id="partPayment"
                                        class="peer hidden [&:checked_+_label_svg]:block" />

                                    <label for="partPayment"
                                        class="block cursor-pointer rounded-lg border border-gray-200 dark:border-gray-700/50 bg-white dark:bg-gray-950 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500">
                                        <div class="flex items-center justify-between">
                                            <p class="text-gray-700 dark:text-white text-lg">Part Payment</p>

                                            <svg class="hidden h-5 w-5 text-blue-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>

                                        <p class="mt-1 text-firefly-500 text-left">{{ __('Pay in 3 Installments.') }}
                                        </p>
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                __('Terms of Service') .
                                                '</a>',
                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                        <p class="text-gray-500 text-sm text-left">
                            {!! __(
                                'By clicking enroll, you agree to abide by our <a href="/terms" class="capitalize text-firefly-500 font-bold" target="_blank">terms and conditions</a>. An invoice would be made available to you in <span class=" text-yellow-600 font-bold">Ghana Cedis</span> equivalent. Thank you.',
                            ) !!}
                        </p>


                        <div class="mt-6 grid grid-cols-1 gap-3">
                            <x-button type="submit" class="w-full">
                                Proceed To Payment
                            </x-button>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
