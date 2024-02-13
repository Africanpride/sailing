  <!-- ========== HEADER ========== -->
  <header
      class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-3 sm:py-0 dark:bg-firefly-900 dark:border-gray-700 h-auto">

      <nav class="lg:px-8 max-w-[85rem] mx-auto px-4 py-[16px] relative sm:flex sm:items-center sm:justify-between sm:px-6 w-full"
          aria-label="Global">
          <div class="flex items-center justify-between">
              <x-branding />
              <div class="sm:hidden">
                  <button type="button"
                      class="hs-collapse-toggle w-9 h-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-gray-700 dark:hover:bg-gray-700"
                      data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation"
                      aria-label="Toggle navigation">
                      <svg class="hs-collapse-open:hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                          width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="3" x2="21" y1="6" y2="6" />
                          <line x1="3" x2="21" y1="12" y2="12" />
                          <line x1="3" x2="21" y1="18" y2="18" />
                      </svg>
                      <svg class="hs-collapse-open:block hidden flex-shrink-0 w-4 h-4"
                          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round">
                          <path d="M18 6 6 18" />
                          <path d="m6 6 12 12" />
                      </svg>
                  </button>
              </div>
          </div>
          <div id="navbar-collapse-with-animation"
              class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
              <div
                  class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-6 sm:mt-0 sm:ps-4">
                  <x-menu url="home">
                      Home
                  </x-menu>
                  <x-menu url='about'>
                      About
                  </x-menu>
                  @php
                      $costrad = App\Models\Institute::find(5);
                      $url = route('institutes.show', $costrad);
                    //   dd($url);
                  @endphp

                  <a href="{{ route('institutes.show', $costrad) }}"

                          class =
                              'normal-case font-bold dark:text-white hover:text-yellow-700
                              {{ (url()->current() == $url
                                  ? ' text-yellow-500 dark:text-yellow-500 hover:dark:text-firefly-400'
                                  : 'hover:dark:text-firefly-400') }}'  >
                      {{ __('COSTrAD')}}
                  </a>
                  <x-institutes-list />
                  <x-menu url="contact">
                      Contact
                  </x-menu>
                  <x-menu url="publications.index">
                      Publications
                  </x-menu>







                  <div class="text-firefly-700 dark:text-firefly-200 flex justify-start items-center gap-2 py-4">

                      <x-menu url="donate">
                          <span
                              class=" inline bg-firefly-50 border border-firefly-300 text-firefly-600 leading-4 uppercase rounded-full py-1 px-4 dark:bg-firefly-900/[.75] dark:border-firefly-700 dark:text-firefly-500">{{ __('Donate') }}
                          </span>
                      </x-menu>
                  </div>

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

                  <div
                      class="flex items-center relative z-10 before:hidden lg:before:block before:w-px before:h-4 before:bg-gray-300 dark:before:bg-gray-700">
                      <div class="lg:ms-4 flex">

                          <x-front-auth />
                      </div>
                  </div>




              </div>
          </div>
      </nav>
  </header>
