<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<link href="/../node_modules/flowbite/dist/flowbite.min.css" rel="stylesheet" />
<script src="/../node_modules/flowbite/dist/datepicker.min.js"></script>
<script src="/../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="/../node_modules/preline/dist/preline.js"></script>

<?php

use App\Helpers\AuthenticationHelper;
use App\Models\Diet;
use App\Models\MealLog;

include_once(__DIR__ . "\..\..\..\Headers\landing.php");


?>

<body class="font-sans antialiased">
  <div class="app">
    <div class="bg-gray-50 min-h-screen">
      <div class="flex relative isolate py-6 px-6 lg:px-8 min-h-full justify-center">
        <div class="gap-y-6 mx-auto w-full py-12 sm:py-0 flex sm:my-auto flex-col sm:justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="-m-1.5 p-1.5 text-lg font-bold tracking-tight flex text-blue-500 hover:text-blue-400 transition ease-in-out">
              <a href="/my/meals" class="flex items-center gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
              </a>
            </div>
            <h2 class="flex items-center justify-between gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900 mt-2">
              <div>New</div>
            </h2>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <nav class="relative z-0 flex border rounded-xl overflow-hidden dark:border-gray-700" aria-label="Tabs" role="tablist">
              <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white dark:hs-tab-active:border-b-blue-600 relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-400 active" id="bar-with-underline-item-1" data-hs-tab="#bar-with-underline-1" aria-controls="bar-with-underline-1" role="tab">
                Meal Log
              </button>
              <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white dark:hs-tab-active:border-b-blue-600 relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-400" id="bar-with-underline-item-2" data-hs-tab="#bar-with-underline-2" aria-controls="bar-with-underline-2" role="tab">
                Meal Targets
              </button>
            </nav>

            <div class="mt-3">
              <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1">
                <div class="shadow-xl rounded-xl p-6 bg-white">
                  <form class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6" method="POST" action="/my/meals/new/submit">
                    <div class="sm:col-span-full">
                      <label for="meal" class="block text-sm font-medium leading-6 text-gray-900">Meal</label>
                      <div class="mt-2">
                        <div class="relative">
                          <select name="meal" data-hs-select='{
      "hasSearch": true,
      "searchPlaceholder": "Search Meals...",
      "searchClasses": "block w-full text-md shadow rounded-xl focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
      "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
      "placeholder": "Select meals...",
      "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
      "toggleClasses": "ring-2 ring-gray-200 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white rounded-xl shadow text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 font-medium",
      "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-xl overflow-hidden overflow-y-auto shadow-2xl",
      "optionClasses": "py-2 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-xl focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
      "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
    }' class="hidden" id="meal">
                            <?php foreach (AuthenticationHelper::getUser()->userDiet() as $diet) : ?>

                              <?php foreach ($diet->diet()->meals() as $meal) : ?>
                                <option value="<?php echo $meal->id . ":" . $diet->diet()->id ?>" data-hs-select-option='{"icon": ""}'>
                                  <?php echo $diet->diet()->name; ?>:
                                  <?php echo $meal->name; ?>
                                  <?php echo $meal->type; ?>
                                </option>
                              <?php endforeach; ?>
                            <?php endforeach; ?>
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

                    <div class="sm:col-span-3">
                      <label for="date_eaten" class="block text-sm font-medium leading-6 text-gray-900">Date Eaten</label>
                      <div class="mt-2">
                        <input id="date_eaten" name="date_eaten" type="date" autocomplete="date_eaten" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out" value="<?php echo date('Y-m-d'); ?>">
                      </div>
                    </div>
                    <div class="sm:col-span-3">
                      <label for="time_eaten" class="block text-sm font-medium leading-6 text-gray-900">Time Eaten</label>
                      <div class="mt-2">
                        <input id="time_eaten" name="time_eaten" type="time" value="<?php echo date("H:i"); ?>" autocomplete="time_eaten" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                      </div>
                    </div>

                    <div class="sm:col-span-full">
                      <div class="relative mb-6">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Satisfaction Level</label>
                        <input name="satisfaction" id="labels-range-input" type="range" value="1" min="0" max="10" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">Min (0)</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">Max (10)</span>
                      </div>
                    </div>

                    <div class="sm:col-span-full">
                      <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                      <div class="mt-2">
                        <?php
                        $locations = [
                          'home',
                          'work',
                          'school',
                          'park',
                          'restaurant',
                          'cafe',
                          'library',
                          'gym',
                          'beach',
                          'shopping-mall',
                          'cinema',
                          'hospital',
                          'airport',
                          'public-transit',
                          'friend\'s-house',
                          'community-center',
                          'sporting-event',
                          'concert',
                          'theater',
                          'other'
                        ];

                        ?>

                        <select name="location" data-hs-select='{
      "hasSearch": true,
      "searchPlaceholder": "Search locations...",
      "searchClasses": "block w-full text-md shadow rounded-xl focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
      "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
      "placeholder": "Select location...",
      "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
      "toggleClasses": "ring-2 ring-gray-200 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white rounded-xl shadow text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 font-medium",
      "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-xl overflow-hidden overflow-y-auto shadow-2xl",
      "optionClasses": "py-2 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-xl focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
      "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
    }' class="hidden" id="location">
                          <?php foreach ($locations as $location) : ?>
                            <option>
                              <?php echo $location ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="sm:col-span-full">
                      <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Mood</label>
                      <div class="mt-2">
                        <?php
                        $moods = [
                          'happy',
                          'sad',
                          'excited',
                          'calm',
                          'angry',
                          'relaxed',
                          'stressed',
                          'content',
                          'energetic',
                          'tired',
                          'anxious',
                          'peaceful',
                          'confused',
                          'motivated',
                          'bored',
                          'grateful',
                          'loved',
                          'lonely',
                          'optimistic',
                          'pensive',
                          'silly',
                          'inspired',
                          'surprised',
                          'fearful',
                          'nostalgic',
                          'curious',
                          'inquisitive',
                          'hopeful'
                        ];

                        ?>

                        <select name="mood" data-hs-select='{
      "hasSearch": true,
      "searchPlaceholder": "Search moods...",
      "searchClasses": "block w-full text-md shadow rounded-xl focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
      "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
      "placeholder": "Select mood...",
      "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
      "toggleClasses": "ring-2 ring-gray-200 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white rounded-xl shadow text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 font-medium",
      "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-xl overflow-hidden overflow-y-auto shadow-2xl",
      "optionClasses": "py-2 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-xl focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
      "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
    }' class="hidden" id="mood">
                          <?php foreach ($moods as $mood) : ?>
                            <option>
                              <?php echo $mood ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>


                    <div class="sm:col-span-full">
                      <div class="flex items-center justify-between">
                        <label for="addtional_comments" class="block text-sm font-medium leading-6 text-gray-900">
                          Additional Comments
                          <span class="text-gray-500">(optional)</span>
                        </label>
                      </div>
                      <div class="mt-2">
                        <textarea id="additional_comments" name="additional_comments" type="text" autocomplete="confirm-password" class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out"></textarea>
                      </div>
                    </div>

                    <div class="sm:col-span-full">
                      <button type="submit" class="flex w-full justify-center rounded-xl bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors ease-in-out">Save & Submit</button>
                    </div>
                  </form>
                </div>
              </div>
              <div id="bar-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-2">
                <div class="rounded-xl shadow-xl overflow-hidden bg-white">
                  <div class="group relative flex gap-x-6 p-4 items-center ">
                    <div>
                      <p class="text-gray-600">Sorry,</p>
                      <span class="font-medium text-gray-800">
                        Only your trainer can set meal targets.
                        <span class="absolute inset-0"></span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>