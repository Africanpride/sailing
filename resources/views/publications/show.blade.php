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
                            class="bg-gray-100/50 dark:bg-gray-950 p-2 max-w-4xl sm:w-full sm:p-3 h-auto sm:h-48 rounded-2xl shadow-md flex flex-col sm:flex-row gap-4 select-none">
                            <a href="{{ route('publications.show', $latest) }}"
                                class="h-auto w-auto aspect-video rounded-md object-cover">
                                <img alt="{{ $latest->title }}"
                                    src="{{ $latest->getFirstMediaUrl('featured_image') ? $latest->getFirstMediaUrl('featured_image') : $latest->publication_image }}"
                                    class="h-auto w-auto aspect-video rounded-md object-cover" />
                            </a>
                            <div class="flex flex-col justify-between p-1 sm:flex-1 space-y-2">
                                <a href="{{ route('publications.show', $latest) }}">

                                    <h1 class="text-lg sm:text-md font-bold dark:text-white  text-gray-800">
                                        {{ $latest->title }}
                                    </h1>
                                </a>
                                <div class="text-gray-500 dark:text-white text-[11px] line-clamp-4">
                                    {!! $latest->body !!}
                                </div>

                                <div>
                                    <a href="{{ route('publications.show', $latest->slug) }}"
                                        class="bg-firefly-700 w-auto px-2 text-white text-sm uppercase">Read
                                        More</a>
                                </div>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>

        </div>

    </div>
</x-front-layout>
