<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<link href="/../node_modules/flowbite/dist/flowbite.min.css" rel="stylesheet" />
<script src="/../node_modules/flowbite/dist/datepicker.min.js"></script>
<script src="/../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="/../node_modules/preline/dist/preline.js"></script>

<?php

use App\Helpers\AuthenticationHelper;
use App\Models\Diet;

include_once(__DIR__ . "\..\..\..\Headers\landing.php");

if (isset($_GET['date'])) {
  // Check if the date request is present and is a previous date
  if ($_GET['date'] && strtotime($_GET['date']) < strtotime('today')) {
    $logTab = '';
    $targetTab = 'hidden';
    $logBtn = 'active';
    $targetBtn = '';
  } else {
    $logTab = 'hidden';
    $targetTab = '';
    $logBtn = '';
    $targetBtn = 'active';
  }
} else {
  $logTab = 'hidden';
  $targetTab = '';
  $logBtn = '';
  $targetBtn = 'active';
}

if (isset($_REQUEST['diet'])) {
  $diet = new Diet();

  if (isset($_GET['date'])) {
    $attributes = $diet->query->from($diet->table)
      ->where('id', '=', $_REQUEST['diet'])
      ->where('start_date', '<=', date_format(date_create($_GET['date']), "Y-m-d"))
      ->where('end_date', '>=', date_format(date_create($_GET['date']), "Y-m-d"))
      ->get();
  } else {
    $attributes = $diet->query->from($diet->table)
      ->where('id', '=', $_REQUEST['diet'])
      ->where('start_date', '<=', date("Y-m-d"))
      ->where('end_date', '>=', date("Y-m-d"))
      ->get();
  }

  if ($attributes != null) {
    $diet->fill($attributes);
    $meals = $diet->meals();
  } else {
    $meals = [];
  }
} else {
  $meals = AuthenticationHelper::getUser()->userDiet()[0]->diet()->meals();
}
?>

