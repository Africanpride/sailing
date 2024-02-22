<x-front-layout>

    <div>
        <div class="pb-5">
            <livewire:article-display :publication="$publication" />
        </div>


        <div class="max-w-4xl mx-auto px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8">
            <ul class="space-y-4">


                @foreach ($latestPublication as $latest)
                    <li>
                        <!-- component -->
                        <div
                            class="group bg-gray-200/50 dark:bg-gray-950 p-2 max-w-3xl sm:w-full sm:p-3 h-auto sm:h-48 rounded-2xl shadow-md flex flex-col sm:flex-row gap-2 select-none">
                            <a href="{{ route('publications.show', $latest) }}"
                                class="h-auto w-auto aspect-video rounded-md object-cover">
                                <img alt="{{ $latest->title }}"
                                    src="{{ $latest->getFirstMediaUrl('featured_image') ? $latest->getFirstMediaUrl('featured_image') : $latest->publication_image }}"
                                    class="h-auto w-auto aspect-video rounded-md object-cover  transition duration-500 group-hover:scale-105" />
                            </a>
                            <div class="flex flex-col justify-between p-3 sm:flex-1 space-y-2">
                                <a href="{{ route('publications.show', $latest) }}">

                                    <h1 class="text-lg sm:text-md font-bold dark:text-white  text-gray-800">
                                        {{ $latest->title }}
                                    </h1>
                                </a>
                                <div class="text-gray-500 dark:text-white text-sm line-clamp-4">

                                    {!! $latest->body !!}
                                </div>

                                {{-- <div>
                                    <a href="{{ route('publications.show', $latest->slug) }}"
                                        class="bg-firefly-700 w-auto px-2 text-white text-sm uppercase">Read
                                        More</a>
                                </div> --}}
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>

        </div>


        <div class="py-12">
            <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                <div class="mb-12 space-y-2 text-center">
                    <h2 class="text-3xl font-bold text-gray-800 md:text-4xl dark:text-white">Sharing is Caring</h2>
                    <p class="text-gray-600 dark:text-gray-300 lg:mx-auto lg:w-6/12">
                        Quam hic dolore cumque voluptate rerum beatae et quae, tempore sunt, debitis dolorum
                        officia aliquid explicabo? Excepturi, voluptate?
                    </p>
                </div>

                <div class="lg:w-3/4 xl:w-2/4 lg:mx-auto">
                    <div
                        class="group relative -mx-4 sm:-mx-8 p-6 sm:p-8 rounded-3xl bg-white dark:bg-transparent border border-transparent hover:border-gray-100 dark:shadow-none dark:hover:border-gray-700 dark:hover:bg-gray-800 shadow-2xl shadow-transparent hover:shadow-gray-600/10 sm:gap-8 sm:flex transition duration-300 hover:z-10">
                        <div
                            class="sm:w-2/6 rounded-3xl overflow-hidden transition-all duration-500 group-hover:rounded-xl">
                            <img src="https://images.unsplash.com/photo-1661749711934-492cd19a25c3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1674&q=80"
                                alt="art cover" loading="lazy" width="1000" height="667"
                                class="h-56 sm:h-full w-full object-cover object-top transition duration-500 group-hover:scale-105" />
                        </div>

                        <div class="sm:p-2 sm:pl-0 sm:w-4/6">
                            <span
                                class="mt-4 mb-2 inline-block font-medium text-gray-400 dark:text-gray-500 sm:mt-0">Jul
                                27 2022
                            </span>
                            <h3 class="text-2xl font-semibold text-gray-800 dark:text-white">
                                Provident de illo eveniet commodi fuga fugiat laboriosam expedita.
                            </h3>
                            <p class="my-6 text-gray-600 dark:text-gray-300">
                                Laudantium in, voluptates ex placeat quo harum aliquam totam,
                                doloribus eum impedit atque...
                            </p>

                            <div class="flex gap-4">
                                <a href="#"
                                    class="px-3 py-1 rounded-full border border-gray-100 text-sm font-medium text-primary transition duration-300 hover:border-transparent hover:bg-primary hover:text-white dark:border-gray-700 dark:text-gray-300">
                                    Tailwindcss
                                </a>
                                <a href="#"
                                    class="px-3 py-1 rounded-full border border-gray-100 text-sm font-medium text-primary transition duration-300 hover:border-transparent hover:bg-primary hover:text-white dark:border-gray-700 dark:text-gray-300">
                                    VueJS
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</x-front-layout>
