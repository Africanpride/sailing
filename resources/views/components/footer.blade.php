<footer class="bg-gray-100 dark:bg-firefly-900  border-t border-gray-600/10 md:px-4">
    <div class="flex flex-col md:flex-row md:justify-between items-center space-y-4 px-4">
        <div class="py-4">
            <x-branding />
        </div>

        <div class="">
            <ul
                class="flex flex-wrap text-center md:text-right items-center uppercase text-[9px] md:text-xs text-gray-700 sm:mb-0 dark:text-gray-400 space-x-4">
                <li>
                    <a href="{{ url('contact') }}">Contact</a>
                </li>
                <li>
                    <a href="{{ url('about') }}">About </a>
                </li>
                <li>
                    <a href="{{ url('help') }}">Help</a>
                </li>

                <li>
                    <a href="{{ url('privacy') }}">Privacy</a>
                </li>
                <li>
                    <a href="{{ url('dmca') }}">DMCA</a>
                </li>
                <li>
                    <a href="{{ url('terms') }}">Terms</a>
                </li>
                {{--
                <li>
                    <a href=" {{ url('accessibility') }}">Accessibility</a>
                </li> --}}
                <li>
                    <p id="open_preferences_center" class="cursor-pointer">Cookies</p>
                </li>

            </ul>
        </div>

    </div>

    <hr class="my-6 border-gray-300 md:my-10  dark:border-gray-800 border-dashed " />

    <div class="flex flex-col items-center sm:flex-row sm:justify-between space-y-4">
        <p class=" text-gray-500 dark:text-gray-300 text-[10px] md:text-xs">
            <span class="block text-md  text-gray-700 sm:text-center dark:text-gray-400 ">&copy;
                &MediumSpace;<a href="https://www.costrad.org/"
                    class="font-bold dark:text-white ">{{ config('app.name') }}&MediumSpace;&trade;</a> All Rights
                Reserved.
            </span>
        </p>

        <div
            class="flex items-center relative z-10 before:hidden lg:before:block before:w-px before:h-4 before:bg-gray-300 dark:before:bg-gray-700">
            <div class="lg:ms-4 flex">


                <a class="inline-flex flex-shrink-0 justify-center items-center h-9 w-9 font-medium rounded-full text-gray-800 hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="https://github.com/htmlstreamofficial/preline" target="_blank">
                    <x-lucide-youtube class="h-6 w-6 text-red-700" />
                </a>
                <a class="inline-flex flex-shrink-0 justify-center items-center h-9 w-9 font-medium rounded-full text-gray-800 hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="https://twitter.com/MyCostrad" target="_blank">
                    <svg class="flex-shrink-0 w-3.5 h-3.5" width="48" height="50" viewBox="0 0 48 50"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M28.5665 20.7714L46.4356 0H42.2012L26.6855 18.0355L14.2931 0H0L18.7397 27.2728L0 49.0548H4.23464L20.6196 30.0087L33.7069 49.0548H48L28.5655 20.7714H28.5665ZM22.7666 27.5131L5.76044 3.18778H12.2646L42.2032 46.012H35.699L22.7666 27.5142V27.5131Z"
                            fill="currentColor"></path>
                    </svg>
                </a>
            </div>

            <x-dark-switch />
        </div>
    </div>
</footer>
