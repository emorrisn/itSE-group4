<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<link href="/../node_modules/flowbite/dist/flowbite.min.css" rel="stylesheet" />
<script src="/../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="/../node_modules/preline/dist/preline.js"></script>

<?php

use App\Helpers\AuthenticationHelper;

include_once(__DIR__ . "\..\..\Headers\landing.php");
?>

<body class="font-sans antialiased">
  <div class="app">
    <div class="bg-gray-50 min-h-screen">
      <div class="flex relative isolate py-6 px-6 lg:px-8 min-h-full justify-center">
        <div class="gap-y-6 mx-auto w-full py-12 sm:py-0 flex sm:my-auto flex-col sm:justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="-m-1.5 p-1.5 text-lg font-bold tracking-tight flex text-blue-500 hover:text-blue-400 transition ease-in-out">
              <a href="/specialist/table?table=<?php echo ($tableName) ?>" class="flex items-center gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
              </a>
            </div>
            <h2 class="flex items-center justify-between gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900">
              New <?php echo (ucwords($tableName)) ?>
            </h2>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="rounded-xl shadow-xl overflow-hidden hover:shadow-lg transition ease-in-out bg-white">
              <div class="p-4">
                <form class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6" method="POST" action="/specialist/add/submit?table=<?php echo ($tableName); ?>">
                  <?php foreach ($table->fillable as $fill) : ?>
                    <?php if ($fill == 'password') continue; ?>
                    <?php if ($fill == 'created_at') continue; ?>
                    <?php if ($fill == 'updated_at') continue; ?>
                    <?php if ($fill == 'id') continue; ?>
                    <?php if (str_contains($fill, '_id')) continue; ?>

                    <div class="sm:col-span-full">
                      <label for="name" class="block text-sm font-medium leading-6 text-gray-900"><?php echo (ucwords(str_replace('_', ' ', $fill))); ?></label>
                      <div class="mt-2">
                        <?php if (str_contains($fill, 'date')) : ?>
                          <input id="<?php echo ($fill); ?>" name="<?php echo ($fill); ?>" type="date" value="" autocomplete="email" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                        <?php elseif (str_contains($fill, 'comments') || str_contains($fill, 'description')) : ?>
                          <textarea id="<?php echo ($fill); ?>" name="<?php echo ($fill); ?>" type="text" value="" autocomplete="email" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out"></textarea>
                        <?php else : ?>
                          <input id="<?php echo ($fill); ?>" name="<?php echo ($fill); ?>" type="text" value="" autocomplete="email" required class="block w-full rounded-xl border-0 py-1.5 text-gray-900 shadow-sm ring-2 ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6 transition ease-in-out">
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>


                  <div class="sm:col-span-full">
                    <button type="submit" class="flex w-full justify-center rounded-xl bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors ease-in-out">Create</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>