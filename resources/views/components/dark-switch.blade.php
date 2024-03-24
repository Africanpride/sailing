                      <!-- Dark Mode -->
                      {{-- <button type="button"
                          class="hs-dark-mode-active:hidden block hs-dark-mode rounded-full dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 relative"
                          data-hs-theme-click-value="dark">
                          <span
                              class="group inline-flex flex-shrink-0 justify-center items-center h-9 w-9 font-medium rounded-full text-gray-800 hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-800">
                              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                              </svg>
                          </span>
                      </button>
                      <button type="button"
                          class="hs-dark-mode-active:block hidden hs-dark-mode rounded-full dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                          data-hs-theme-click-value="light">
                          <span
                              class="group inline-flex flex-shrink-0 justify-center items-center h-9 w-9 font-medium rounded-full text-gray-800 hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-800">
                              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <circle cx="12" cy="12" r="4"></circle>
                                  <path d="M12 8a2 2 0 1 0 4 4"></path>
                                  <path d="M12 2v2"></path>
                                  <path d="M12 20v2"></path>
                                  <path d="m4.93 4.93 1.41 1.41"></path>
                                  <path d="m17.66 17.66 1.41 1.41"></path>
                                  <path d="M2 12h2"></path>
                                  <path d="M20 12h2"></path>
                                  <path d="m6.34 17.66-1.41 1.41"></path>
                                  <path d="m19.07 4.93-1.41 1.41"></path>
                              </svg>
                          </span>
                      </button> --}}
                      <!-- End Dark Mode -->
                      <button
                      x-data="{
                          darkMode: $persist(JSON.parse(localStorage.getItem('dark_mode')) || false),
                          toggleDarkMode(){
                              document.documentElement.classList.toggle('dark');
                              this.darkMode = document.documentElement.classList.contains('dark');
                              localStorage.setItem('dark_mode', JSON.stringify(this.darkMode));
                              if (this.darkMode) {
                                  new Audio('/audio/dark.mp3').play();
                              } else {
                                  new Audio('/audio/light.mp3').play();
                              }
                          }
                      }"
                      @click="toggleDarkMode()"
                      x-init="darkMode = document.documentElement.classList.contains('dark')"
                      class=""
                  >
                      <span
                          class="group inline-flex flex-shrink-0 justify-center items-center h-9 w-9 font-medium rounded-full text-gray-800 hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-800"
                      >
                          <x-lucide-sun-moon class="h-5 w-5 dark:text-yellow-500 transition duration-500" />
                      </span>
                  </button>
                  