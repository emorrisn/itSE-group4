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
            <div class="-m-1.5 p-1.5 text-lg font-bold tracking-tight flex text-blue-500 hover:text-blue-400 transition ease-in-out">
              <a href="/dashboard" class="flex items-center gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
              </a>
            </div>
            <h2 class="flex items-center gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900 mt-1">
              <div>Account</div>
            </h2>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="shadow-xl rounded-xl p-6 bg-white">
              <form class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6" method="POST" action="/register">
                <div class="sm:col-span-full">
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                  <div class="mt-2">
                    <input id="name" name="name" type="text" autocomplete="email" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>

                <div class="sm:col-span-full">
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                  <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="age" class="block text-sm font-medium leading-6 text-gray-900">Age</label>
                  <div class="mt-2">
                    <input id="age" name="age" type="text" autocomplete="age" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
                  <div class="mt-2">
                    <select id="gender" name="gender" autocomplete="gender" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="non-binary">Non-Binary</option>
                      <option value="prefer-not-to-say">Prefer Not to Say</option>
                      <option value="agender">Agender</option>
                      <option value="bigender">Bigender</option>
                      <option value="genderqueer">Genderqueer</option>
                      <option value="genderfluid">Genderfluid</option>
                      <option value="two-spirit">Two-Spirit</option>
                      <option value="demiboy">Demiboy</option>
                      <option value="demigirl">Demigirl</option>
                      <option value="androgyne">Androgyne</option>
                      <option value="neutrois">Neutrois</option>
                      <option value="pangender">Pangender</option>
                      <option value="third-gender">Third Gender</option>
                      <option value="transgender-male">Transgender Male</option>
                      <option value="transgender-female">Transgender Female</option>
                    </select>
                  </div>
                </div>

                <div class="sm:col-span-full">
                  <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                  </div>
                  <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>
                <div class="sm:col-span-full">
                  <div class="flex items-center justify-between">
                    <label for="password_confirm" class="block text-sm font-medium leading-6 text-gray-900">Confirm
                      Password</label>
                  </div>
                  <div class="mt-2">
                    <input id="password_confirm" name="password_confirm" type="password" autocomplete="confirm-password" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>

                <div class="sm:col-span-full">
                  <button type="submit" class="flex w-full justify-center rounded-xl bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors ease-in-out">Save Changes</button>
                </div>
              </form>
            </div>
          </div>


          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="group relative flex gap-x-6 rounded-xl shadow-xl hover:shadow-lg bg-white p-4 items-center transition ease-in-out">
              <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-100 group-hover:bg-gray-600 transition ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600 group-hover:text-gray-200 transition ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
              </div>
              <div>
                <a href="/reset/my/pin" class="font-semibold text-gray-900">
                  Change Profile
                  <span class="absolute inset-0"></span>
                </a>
                <p class="text-gray-600">You will logged out so you an log into another account</p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>