<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<?php

use App\Helpers\AuthenticationHelper;

include_once(__DIR__ . "\..\..\Headers\landing.php");
?>

<body class="font-sans antialiased">
  <div class="app">
    <div class="bg-gray-50 min-h-screen">
      <div class="flex relative isolate py-6 px-6 lg:px-8 min-h-full justify-center">
        <div class="gap-y-6 mx-auto w-full py-12 sm:py-0 flex sm:my-auto flex-col sm:justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="-m-1.5 p-1.5 text-lg font-bold tracking-tight flex text-gray-800">
              <span class="bg-gradient-to-r from-blue-500 via-blue-700 to-gray-800 bg-clip-text text-transparent">Modern</span>
              <span>Fit</span>
            </div>
            <h2 class="flex items-center gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900">
              <div>Specialist Home</div>
            </h2>
          </div>
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="group relative flex gap-x-6 rounded-xl shadow-xl hover:shadow-lg bg-white p-4 items-center hover:bg-green-50 transition ease-in-out">
              <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-green-100 group-hover:bg-green-600 transition ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-600 group-hover:text-green-200 transition ease-in-out">
                  <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                  <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                </svg>


              </div>
              <div>
                <a href="/my/pin" class="font-semibold text-gray-900">
                  Clients
                  <span class="absolute inset-0"></span>
                </a>
                <p class="text-gray-600">
                  Manage clients, set diets and workouts
                </p>
              </div>
              <div class="flex flex-none items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-green-600 transition ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>

              </div>
            </div>
          </div>
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="rounded-xl shadow-xl overflow-hidden hover:shadow-lg transition ease-in-out">
              <div class="group relative flex gap-x-6 bg-white p-4 items-center hover:bg-teal-50 transition ease-in-out">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-teal-100 group-hover:bg-teal-600 transition ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-teal-600 group-hover:fill-teal-200 transition ease-in-out" viewBox="0 0 640 512">
                    <path d="M96 64c0-17.7 14.3-32 32-32h32c17.7 0 32 14.3 32 32V224v64V448c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V384H64c-17.7 0-32-14.3-32-32V288c-17.7 0-32-14.3-32-32s14.3-32 32-32V160c0-17.7 14.3-32 32-32H96V64zm448 0v64h32c17.7 0 32 14.3 32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32v64c0 17.7-14.3 32-32 32H544v64c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32V288 224 64c0-17.7 14.3-32 32-32h32c17.7 0 32 14.3 32 32zM416 224v64H224V224H416z" />
                  </svg>
                </div>
                <div>
                  <a href="/my/meals" class="font-semibold text-gray-900">
                    Workouts
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="text-gray-600">Create and customize client workouts</p>
                </div>
                <div class="flex flex-none items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-teal-600 transition ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>

                </div>
              </div>
              <div class="group relative flex gap-x-6 bg-white p-4 items-center hover:bg-blue-50 transition ease-in-out">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-blue-100 group-hover:bg-blue-600 transition ease-in-out">

                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-blue-600 group-hover:fill-blue-200 transition ease-in-out"" viewBox=" 0 0 512 512">
                    <path d="M0 192c0-35.3 28.7-64 64-64c.5 0 1.1 0 1.6 0C73 91.5 105.3 64 144 64c15 0 29 4.1 40.9 11.2C198.2 49.6 225.1 32 256 32s57.8 17.6 71.1 43.2C339 68.1 353 64 368 64c38.7 0 71 27.5 78.4 64c.5 0 1.1 0 1.6 0c35.3 0 64 28.7 64 64c0 11.7-3.1 22.6-8.6 32H8.6C3.1 214.6 0 203.7 0 192zm0 91.4C0 268.3 12.3 256 27.4 256H484.6c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28H140.2c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4z" />
                  </svg>

                </div>
                <div>
                  <a href="/my/workouts" class="font-semibold text-gray-900">
                    Meals
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="text-gray-600">Make personalized meal plans, selecting specific foods</p>
                </div>
                <div class="flex flex-none items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-blue-600 transition ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>

                </div>
              </div>
              <div class="group relative flex gap-x-6 bg-white p-4 items-center hover:bg-violet-50 transition ease-in-out">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-violet-100 group-hover:bg-violet-600 transition ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-violet-600 group-hover:fill-violet-200 transition ease-in-out" viewBox="0 0 448 512">
                    <path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16h96c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z" />
                  </svg>
                </div>
                <div>
                  <a href="/my/pr" class="font-semibold text-gray-900">
                    Diets
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="text-gray-600">Design dietary plans, selecting meals for personalized diets</p>
                </div>
                <div class="flex flex-none items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-violet-600 transition ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>

                </div>
              </div>
            </div>

          </div>
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="group relative flex gap-x-6 rounded-xl shadow-xl hover:shadow-lg bg-white p-4 items-center hover:bg-red-50 transition ease-in-out">
              <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-orange-100 group-hover:bg-orange-600 transition ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-orange-600 group-hover:text-orange-200 transition ease-in-out">
                  <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 011.5 10.875v-3.75zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 01-1.875-1.875v-8.25zM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 013 18.375v-2.25z" clip-rule="evenodd" />
                </svg>
              </div>
              <div>
                <a href="/dashboard" class="font-semibold text-gray-900">
                  Client Dashboard
                  <span class="absolute inset-0"></span>
                </a>
                <p class="text-gray-600">Return to the client dashboard view</p>
              </div>
              <div class="flex flex-none items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-orange-600 transition ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>


              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</body>

</html>