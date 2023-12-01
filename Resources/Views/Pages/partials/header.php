<header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5 text-xl sm:text-2xl font-bold tracking-tight flex">
              <span class="bg-gradient-to-r from-blue-500 via-blue-700 to-black bg-clip-text text-transparent">Modern</span>
              <span>Gym</span>
            </a>
          </div>
          <div class="flex lg:hidden">
            <button type="button" @click="mobileMenuOpen = !mobileMenuOpen"
              class="-m-2.5 inline-flex items-center justify-center rounded-xl p-2.5 text-gray-700">
              <span class="sr-only">Open main menu</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>
          </div>
          <div class="hidden gap-x-6 lg:flex lg:flex-1 lg:justify-end">
            <a href="/account/register"
              class="flex text-md gap-x-2 font-semibold leading-6 text-gray-900 hover:text-blue-600 rounded-2xl <?php echo ($_SERVER['REQUEST_URI'] == '/account/register') ? 'bg-blue-200 text-blue-600' : 'bg-gray-200'; ?> px-4 py-3 hover:bg-blue-200 transition-colors ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>

              <span>Sign Up</span>
            </a>
            <a href="/account/login"
              class="flex text-md gap-x-2 font-semibold leading-6 text-gray-900 hover:text-blue-600 rounded-2xl <?php echo ($_SERVER['REQUEST_URI'] == '/account/login') ? 'bg-blue-200 text-blue-600' : 'bg-gray-200'; ?> px-4 py-3 hover:bg-blue-200 transition-colors ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                  d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                  clip-rule="evenodd" />
              </svg>
              <span>Account</span>
            </a>
          </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div x-show="mobileMenuOpen" class="lg:hidden" role="dialog" id="mobile-modal" aria-modal="true">
          <!-- Background backdrop, show/hide based on slide-over state. -->
          <div @click="mobileMenuOpen = false" class="fixed inset-0 z-50"></div>
          <div
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-50 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
              <a href="#" class="flex -m-1.5 p-1.5 text-xl font-bold tracking-tight">
                <span class="text-blue-500">Modern</span>
                <span>Gym</span>
              </a>
              <button @click="mobileMenuOpen = false" type="button" class="-m-2.5 rounded-xl p-2.5 text-gray-700">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="mt-6 flow-root">
              <div class="-my-6 divide-y divide-gray-500/10">
                <div class="py-6 gap-x-2 flex flex-row">
                  <a href="#"
                    class="flex text-md gap-x-2 font-semibold leading-6 text-gray-900 hover:text-blue-600 rounded-2xl bg-gray-200 px-4 py-3 hover:bg-blue-200 transition-colors ease-in-out w-full justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <span>Sign Up</span>
                  </a>
                  <a href="#"
                    class="flex text-md gap-x-2 font-semibold leading-6 text-gray-900 hover:text-blue-600 rounded-2xl bg-gray-200 px-4 py-3 hover:bg-blue-200 transition-colors ease-in-out w-full justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd"
                        d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                        clip-rule="evenodd" />
                    </svg>
                    <span>Account</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>