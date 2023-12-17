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
              <form class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6" method="POST" action="/edit/account">
                <div class="sm:col-span-full">
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                  <div class="mt-2">
                    <input id="name" name="name" type="text" value="<?php echo AuthenticationHelper::getUser()->name; ?>" autocomplete="email" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>

                <div class="sm:col-span-full">
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                  <div class="mt-2">
                    <input id="email" name="email" type="email" value="<?php echo AuthenticationHelper::getUser()->email; ?>" autocomplete="email" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="age" class="block text-sm font-medium leading-6 text-gray-900">Age</label>
                  <div class="mt-2">
                    <input id="age" name="age" type="text" value="<?php echo AuthenticationHelper::getUser()->age; ?>" autocomplete="age" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
                  <div class="mt-2">
                    <?php
                    $genders = [
                      'male',
                      'female',
                      'non-binary',
                      'prefer-not-to-say',
                      'agender',
                      'bigender',
                      'genderqueer',
                      'genderfluid',
                      'two-spirit',
                      'demiboy',
                      'demigirl',
                      'androgyne',
                      'neutrois',
                      'pangender',
                      'third-gender',
                      'transgender-male',
                      'transgender-female'
                    ];
                    ?>

                    <select id="gender" name="gender" autocomplete="gender" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">

                      <?php foreach ($genders as $gender) : ?>
                        <option value="<?php echo $gender; ?>" <?php echo (AuthenticationHelper::getUser()->gender == $gender) ? 'selected' : ''; ?>>
                          <?php echo ucfirst(str_replace('-', ' ', $gender)); ?>
                        </option>
                      <?php endforeach; ?>

                    </select>
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Height</label>
                  <div class="mt-2">
                    <input id="height" name="height" type="text" value="<?php echo AuthenticationHelper::getUser()->height; ?>" autocomplete="height" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="weight" class="block text-sm font-medium leading-6 text-gray-900">Weight</label>
                  <div class="mt-2">
                    <input id="weight" name="weight" type="text" value="<?php echo AuthenticationHelper::getUser()->weight; ?>" autocomplete="weight" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                </div>

                <div class="sm:col-span-full">
                  <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Change Password</label>
                  </div>
                  <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                  </div>
                  <div class="flex items-center justify-between mt-2">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-500">You may leave this blank if you do not wish to change your password.</label>
                  </div>
                </div>
                <div class="sm:col-span-full">
                  <div class="flex items-center justify-between">
                    <label for="password_confirm" class="block text-sm font-medium leading-6 text-gray-900">
                      Confirm Password Change
                    </label>
                  </div>
                  <div class="mt-2">
                    <input id="password_confirm" name="password_confirm" type="password" autocomplete="confirm-password" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
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
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                </svg>

              </div>
              <div>
                <a href="/logout" class="font-semibold text-gray-900">
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