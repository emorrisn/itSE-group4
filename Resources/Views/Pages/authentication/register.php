<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<?php 
    include_once(__DIR__."\..\..\Headers\landing.php");
?>

<!-- 
        'gender',
        'age',
        'height',
        'weight',
        'profile_picture_url',
        'emergency_contact_info',
        'medical_history',
        'preferred_language',
        'address',
        ' -->

<body class="font-sans antialiased" x-data="{ mobileMenuOpen: false, isColoursVisible: false }"
  x-init="$nextTick(() => { isColoursVisible = true })">
  <div class="app">
    <div class="bg-gray-50 h-screen">
      <?php 
        include_once(__DIR__."\..\partials\header.php");
      ?>
      <div class="relative isolate px-6 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
          aria-hidden="true">
          <div x-show="isColoursVisible" x-transition:enter="transition-opacity ease-in-out duration-1000"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-30"
            class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-pink-100 to-green-500 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem] transition-opacity ease-in-out duration-1000"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
          </div>
        </div>
        <div class="mx-auto max-w-2xl py-32 flex min-h-full flex-col justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="flex items-center gap-x-2 text-2xl font-bold leading-9 tracking-tight text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path fill-rule="evenodd"
                  d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                  clip-rule="evenodd"></path>
              </svg>
              <span>New Account</span>
            </h2>
          </div>

          <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6" action="#" method="POST">
              <div class="sm:col-span-full">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                  <input id="name" name="name" type="text" autocomplete="email" required
                    class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                </div>
              </div>

              <div class="sm:col-span-full">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                  <input id="email" name="email" type="email" autocomplete="email" required
                    class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="age" class="block text-sm font-medium leading-6 text-gray-900">Age</label>
                <div class="mt-2">
                  <input id="age" name="age" type="text" autocomplete="age" required
                    class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
                <div class="mt-2">
                  <select id="gender" name="gender" autocomplete="gender"
                    class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
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
                  <input id="password" name="password" type="password" autocomplete="current-password" required
                    class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                </div>
              </div>
              <div class="sm:col-span-full">
                <div class="flex items-center justify-between">
                  <label for="password_confirm" class="block text-sm font-medium leading-6 text-gray-900">Confirm
                    Password</label>
                </div>
                <div class="mt-2">
                  <input id="password_confirm" name="password_confirm" type="password" autocomplete="confirm-password"
                    required
                    class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                </div>
              </div>

              <div class="sm:col-span-full">
                <button type="submit"
                  class="flex w-full justify-center rounded-xl bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors ease-in-out">Register</button>
              </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500 flex flex-col">
              Already a member?
              <a href="#"
                class="font-semibold leading-6 text-blue-600 hover:text-blue-500 transition-colors ease-in-out">Login
                Instead</a>
            </p>
          </div>
        </div>
        <div
          class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
          aria-hidden="true">
          <div x-show="isColoursVisible" x-transition:enter="transition-opacity ease-in-out duration-1000"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-30"
            class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-green-100 to-emerald-500 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem] transition-opacity ease-in-out duration-1000"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>