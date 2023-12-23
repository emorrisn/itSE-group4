<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<link href="/../node_modules/flowbite/dist/flowbite.min.css" rel="stylesheet" />
<script src="/../node_modules/flowbite/dist/datepicker.min.js"></script>
<script src="/../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="/../node_modules/preline/dist/preline.js"></script>

<?php

use App\Helpers\AuthenticationHelper;
use App\Models\UserWorkout;

include_once(__DIR__ . "\..\..\..\Headers\landing.php");

if (isset($_GET['date'])) {
  $date = date_format(date_create($_GET['date']), "Y-m-d");
  $dayNumber = date("N", strtotime($date));
} else {
  $date = date("Y-m-d");
  $dayNumber = date("N");
}

$workout = new UserWorkout();
$workouts = [];

$attributes = $workout->query->from($workout->table)
  ->where('start_date', '<=', $date)
  ->where('completion_date', '>=', $date)
  ->get(false);

foreach ($attributes as $attribute) {
  $new = new UserWorkout();
  $new->fill($attribute);

  if ($new->days != null) {
    $days = explode(",", $new->days);
    if (in_array($dayNumber, $days)) {
      $workouts[] = $new;
    }
  }
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
            <h2 class="flex items-center justify-between gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900 mt-1">
              <div>Workouts</div>
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
            <div class="rounded-xl shadow-xl overflow-hidden hover:shadow-lg transition ease-in-out">
              <?php foreach ($workouts as $workout) : ?>
                <div class="group relative flex gap-x-6 bg-white p-4 items-center hover:bg-gray-50 transition ease-in-out">
                  <?php if ($workout->isComplete()) : ?>
                    <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-teal-100 group-hover:bg-teal-600 transition ease-in-out">
                      <span class="text-teal-600 group-hover:text-teal-200 transition ease-in-out text-lg font-bold"><?php echo $workout->id; ?></span>
                    </div>
                  <?php else : ?>
                    <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-100 group-hover:bg-gray-600 transition ease-in-out">
                      <span class="text-gray-600 group-hover:text-gray-200 transition ease-in-out text-lg font-bold"><?php echo $workout->id; ?>
                    </div>
                  <?php endif; ?>
                  <div>
                    <a href="/view/workout?workout=<?php echo $workout->id; ?>" class="font-semibold text-gray-900">
                      <?php if ($workout->isComplete()) : ?>
                        <span class="text-green-600">Complete: </span>
                      <?php endif; ?>
                      <?php echo $workout->workout()->name; ?>
                      <span class="absolute inset-0"></span>
                    </a>
                    <p class="text-gray-600"><?php echo $workout->workout()->description; ?></p>
                    <p class="text-gray-600"><?php echo $workout->workout()->duration; ?> Mins - <?php echo $workout->workout()->recommended_intensity_range; ?> Intensity</p>
                  </div>
                </div>
              <?php endforeach; ?>

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