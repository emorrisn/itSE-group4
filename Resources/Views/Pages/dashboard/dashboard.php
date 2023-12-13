<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<?php

use App\Helpers\AuthenticationHelper;

include_once(__DIR__ . "\..\..\Headers\landing.php");
?>

<body class="font-sans antialiased">
  <div class="app">
    <div class="bg-gray-50 h-screen">
      <div class="flex relative isolate px-6 lg:px-8 min-h-full justify-center">
        <div class="gap-y-6 mx-auto w-full py-12 sm:py-0 flex sm:my-auto flex-col sm:justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="-m-1.5 p-1.5 text-lg font-bold tracking-tight flex text-gray-800">
              <span class="bg-gradient-to-r from-blue-500 via-blue-700 to-gray-800 bg-clip-text text-transparent">Modern</span>
              <span>Gym</span>
            </div>
            <h2 class="flex items-center gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900">
              <div>Home</div>
            </h2>
            <div class="mt-4">
              <form class="" action="#" method="POST">
                <div class="mt-2">
                  <div class="relative mt-2 rounded-xl shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                      </svg>
                    </div>
                    <input type="text" name="price" id="price" class="block w-full rounded-xl border-2 py-1.5 pl-9 pr-20 text-gray-900 border-gray-200 placeholder:text-gray-400 focus:border-2 focus:border-blue-400 sm:text-sm sm:leading-6 bg-gray-100 transition ease-in-out" placeholder="Search">
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="shadow-md rounded-xl p-6 bg-white">
              <div class="text-center">
                <img class="rounded-full sm:w-48 sm:h-48 lg:w-48 lg:h-48 mx-auto" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=900&h=900&q=80" alt="Image Description">
                <div class="mt-2 sm:mt-4">
                  <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg dark:text-gray-200">
                    <?php echo AuthenticationHelper::getUser()->name; ?>
                  </h3>
                  <p class="text-xs text-gray-600 sm:text-sm lg:text-base dark:text-gray-400">
                    <?php echo AuthenticationHelper::getUser()->type; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-4">
            <div class="shadow-md rounded-xl p-6 bg-white">
              <h2 class="flex items-center gap-x-2 text-2xl font-bold leading-9 tracking-tight text-gray-900">
                <span>a</span>
              </h2>
            </div>
          </div>
          <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-4">
            <div class="shadow-md rounded-xl py-24 px-6 bg-white">
              <h2 class="flex items-center gap-x-2 text-2xl font-bold leading-9 tracking-tight text-gray-900">
                <span>a</span>
              </h2>
            </div>
          </div>
          <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-4">
            <div class="shadow-md rounded-xl p-6 bg-white">
              <h2 class="flex items-center gap-x-2 text-2xl font-bold leading-9 tracking-tight text-gray-900">
                <span>a</span>
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>