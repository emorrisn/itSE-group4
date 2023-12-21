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
        <div class="gap-y-6 mx-auto w-full flex sm:my-auto flex-col sm:justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="-m-1.5 p-1.5 text-lg font-bold tracking-tight flex text-gray-800">
              <span class="bg-gradient-to-r from-blue-500 via-blue-700 to-gray-800 bg-clip-text text-transparent">Modern</span>
              <span>Fit</span>
            </div>
            <h2 class="flex items-center gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900">
              <div>Home</div>
            </h2>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="shadow-xl rounded-xl p-6 bg-white">
              <div class="text-center">
                <img class="rounded-full w-32 h-32 mx-auto" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=900&h=900&q=80" alt="Image Description">
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
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="group relative flex gap-x-6 rounded-xl shadow-xl hover:shadow-lg bg-white p-4 items-center hover:bg-green-50 transition ease-in-out">
              <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-green-100 group-hover:bg-green-600 transition ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-green-600 group-hover:text-green-200 transition ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                </svg>

              </div>
              <div>
                <a href="/my/pin" class="font-semibold text-gray-900">
                  Sign-in to the gym
                  <span class="absolute inset-0"></span>
                </a>
                <p class="text-gray-600">Access your 4-digit pin code to for access to the gym</p>
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

                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-teal-600 group-hover:fill-teal-200 transition ease-in-out"" viewBox=" 0 0 512 512">
                    <path d="M0 192c0-35.3 28.7-64 64-64c.5 0 1.1 0 1.6 0C73 91.5 105.3 64 144 64c15 0 29 4.1 40.9 11.2C198.2 49.6 225.1 32 256 32s57.8 17.6 71.1 43.2C339 68.1 353 64 368 64c38.7 0 71 27.5 78.4 64c.5 0 1.1 0 1.6 0c35.3 0 64 28.7 64 64c0 11.7-3.1 22.6-8.6 32H8.6C3.1 214.6 0 203.7 0 192zm0 91.4C0 268.3 12.3 256 27.4 256H484.6c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28H140.2c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4z" />
                  </svg>

                </div>
                <div>
                  <a href="/my/meals" class="font-semibold text-gray-900">
                    Meals
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="text-gray-600">Access meal targets and log your meals</p>
                </div>
                <div class="flex flex-none items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-teal-600 transition ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>

                </div>
              </div>
              <div class="group relative flex gap-x-6 bg-white p-4 items-center hover:bg-blue-50 transition ease-in-out">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-blue-100 group-hover:bg-blue-600 transition ease-in-out">

                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-blue-600 group-hover:fill-blue-200 transition ease-in-out" viewBox="0 0 640 512">
                    <path d="M96 64c0-17.7 14.3-32 32-32h32c17.7 0 32 14.3 32 32V224v64V448c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V384H64c-17.7 0-32-14.3-32-32V288c-17.7 0-32-14.3-32-32s14.3-32 32-32V160c0-17.7 14.3-32 32-32H96V64zm448 0v64h32c17.7 0 32 14.3 32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32v64c0 17.7-14.3 32-32 32H544v64c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32V288 224 64c0-17.7 14.3-32 32-32h32c17.7 0 32 14.3 32 32zM416 224v64H224V224H416z" />
                  </svg>

                </div>
                <div>
                  <a href="/my/workouts" class="font-semibold text-gray-900">
                    Workouts
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="text-gray-600">Record, browse and edit your exercises </p>
                </div>
                <div class="flex flex-none items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-blue-600 transition ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>

                </div>
              </div>
              <div class="group relative flex gap-x-6 bg-white p-4 items-center hover:bg-violet-50 transition ease-in-out">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-violet-100 group-hover:bg-violet-600 transition ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-violet-600 group-hover:text-violet-200 transition ease-in-out">
                    <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                  </svg>

                </div>
                <div>
                  <a href="/my/pr" class="font-semibold text-gray-900">
                    Personal Trainer
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="text-gray-600">View and manage your account personal trainer</p>
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
              <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-red-100 group-hover:bg-red-600 transition ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-red-600 group-hover:text-red-200 transition ease-in-out">
                  <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                </svg>

              </div>
              <div>
                <a href="/account" class="font-semibold text-gray-900">
                  Account
                  <span class="absolute inset-0"></span>
                </a>
                <p class="text-gray-600">Manage your account settings and contact info</p>
              </div>
              <div class="flex flex-none items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-red-600 transition ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>

              </div>
            </div>
          </div>
          <?php if (AuthenticationHelper::getUser()->type == "Trainer" || AuthenticationHelper::getUser()->type == "Admin") : ?>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <div class="group relative flex gap-x-6 rounded-xl shadow-xl hover:shadow-lg bg-white p-4 items-center hover:bg-red-50 transition ease-in-out">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-orange-100 group-hover:bg-orange-600 transition ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-orange-600 group-hover:text-orange-200 transition ease-in-out">
                    <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 011.5 10.875v-3.75zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 01-1.875-1.875v-8.25zM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 013 18.375v-2.25z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div>
                  <a href="/specialist" class="font-semibold text-gray-900">
                    Specialist Dashboard
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="text-gray-600">Manage your clients, meals and more</p>
                </div>
                <div class="flex flex-none items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-orange-600 transition ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>

                </div>
              </div>
            </div>
          <?php endif; ?>
          <?php if (AuthenticationHelper::getUser()->type == "Admin") : ?>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <div class="group relative flex gap-x-6 rounded-xl shadow-xl hover:shadow-lg bg-white p-4 items-center hover:bg-red-50 transition ease-in-out">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-pink-100 group-hover:bg-pink-600 transition ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-pink-600 group-hover:text-pink-200 transition ease-in-out">
                    <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 011.5 10.875v-3.75zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 01-1.875-1.875v-8.25zM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 013 18.375v-2.25z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div>
                  <a href="/admin" class="font-semibold text-gray-900">
                    Admin Dashboard
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="text-gray-600">Manage the application in it's entirety</p>
                </div>
                <div class="flex flex-none items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-pink-600 transition ease-in-out">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                  </svg>

                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</body>

</html>