<x-front-layout>

    <div class="p-4">

        <ul class="grid md:grid-cols-4 gap-4">
            @foreach ($institutes as $institute)
                <li>
                    <div class="w-full ">
                        <img src="{{ $institute->featured_image }}" alt=""
                            class="rounded-t-2xl object-cover  shadow-2xl h-48 w-full ">
                        <div class="bg-white shadow-2xl rounded-b-3xl space-y-4">


                            <div class="w-5/6 m-auto h-[6rem] min-h-[6rem] space-y-4">
                                <h2 class="text-center text-gray-800 text-[10px] font-bold pt-3 uppercase px-4 ">
                                    {{ $institute->name }}
                                </h2>
                                <p class="text-center text-[12px] text-gray-500  line-clamp-2">{!! $institute->overview !!}
                                </p>
                            </div>
                            <div class="grid grid-cols-4 w-72 lg:w-5/6 m-auto bg-indigo-50 mt-4 p-3 md:p-3 rounded-2xl">
                                <div class="col-span-1 ">
                                    <img class="w-15 md:w-15 md:h-15" src="{{ $institute->institute_logo }}"
                                        alt="music icon">
                                </div>
                                <div class="col-span-3 pt-1 p-3">
                                    <p class="text-gray-800 font-bold lg:text-sm">
                                        {{ $institute->editions()->latest()->first()->title }}
                                    </p>
                                    <p class="text-gray-500 text-sm">
                                        {{ $institute->editions()->latest()->first()->duration }}</p>
                                </div>
                                {{-- <div class="pt-2">
                          <a href="https://google.com" class="text-indigo-700 underline hover:no-underline  text-sm hover:text-indigo-500 font-bold" target="_blank">Change</a>
                        </div> --}}
                            </div>
                            <div class="text-center">
                                <a href="{{ route('institutes.show', [$institute]) }}">
                                    <x-button classs="lg:text-sm text-lg font-bold">Register for
                                        {{ $institute->editions()->latest()->first()->title }}</x-button>
                                </a>
                            </div>
                            {{-- <div
                                class="bg-blue-700 w-72 lg:w-5/6 m-auto mt-3 p-2 hover:bg-indigo-500 rounded-2xl  text-white text-center shadow-xl shadow-bg-blue-700">
                            </div> --}}
                            <div class="text-center m-auto mt-6 w-full h-16">
                                <a href="{{ route('institutes.show', [$institute]) }}"
                                    class="text-gray-500 font-bold lg:text-sm hover:text-gray-900
                                uppercase ">More About
                                    {{ $institute->editions()->latest()->first()->acronym }}</a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>



    </div>

</x-front-layout>
