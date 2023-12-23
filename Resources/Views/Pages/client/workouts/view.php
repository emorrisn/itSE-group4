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
              <a href="/my/workouts" class="flex items-center gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
              </a>
            </div>
            <h2 class="flex items-center justify-between gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900 mt-2">
              <div>Workout</div>
            </h2>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="shadow-xl rounded-xl p-6 bg-white">
              <div class="grid grid-cols-1 gap-x-1 gap-y-1 sm:grid-cols-6">
                <div class="col-span-full text-md font-semibold text-gray-600">
                  <?php echo ($workout->targeted_muscle_groups); ?>
                </div>
                <div class="col-span-full text-2xl font-semibold">
                  <?php echo ($workout->name); ?>
                </div>
                <div class="col-span-full">
                  <?php echo ($workout->description); ?> @ <?php echo ($workout->location); ?>
                </div>
                <div class="col-span-full">
                  <?php echo ($workout->duration); ?> Minutes to complete
                </div>
                <div class="col-span-full px-4 py-2 bg-gray-200 rounded-xl">
                  <?php echo ($workout->recommended_intensity_range) ?> Intensity
                </div>
              </div>
            </div>
          </div>
          <?php foreach ($workout->userWorkouts() as $userWorkout) : ?>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <div class="shadow-xl rounded-xl p-6 bg-white">
                <div class="grid grid-cols-1 gap-x-1 gap-y-1 sm:grid-cols-6">
                  <div class="col-span-full text-md font-semibold text-gray-600">
                    Workout Assignment
                  </div>
                  <div class="col-span-full">
                    Started on <?php echo date("F j, Y", strtotime($userWorkout->start_date)); ?> and ends on <?php echo date("F j, Y", strtotime($userWorkout->completion_date)); ?>.
                  </div>
                  <div class="col-span-full px-4 py-2 bg-gray-200 rounded-xl">
                    <?php

                    $days = array(
                      1 => 'Monday',
                      2 => 'Tuesday',
                      3 => 'Wednesday',
                      4 => 'Thursday',
                      5 => 'Friday',
                      6 => 'Saturday',
                      7 => 'Sunday'
                    );

                    $dayNumbers = explode(',', $userWorkout->days);
                    $dayNames = array_map(function ($num) use ($days) {
                      return $days[$num];
                    }, $dayNumbers);

                    echo implode(', ', $dayNames);
                    ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="group relative flex gap-x-6 rounded-xl shadow-xl hover:shadow-lg bg-white p-4 items-center hover:bg-green-50 transition ease-in-out">
              <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-green-100 group-hover:bg-green-600 transition ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600 group-hover:text-green-200 transition ease-in-out">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
              </div>
              <div>
                <a href="/new/workout?workout=<?php echo $workout->id; ?>" class="font-semibold text-gray-900">
                  Record Exercise
                  <span class="absolute inset-0"></span>
                </a>
                <p class="text-gray-600">Start recording your workout as you go</p>
              </div>

            </div>
          </div>
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="grid grid-cols-1 gap-x-1 gap-y-1 sm:grid-cols-6">
              <div class="col-span-full text-md font-semibold text-gray-600">
                Exercises
              </div>
            </div>
          </div>
          <?php foreach ($workout->excercises() as $excercise) : ?>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <div class="shadow-xl rounded-xl p-6 bg-white">
                <div class="grid grid-cols-1 gap-x-1 gap-y-1 sm:grid-cols-6">
                  <div class="col-span-full text-md font-semibold text-gray-600">
                    <?php echo ($excercise->difficulty_level); ?>
                  </div>
                  <div class="col-span-full text-2xl font-semibold">
                    <?php echo ($excercise->name); ?>
                  </div>
                  <div class="col-span-full">
                    <?php echo ($excercise->description); ?>
                  </div>
                  <div class="col-span-full">
                    <?php echo ($excercise->recommended_form_tips); ?>
                  </div>
                  <div class="col-span-full px-4 py-2 bg-gray-200 rounded-xl">
                    <?php echo ($excercise->target_heart_rate_range) ?> BPM Range
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