<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<?php

include_once(__DIR__ . "\..\..\Headers\landing.php");
?>

<body class="font-sans antialiased">
  <div class="app">
    <div class="bg-gray-50 min-h-screen">
      <div class="flex relative isolate py-6 px-6 lg:px-8 min-h-full justify-center">
        <div class="gap-y-6 mx-auto w-full py-12 sm:py-0 flex sm:my-auto flex-col sm:justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="-m-1.5 p-1.5 text-lg font-bold tracking-tight flex text-blue-500 hover:text-blue-400 transition ease-in-out">
              <a href="/specialist" class="flex items-center gap-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
              </a>
            </div>
            <h2 class="flex items-center justify-between gap-x-2 text-3xl font-bold leading-9 tracking-tight text-gray-900">
              <?php echo (ucwords($tableName)) ?> Table
              <?php if (in_array($tableName, ["workout", "meal", "diet", "exercise", "food"])) : ?>
                <a href="/specialist/add?table=<?php echo ($tableName) ?>" class="group flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-blue-100 hover:bg-blue-600 transition ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-blue-600 group-hover:fill-blue-200 transition ease-in-out" viewBox="0 0 448 512">
                    <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                  </svg>
                </a>
              <?php endif; ?>
            </h2>
            <div class="mt-4">
              <form class="" action="/specialist/table" method="GET">
                <div class="mt-2">
                  <div class="relative mt-2 rounded-xl shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 18.375V5.625ZM21 9.375A.375.375 0 0 0 20.625 9h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5Zm0 3.75a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5Zm0 3.75a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5ZM10.875 18.75a.375.375 0 0 0 .375-.375v-1.5a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5ZM3.375 15h7.5a.375.375 0 0 0 .375-.375v-1.5a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375Zm0-3.75h7.5a.375.375 0 0 0 .375-.375v-1.5A.375.375 0 0 0 10.875 9h-7.5A.375.375 0 0 0 3 9.375v1.5c0 .207.168.375.375.375Z" clip-rule="evenodd" />
                      </svg>

                    </div>
                    <input type="hidden" name="table" value="<?php echo ($tableName) ?>">
                    <input type="text" name="search" id="search" class="block w-full rounded-xl border-2 py-1.5 pl-9 pr-20 text-gray-900 border-gray-200 placeholder:text-gray-400 focus:border-2 focus:border-blue-400 sm:text-sm sm:leading-6 bg-gray-100 transition ease-in-out" placeholder="Search <?php echo ($tableName) ?>">
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="rounded-xl shadow-xl overflow-hidden hover:shadow-lg transition ease-in-out">
              <?php foreach ($results as $result) : ?>

                <?php if ($tableName == "user" && $result['type'] != "Client") continue; ?>

                <div class="group relative flex flex-col gap-x-6 bg-white p-4 hover:bg-gray-100 transition ease-in-out">

                  <?php foreach ($table->fillable as $fill) : ?>
                    <?php if ($fill == 'password') continue; ?>
                    <?php if ($fill == 'created_at') continue; ?>
                    <?php if ($fill == 'updated_at') continue; ?>
                    <?php if (str_contains($fill, 'id')) continue; ?>
                    <a href="/specialist/item?table=<?= ucfirst($tableName) ?>&item=<?php echo ($result['id']); ?>" class="font-semibold text-gray-900">
                      <?php echo ($fill); ?>: <?php echo ($result[$fill]); ?>
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
</body>

</html>