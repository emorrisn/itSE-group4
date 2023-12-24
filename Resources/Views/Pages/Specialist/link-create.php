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
              <a href="/specialist/link?table=user&to=workout&item=<?php echo ($item->id) ?>" class="flex items-center gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
              </a>
            </div>
            <h2 class="flex items-center justify-between gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900">
              Search <?php echo ($linkTableName) ?>
            </h2>
            <div class="mt-4">
              <form class="" action="/specialist/link" method="GET">
                <div class="mt-2">
                  <div class="relative mt-2 rounded-xl shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 18.375V5.625ZM21 9.375A.375.375 0 0 0 20.625 9h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5Zm0 3.75a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5Zm0 3.75a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5ZM10.875 18.75a.375.375 0 0 0 .375-.375v-1.5a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5ZM3.375 15h7.5a.375.375 0 0 0 .375-.375v-1.5a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375Zm0-3.75h7.5a.375.375 0 0 0 .375-.375v-1.5A.375.375 0 0 0 10.875 9h-7.5A.375.375 0 0 0 3 9.375v1.5c0 .207.168.375.375.375Z" clip-rule="evenodd" />
                      </svg>

                    </div>
                    <input type="hidden" name="table" value="<?php echo ($linkTableName) ?>" />
                    <input type="hidden" name="to" value="<?php echo ($_GET['to']) ?>">
                    <input type="hidden" name="item" value="<?php echo ($_GET['item']) ?>">
                    <input type="text" name="search" id="search" class="block w-full rounded-xl border-2 py-1.5 pl-9 pr-20 text-gray-900 border-gray-200 placeholder:text-gray-400 focus:border-2 focus:border-blue-400 sm:text-sm sm:leading-6 bg-gray-100 transition ease-in-out" placeholder="Search <?php echo ($linkTableName) ?>">
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <nav class="relative z-0 flex border rounded-xl overflow-hidden dark:border-gray-700" aria-label="Tabs" role="tablist">
              <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white dark:hs-tab-active:border-b-blue-600 relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-400 active" id="bar-with-underline-item-1" data-hs-tab="#bar-with-underline-1" aria-controls="bar-with-underline-1" role="tab">
                Already linked
              </button>
              <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white dark:hs-tab-active:border-b-blue-600 relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-l-gray-700 dark:border-b-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-400" id="bar-with-underline-item-2" data-hs-tab="#bar-with-underline-2" aria-controls="bar-with-underline-2" role="tab">
                To link
              </button>
            </nav>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1">
              <div class="rounded-xl shadow-xl overflow-hidden hover:shadow-lg transition ease-in-out">
                <?php $functionName = $tableName . ucfirst($linkTableName); ?>
                <?php foreach (AuthenticationHelper::getUser()->$functionName() as $r) : ?>
                  <div class="group relative flex flex-col gap-x-6 bg-white p-4 hover:bg-red-100 transition ease-in-out">
                    <?php foreach ($r->fillable as $fill) : ?>
                      <?php if ($fill == 'password') continue; ?>
                      <?php if ($fill == 'created_at') continue; ?>
                      <?php if ($fill == 'updated_at') continue; ?>
                      <?php if (str_contains($fill, 'id')) continue; ?>
                      <a href="/specialist/item/link?table=<?php echo ($tableName); ?>&to=<?php echo ($linkTableName); ?>&item=<?php echo ($r->id); ?>&type=link" class="font-semibold text-gray-900">
                        <?php echo ($fill); ?>: <?php echo ($r->$fill); ?>
                      </a>
                    <?php endforeach; ?>
                    <?php $link  = $r->$linkTableName(); ?>
                    <?php foreach ($link->fillable as $fill) : ?>
                      <?php if ($fill == 'password') continue; ?>
                      <?php if ($fill == 'created_at') continue; ?>
                      <?php if ($fill == 'updated_at') continue; ?>
                      <?php if (str_contains($fill, 'id')) continue; ?>
                      <a href="/specialist/item/link?table=<?php echo ($tableName); ?>&to=<?php echo ($linkTableName); ?>&item=<?php echo ($r->id); ?>&type=link" class="font-semibold text-gray-900">
                        <?php echo ($fill); ?>: <?php echo ($link->$fill); ?>
                      </a>
                    <?php endforeach; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div id="bar-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-2">
              <div class="rounded-xl shadow-xl overflow-hidden hover:shadow-lg transition ease-in-out">
                <?php foreach ($results as $r) : ?>

                  <div class="group relative flex flex-col gap-x-6 bg-white p-4 hover:bg-green-100 transition ease-in-out">
                    <?php foreach ($r->fillable as $fill) : ?>
                      <?php if ($fill == 'password') continue; ?>
                      <?php if ($fill == 'created_at') continue; ?>
                      <?php if ($fill == 'updated_at') continue; ?>
                      <?php if (str_contains($fill, 'id')) continue; ?>
                      <a href="/specialist/item/link?table=<?php echo ($tableName); ?>&to=<?php echo ($linkTableName); ?>&item=<?php echo ($r->id); ?>&type=unlink" class="font-semibold text-gray-900">
                        <?php echo ($fill); ?>: <?php echo ($r->$fill); ?>
                      </a>
                    <?php endforeach; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>