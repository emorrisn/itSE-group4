<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<?php
include_once(__DIR__ . "\..\..\Headers\landing.php");
?>

<body class="font-sans antialiased" x-data="{ mobileMenuOpen: false, isColoursVisible: false }" x-init="$nextTick(() => { isColoursVisible = true })">
  <div class="app">
    <div class="bg-gray-50 h-screen">
      <?php
      include_once(__DIR__ . "\..\partials\header.php");
      ?>
      <div class="relative isolate px-6 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
          <div x-show="isColoursVisible" x-transition:enter="transition-opacity ease-in-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-30" class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-blue-100 to-purple-500 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem] transition-opacity ease-in-out duration-1000" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
          </div>
        </div>
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 flex min-h-full flex-col justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="flex items-center gap-x-2 text-2xl font-bold leading-9 tracking-tight text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
              </svg>
              <span>Sign In</span>
            </h2>
          </div>

          <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST" action="/login">
              <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                  <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                </div>
              </div>

              <div>
                <div class="flex items-center justify-between">
                  <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                  <div class="text-sm">
                    <a href="/account/forgot" class="font-semibold text-blue-600 hover:text-blue-500 transition-color ease-in-out">Forgot
                      password?</a>
                  </div>
                </div>
                <div class="mt-2">
                  <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                </div>
              </div>

              <div>
                <button type="submit" class="flex w-full justify-center rounded-xl bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors ease-in-out">Sign
                  in</button>
              </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500 flex flex-col">
              Not a member?
              <a href="/account/register" class="font-semibold leading-6 text-blue-600 hover:text-blue-500 transition-colors ease-in-out">Register
                Instead</a>
            </p>
          </div>
        </div>
        <div x-show="isColoursVisible" x-transition:enter="transition-opacity ease-in-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-30" class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)] transition-opacity ease-in-out duration-1000" aria-hidden="true">
          <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-yellow-100 to-green-500 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if (isset($_GET['message']) && !empty($_GET['message'])) : ?>
    <div class="absolute bottom-0 start-1/2 -translate-x-1/2 pb-12">
      <div class="max-w-xl bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700" role="alert">
        <div class="flex p-4">
          <div class="flex-shrink-0">
            <svg class="flex-shrink-0 h-4 w-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
          </div>
          <div class="ms-3">
            <p class="text-sm text-gray-700 dark:text-gray-400">
              <?= htmlspecialchars($_GET['message']) ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if (isset($_GET['error']) && !empty($_GET['error'])) : ?>
    <div class="absolute bottom-0 start-1/2 -translate-x-1/2 pb-12">
      <div class="max-w-xl bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700" role="alert">
        <div class="flex p-4">
          <div class="flex-shrink-0">
            <svg class="flex-shrink-0 h-4 w-4 text-red-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
            </svg>
          </div>
          <div class="ms-3">
            <p class="text-sm text-gray-700 dark:text-gray-400">
              <?= htmlspecialchars($_GET['error']) ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</body>

</html>