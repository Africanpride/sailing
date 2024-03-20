  <!-- ========== HEADER ========== -->
  <header id="front-header"
      class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-30 w-full bg-white border-b border-gray-200 text-sm py-3 md:py-0 dark:bg-firefly-900 dark:border-firefly-800/20 h-auto">

      <nav class=" max-w-[85rem] mx-auto px-4 md:px-6 lg:px-8 py-[10px] relative flex items-center justify-between  w-full"
          aria-label="Global">
          <x-branding />

          <div id="navbar-collapse-with-animation"
              class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow lg:block">
              <div
                  class="grid grid-cols-2 gap-2 gap-y-2 mt-5 md:flex md:flex-row md:items-center md:justify-end md:gap-y-0 md:gap-x-6 md:mt-0 md:ps-4">


                  <x-menu url="home">
                      Home
                  </x-menu>
                  <x-menu url='about'>
                      About
                  </x-menu>
                  @php
                      $costrad = App\Models\Institute::find(5);
                      $url = 'institutes.show';
                      $slug = [$costrad->slug];
                      //   dd($url);
                  @endphp

                  <x-menu :$url :$slug>
                      <span class="normal-case">COSTrAD</span>
                  </x-menu>

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
                              href="https://www.youtube.com" target="_blank">
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

          <div class="lg:hidden bg-gray-300/50 dark:bg-gray-950 rounded-full "  data-hs-overlay="#mobile-menu">
            <button class="navbar-burger flex items-center text-firefly-600 dark:text-white p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">

                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
      </nav>




  </header>

