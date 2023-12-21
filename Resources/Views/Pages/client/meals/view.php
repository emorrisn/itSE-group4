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

$currentMeal = new MealLog();

if (!isset($_GET['meal'])) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}

$attributes = $currentMeal->query->from($currentMeal->table)
  ->where('id', '=', $_GET['meal'])
  ->get();

if ($attributes != null) {
  $currentMeal->fill($attributes);
} else {
  $meals = [];
}
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
              <div>Meal</div>
            </h2>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="shadow-xl rounded-xl p-6 bg-white">
              <div class="grid grid-cols-1 gap-x-1 gap-y-1 sm:grid-cols-6">
                <div class="col-span-full text-md font-semibold text-gray-600">
                  <?php echo ($currentMeal->meal()->type); ?>
                </div>
                <div class="col-span-full text-2xl font-semibold">
                  <?php echo ($currentMeal->meal()->name); ?>
                </div>
                <div class="col-span-full">
                  <?php echo ($currentMeal->meal()->description); ?>
                </div>
                <div class="col-span-full">
                  <?php echo ($currentMeal->meal()->caloric_content); ?> Calories
                </div>
                <div class="col-span-full">
                  <?php echo ($currentMeal->meal()->preparation_time); ?> Minutes to prepare
                </div>
                <div class="col-span-full px-4 py-2 bg-gray-200 rounded-xl">
                  <?php echo ($currentMeal->meal()->cooking_instructions); ?>
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