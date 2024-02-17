  <!-- ========== HEADER ========== -->
  <header
      class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-3 md:py-0 dark:bg-firefly-900 dark:border-gray-700 h-auto">

      <nav class="lg:px-8 max-w-[85rem] mx-auto px-4 py-[16px] relative md:flex md:items-center md:justify-between md:px-6 w-full"
          aria-label="Global">
          <div class="flex items-center justify-between">
              <x-branding />
              <div class="flex md:hidden" data-hs-overlay="#mobile-menu">
                <button class="group">
                    <div
                        class=" flex overflow-hidden items-center justify-center rounded-full w-[45px] h-[45px] transform transition-all bg-gray-950 ring-0 ring-gray-300 hover:ring-8 group-focus:ring-4 ring-opacity-30 duration-200 shadow-md">
                        <div
                            class="flex flex-col justify-between w-[15px] h-[15px] transform transition-all duration-500 origin-center overflow-hidden">
                            <div
                                class="bg-white h-[2px] w-5 transform transition-all duration-500 group-focus:-rotate-45 -translate-x-1">
                            </div>
                            <div class="bg-white h-[2px] w-3 rounded transform transition-all duration-500 "></div>
                            <div
                                class="bg-white h-[2px] w-5 transform transition-all duration-500 group-focus:rotate-45 -translate-x-1">
                            </div>
                        </div>
                    </div>
                </button>
              </div>

          </div>

          <div id="navbar-collapse-with-animation"
              class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
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
      </nav>



  </header>
