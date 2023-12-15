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
              <div>Personal Trainer</div>
            </h2>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <?php if (AuthenticationHelper::getUser()->trainer_id != null) : ?>
              <div class="shadow-xl rounded-xl p-6 bg-white">
                <div class="text-center">
                  <img class="rounded-full w-32 h-32 mx-auto" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=900&h=900&q=80" alt="Image Description">
                  <div class="mt-2 sm:mt-4">
                    <h3 class="text-sm font-medium text-gray-800 sm:text-base lg:text-lg dark:text-gray-200">
                      <?php echo AuthenticationHelper::getUser()->trainer()->name; ?>
                    </h3>
                    <p class="text-xs text-gray-600 sm:text-sm lg:text-base dark:text-gray-400">
                      <?php echo AuthenticationHelper::getUser()->trainer()->description; ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <div class="shadow-xl rounded-xl p-6 bg-gray-900">
                <div class="text-left">
                  <h3 class="text-4xl font-bold text-red-500 dark:text-gray-200">
                    Whoops,
                  </h3>
                  <p class="text-md font-medium text-gray-100 dark:text-gray-400 mt-1">
                    It appears you don't have an assigned personal trainer.
                    Next time you're in the gym speak to a staff to get you setup!
                  </p>
                </div>
              </div>
            <?php endif; ?>

          </div>
          <?php if (AuthenticationHelper::getUser()->trainer_id != null) : ?>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <div class="group relative flex gap-x-6 rounded-xl shadow-xl bg-white p-4 items-center hover:bg-red-50 transition ease-in-out">
                <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-red-100 group-hover:bg-red-600 transition ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-red-600 group-hover:text-red-200 transition ease-in-out">
                    <path d="M10.375 2.25a4.125 4.125 0 100 8.25 4.125 4.125 0 000-8.25zM10.375 12a7.125 7.125 0 00-7.124 7.247.75.75 0 00.363.63 13.067 13.067 0 006.761 1.873c2.472 0 4.786-.684 6.76-1.873a.75.75 0 00.364-.63l.001-.12v-.002A7.125 7.125 0 0010.375 12zM16 9.75a.75.75 0 000 1.5h6a.75.75 0 000-1.5h-6z" />
                  </svg>
                </div>
                <div>
                  <a href="/reset/my/trainer" class="font-semibold text-gray-900">
                    Leave trainer
                    <span class="absolute inset-0"></span>
                  </a>
                  <p class="text-gray-600">If you find yourself dissatisfied with your current personal trainer, you have the option to choose a different trainer during your next visit to the gym.</p>
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