<body class="font-sans antialiased">
  <div class="app">
    <div class="bg-gray-50 min-h-screen">
      <div class="flex relative isolate py-6 px-6 lg:px-8 min-h-full justify-center">
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
              <div>Meals</div>
            </h2>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <?php if (isset($_REQUEST['date'])) : ?>
              <div id="datepicker" inline-datepicker data-date="<?php echo $_REQUEST['date']; ?>" class="w-full"></div>
            <?php else : ?>
              <div id="datepicker" inline-datepicker data-date="<?php echo date("m/d/Y"); ?>" class="w-full"></div>
            <?php endif; ?>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <nav class="relative z-0 flex shadow rounded-xl overflow-hidden" aria-label="Tabs" role="tablist">
              <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white dark:hs-tab-active:border-b-blue-600 relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-400 <?php echo ($logBtn); ?>" id="log-bar" data-hs-tab="#log" aria-controls="log" role="tab">
                Meal Log
              </button>
              <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white dark:hs-tab-active:border-b-blue-600 relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-400 <?php echo ($targetBtn); ?>" id="target-bar" data-hs-tab="#goals" aria-controls="goals" role="tab">
                Meal Targets
              </button>
            </nav>

            <div class="mt-3">
              <div id="log" class="<?php echo $logTab; ?>" role=" tabpanel" aria-labelledby="log-bar">
                <div class="rounded-xl shadow-xl overflow-hidden bg-white hover:shadow-lg mt-1">
                  <?php foreach (AuthenticationHelper::getUser()->mealLog() as $m) : ?>
                    <div class="group relative flex gap-x-6 p-4 items-center hover:bg-gray-50 transition ease-in-out">
                      <?php if ($m->meal()->type == 'Breakfast') : ?>
                        <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-orange-100 group-hover:bg-orange-600 transition ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-orange-600 group-hover:fill-orange-200 transition ease-in-out" viewBox="0 0 640 512">
                            <path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2H248.4c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48H542.8c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32z" />
                          </svg>
                        </div>
                      <?php elseif ($m->meal()->type == 'Lunch') : ?>
                        <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-green-100 group-hover:bg-green-600 transition ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-green-600 group-hover:fill-green-200 transition ease-in-out" viewBox="0 0 640 512">
                            <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 352h8.2c32.3-39.1 81.1-64 135.8-64c5.4 0 10.7 .2 16 .7V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM320 352H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H360.2C335.1 449.6 320 410.5 320 368c0-5.4 .2-10.7 .7-16l-.7 0zm320 16a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zM496 288c8.8 0 16 7.2 16 16v48h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H496c-8.8 0-16-7.2-16-16V304c0-8.8 7.2-16 16-16z" />
                          </svg>

                        </div>
                      <?php elseif ($m->meal()->type == 'Dinner') : ?>
                        <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-blue-100 group-hover:bg-blue-600 transition ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-blue-600 group-hover:fill-blue-200 transition ease-in-out" viewBox="0 0 448 512">
                            <path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                          </svg>

                        </div>
                      <?php endif; ?>
                      <div>
                        <p class="text-gray-600"><?php echo $m->meal()->description ?> <?php echo $m->meal()->type ?> (<?php echo $m->diet()->name ?>)</p>
                        <a href="/my/pin" class="font-semibold text-gray-900">
                          <?php echo $m->meal()->name ?>
                          <span class="absolute inset-0"></span>
                          <div class="font-normal">
                            <?php echo date("F j, Y", strtotime($m->time_of_consumption)); ?>
                          </div>
                          <div class="font-normal">
                            <?php echo date("h:i:s A", strtotime($m->time_of_consumption)); ?>
                          </div>
                        </a>
                      </div>

                    </div>

                  <?php endforeach; ?>
                </div>
              </div>

              <div id="goals" class="<?php echo $targetTab; ?>" role="tabpanel" aria-labelledby="target-bar">
                <!-- Select diet -->
                <div class="relative">
                  <select data-hs-select='{
      "hasSearch": true,
      "searchPlaceholder": "Search Diets...",
      "searchClasses": "block w-full text-md shadow rounded-xl focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
      "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
      "placeholder": "Select diet...",
      "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
      "toggleClasses": "mt-4 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white rounded-xl shadow text-start text-md focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 font-medium",
      "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-xl overflow-hidden overflow-y-auto shadow-2xl",
      "optionClasses": "py-2 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-xl focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
      "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
    }' class="hidden" id="dietSelector">
                    <?php foreach (AuthenticationHelper::getUser()->userDiet() as $diet) : ?>
                      <option value="<?php echo $diet->id ?>" data-hs-select-option='{"icon": ""}' <?php if (isset($_REQUEST['diet']) && $_REQUEST['diet'] == $diet->id) echo "selected"; ?>>
                        <?php echo $diet->diet()->name; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>

                  <div class="absolute top-1/2 end-3 -translate-y-1/2">
                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m7 15 5 5 5-5" />
                      <path d="m7 9 5-5 5 5" />
                    </svg>
                  </div>
                </div>
                <div class="rounded-xl shadow-xl overflow-hidden bg-white hover:shadow-lg mt-4">
                  <?php foreach ($meals as $m) : ?>
                    <div class="group relative flex gap-x-6 p-4 items-center hover:bg-gray-50 transition ease-in-out">
                      <?php if ($m->type == 'Breakfast') : ?>
                        <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-orange-100 group-hover:bg-orange-600 transition ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-orange-600 group-hover:fill-orange-200 transition ease-in-out" viewBox="0 0 640 512">
                            <path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2H248.4c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48H542.8c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32z" />
                          </svg>
                        </div>
                      <?php elseif ($m->type == 'Lunch') : ?>
                        <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-green-100 group-hover:bg-green-600 transition ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-green-600 group-hover:fill-green-200 transition ease-in-out" viewBox="0 0 640 512">
                            <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 352h8.2c32.3-39.1 81.1-64 135.8-64c5.4 0 10.7 .2 16 .7V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM320 352H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H360.2C335.1 449.6 320 410.5 320 368c0-5.4 .2-10.7 .7-16l-.7 0zm320 16a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zM496 288c8.8 0 16 7.2 16 16v48h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H496c-8.8 0-16-7.2-16-16V304c0-8.8 7.2-16 16-16z" />
                          </svg>

                        </div>
                      <?php elseif ($m->type == 'Dinner') : ?>
                        <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-blue-100 group-hover:bg-blue-600 transition ease-in-out">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-blue-600 group-hover:fill-blue-200 transition ease-in-out" viewBox="0 0 448 512">
                            <path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                          </svg>

                        </div>
                      <?php endif; ?>
                      <div>
                        <p class="text-gray-600"><?php echo $m->description ?> <?php echo $m->type ?></p>
                        <a href="/my/pin" class="font-semibold text-gray-900">
                          <?php echo $m->name ?>
                          <span class="absolute inset-0"></span>
                        </a>
                      </div>
                      <div class="flex flex-none items-center justify-center ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 group-hover:text-gray-600 transition ease-in-out">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>

                      </div>
                    </div>
                  <?php endforeach; ?>
                  <?php if ($meals == []) : ?>
                    <div class="group relative flex gap-x-6 p-4 items-center ">
                      <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-red-100 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-red-600 " viewBox="0 0 448 512">
                          <path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                        </svg>

                      </div>
                      <div>
                        <p class="text-gray-600">Whoops</p>
                        <span class="font-semibold text-gray-900">
                          It appears you have no meals which coincide with this date and diet.
                          <span class="absolute inset-0"></span>
                        </span>
                      </div>

                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Access the inline date picker instance
      var datepickerElement = document.getElementById('datepicker');

      setTimeout(function() {
        var datepicker = datepickerElement.datepicker;
        const selector = HSSelect.getInstance('#dietSelector');
        selector.on('change', (val) => {
          updateURLDiet(val);
        });

        // Check if the datepicker object is available
        if (datepicker) {
          // Listen to date changes
          datepicker.element.addEventListener('changeDate', function(event) {
            var selectedDate = event.detail.date;
            console.log(selectedDate.toUTCString());
            updateURLDate(selectedDate);
          });
        } else {
          console.error('Datepicker object not found. Check Flowbite initialization.');
        }
      }, 1000);

      function updateURLDiet(selectedDiet) {
        var urlParams = new URLSearchParams(window.location.search);
        urlParams.set('diet', selectedDiet);
        window.history.replaceState({}, '', '?' + urlParams.toString());
        window.location.reload();
      }

      function updateURLDate(selectedDate) {
        var urlParams = new URLSearchParams(window.location.search);
        urlParams.set('date', formatDate(selectedDate));
        window.history.replaceState({}, '', '?' + urlParams.toString());
        window.location.reload();
      }

      function formatDate(date) {
        var month = String(date.getMonth() + 1).padStart(2, '0'); // Month is zero-based
        var day = String(date.getDate()).padStart(2, '0');
        var year = date.getFullYear();

        return month + '/' + day + '/' + year;
      }
    });
  </script>
</body>

</html>