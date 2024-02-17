<x-front-layout>

    <section class="lg:pt-[120px] overflow-hidden p-6 relative">
        <div class="mx-auto mb-[60px] max-w-[920px] text-center lg:mb-20 space-y-3">
            <x-top-title>
                {{ __('COSTrAD: News, Articles & publications') }}
                <x-slot name="icon">
                    <x-lucide-trending-up class="dark:text-white  w-5 h-5 " />
                </x-slot>

                <x-slot name="paragraph">
                    The College of Sustainable Transformation and Development (<a href="{{ url('costrad') }}"
                        class=" bg-clip-text bg-gradient-to-l from-firefly-600 to-violet-500 text-transparent dark:from-firefly-400 dark:to-violet-400 font-bold">COSTrAD</a>)
                    is an initiative of the Logos-Rhema Foundation for Leadership Resource Development, a
                    Non-Governmental Foundation registered in Ghana.
                </x-slot>

            </x-top-title>
        </div>
    </section>

    <div class="absolute bottom-0 right-0 z-[-1] opacity-10">
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
    <!-- vision -->


    @if ($publications->count() > 0)
        <section class="mx-auto max-w-8xl px-4">
            <div class="flex flex-col md:flex-row gap-4 md:gap-3">
                <div class="w-full md:w-2/3 ">
                    <a class="relative rounded-3xl block" style="height: 24em;"
                        href="{{ route('publications.show', [$firstLatest]) }}">

                        <div class="absolute inset-0 left-0 h-full bg-black z-20 opacity-30 rounded-xl "></div>

                        <div class="absolute left-0 bottom-0 w-full h-full z-10 rounded-xl"
                            style="background-image: linear-gradient(180deg,transparent,rgba (0,0,0,.7));"></div>
                        <img src="{{ $firstLatest->getFirstMediaUrl('featured_image') ? $firstLatest->getFirstMediaUrl('featured_image') : $firstLatest->featured_image }}"
                            class="absolute left-0 top-0 w-full h-full  z-0 object-cover rounded-xl">
                        <div class="p-4 absolute bottom-0 left-0 z-20">
                            <span
                                class="px-4 py-1 bg-firefly-800  text-gray-200 inline-flex items-center justify-center mb-2">{{ $firstLatest->category->title }}
                            </span>
                            <h2
                                class="md:text-3xl font-thin dark:text-white   text-white font-['anton'] leading-tight md:max-w-xl ">
                                {{ $firstLatest->title }}
                            </h2>
                            <div class="flex mt-3">
                                <img src="{{ $firstLatest->author?->profile_photo_url }}"
                                    class="h-10 w-10 rounded-full mr-2 object-cover">
                                <div>
                                    <p class="font-semibold text-gray-200 text-sm">
                                        {{ $firstLatest->author->full_name }}
                                    </p>
                                    <p class="font-semibold text-gray-400 text-xs">
                                        {{ $firstLatest->updated_at->format('d-M, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="w-full md:w-1/3 ">
                    <a class="relative rounded-3xl block" style="height: 24em;"
                        href="{{ route('publications.show', [$secondLatest]) }}">
                        <div class="absolute inset-0 left-0 h-full bg-black z-20 opacity-30 rounded-xl"></div>
                        <div class="absolute left-0 bottom-0 w-full h-full z-10 rounded-xl"
                            style="background-image: linear-gradient(180deg,transparent,rgba (0,0,0,.7));"></div>
                        <img src="{{ $secondLatest->getFirstMediaUrl('featured_image') ? $secondLatest->getFirstMediaUrl('featured_image') : $secondLatest->featured_image }}"
                            class="absolute left-0 top-0 w-full h-full  z-0 object-cover rounded-xl">
                        <div class="p-4 absolute bottom-0 left-0 z-20">
                            <span
                                class="px-4 py-1 bg-firefly-800  text-gray-200 inline-flex items-center justify-center mb-2">{{ $secondLatest->category->title }}
                            </span>
                            <h2 class="md:text-2xl font-thin dark:text-white  text-white font-['anton'] leading-tight">
                                {{ $secondLatest->title }}
                            </h2>
                            <div class="flex mt-3">
                                <img src="{{ $secondLatest->author->profile_photo_url }}"
                                    class="h-10 w-10 rounded-full mr-2 object-cover">
                                <div>
                                    <p class="font-semibold text-gray-200 text-sm">
                                        {{ $secondLatest->author->full_name }}
                                    </p>
                                    <p class="font-semibold text-gray-400 text-xs">
                                        {{ $secondLatest->updated_at->format('d-M, Y') }} </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    @endif
    <section class=" overflow-hidden p-4 relative z-20 ">



        <div class="max-w-8xl mx-auto space-y-4 ">


            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pb-4">

                @foreach ($news as $article)
                    <div class=" mx-auto bg-white dark:bg-gray-950 rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                        <div class="md:flex relative">
                            <div class="md:shrink-0">
                                <img class="h-48 w-full object-cover md:h-full md:w-48"src="{{ $article->getFirstMediaUrl('featured_image') ? $article->getFirstMediaUrl('featured_image') : $article->featured_image }}"
                                    alt="{{ $article->title }}">
                            </div>
                            <div class="p-8">
                                <a href="{{ route('publications.show', $article) }}" class="uppercase tracking-wide text-sm text-firefly-500 font-semibold">
                                    {{ $article->title }}
                                </a>
                                {{-- <a href="#"
                                    class="block mt-1 text-lg leading-tight font-medium dark:text-white text-black hover:underline">
                                    Incredible accommodation for your team
                                </a> --}}
                                <p class="mt-2 text-slate-500 line-clamp-3 dark:text-white ">
                                    {{ $article->overview }}
                                </p>
                            </div>
                            <div
                            class="hidden absolute right-0 bottom-0 md:h-full [writing-mode:_vertical-lr] bg-firefly-500/20 dark:bg-gray-950  h-full p-1 md:flex flex-col justify-between items-center rotate-180">
                            <time datetime="{{ $article->created_at }}"
                                class="flex items-center justify-between gap-4 text-[10px] font-bold relative
                        whitespace-nowrap py-2 uppercase text-gray-900 dark:text-white">
                                <span class=" text-gray-600/70">{{ __('Published ') }}</span>
                                <span class="w-px flex-1 bg-gray-900/50 dark:bg-white/10"></span>
                                <span>{{ $article->created_at->format('M d, Y') }}</span>
                            </time>
                        </div>
                        </div>
                    </div>
                @endforeach

            </div>




            <div class="">{{ $news->links() }}</div>

        </div>

    </section>


    <x-subscribe />
</x-front-layout>
