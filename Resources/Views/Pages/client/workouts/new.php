<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<link href="/../node_modules/flowbite/dist/flowbite.min.css" rel="stylesheet" />
<script src="/../node_modules/flowbite/dist/datepicker.min.js"></script>
<script src="/../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="/../node_modules/preline/dist/preline.js"></script>

<?php

use App\Helpers\AuthenticationHelper;
use App\Models\Workout;

include_once(__DIR__ . "\..\..\..\Headers\landing.php");

?>

<body class="font-sans antialiased">
  <div class="app">
    <div class="bg-gray-50 min-h-screen">
      <div class="flex relative isolate py-6 px-6 lg:px-8 min-h-full justify-center">
        <div class="gap-y-6 mx-auto w-full py-12 sm:py-0 flex sm:my-auto flex-col sm:justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="-m-1.5 p-1.5 text-lg font-bold tracking-tight flex text-blue-500 hover:text-blue-400 transition ease-in-out">
              <a href="/view/workout?workout=<?php echo $workout->id; ?>" class="flex items-center gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
              </a>
            </div>
            <h2 class="flex items-center justify-between gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900 mt-2">
              <div><?php echo ($workout->name); ?> Workout</div>
            </h2>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="group relative flex gap-x-6 rounded-xl shadow-xl hover:shadow-lg bg-white p-4 items-center hover:bg-red-50 transition ease-in-out">
              <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-red-100 group-hover:bg-red-600 transition ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600 group-hover:text-red-200 transition ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
              </div>
              <div>
                <a href="/view/workout?workout=<?php echo $workout->id; ?>" class="font-semibold text-gray-900">
                  Stop Exercise
                  <span class="absolute inset-0"></span>
                </a>
                <p class="text-gray-600">Stop recording your workout</p>
              </div>

            </div>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="shadow-xl rounded-xl p-6 bg-white">
              <form class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6" method="POST" action="/edit/account">

                <div class="sm:col-span-full">
                  <label for="meal" class="block text-sm font-medium leading-6 text-gray-900">Exercise</label>
                  <div class="mt-2">
                    <div class="relative">
                      <select name="meal" data-hs-select='{
      "hasSearch": true,
      "searchPlaceholder": "Search Exercises...",
      "searchClasses": "block w-full text-md shadow rounded-xl focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
      "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
      "placeholder": "Select exercises...",
      "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
      "toggleClasses": "ring-2 ring-gray-200 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white rounded-xl shadow text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 font-medium",
      "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-xl overflow-hidden overflow-y-auto shadow-2xl",
      "optionClasses": "py-2 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-xl focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
      "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
    }' class="hidden" id="meal">
                        <option value="a" data-hs-select-option='{"icon": ""}'>Running</option>
                      </select>

                      <div class="absolute top-1/2 end-3 -translate-y-1/2">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="m7 15 5 5 5-5" />
                          <path d="m7 9 5-5 5 5" />
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-full">
                  <button type="submit" class="flex w-full justify-center rounded-xl bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors ease-in-out" control-id="ControlID-9">Add</button>
                </div>
              </form>
            </div>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="grid grid-cols-1 gap-x-1 gap-y-1 sm:grid-cols-6">
              <div class="col-span-full text-md font-semibold text-gray-600">
                Exercise Log
              </div>
            </div>
          </div>
          <?php foreach ($workout->excercises() as $excercise) : ?>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <div class="shadow-xl rounded-xl p-6 bg-white">
                <div class="grid grid-cols-1 gap-x-1 gap-y-1 sm:grid-cols-6">
                  <div class="col-span-full text-2xl font-semibold">
                    <?php echo ($excercise->name); ?>
                  </div>
                  <div class="col-span-full">
                    <?php echo ($excercise->description); ?> - <?php echo ($excercise->recommended_form_tips); ?>
                  </div>
                  <div class="col-span-full px-4 py-4 bg-gray-100 rounded-xl mt-3">
                    <form class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6" method="POST" action="/edit/account">

                      <div class="sm:col-span-full">
                        <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Reps</label>
                        <div class="mt-2">
                          <input id="height" name="height" type="text" value="" autocomplete="height" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out" control-id="ControlID-5">
                        </div>
                      </div>

                      <div class="sm:col-span-3">
                        <label for="height" class="block text-sm font-medium leading-6 text-gray-900">Difficulty level</label>
                        <div class="mt-2">
                          <input id="height" name="height" type="text" value="" autocomplete="height" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out" control-id="ControlID-5">
                        </div>
                      </div>

                      <div class="sm:col-span-3">
                        <label for="weight" class="block text-sm font-medium leading-6 text-gray-900">Weight (KG)</label>
                        <div class="mt-2">
                          <input id="weight" name="weight" type="text" value="" autocomplete="weight" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out" control-id="ControlID-6">
                        </div>
                      </div>

                      <div class="sm:col-span-full">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Notes</label>
                        <div class="mt-2">
                          <textarea id="name" name="name" type="text" value="Ethan" autocomplete="email" required="" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out" control-id="ControlID-1"></textarea>
                        </div>
                      </div>

                      <div class="sm:col-span-full flex gap-2">
                        <button type="submit" class="flex w-full justify-center rounded-xl bg-gray-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 transition-colors ease-in-out" control-id="ControlID-9">Delete</button>
                        <button type="submit" class="flex w-full justify-center rounded-xl bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors ease-in-out" control-id="ControlID-9">Save</button>
                      </div>
                    </form>
                  </div>

                  <div class="col-span-full px-4 py-2 bg-gray-100 mt-2 rounded-xl text-gray-600">
                    Last update 3 minutes ago
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>