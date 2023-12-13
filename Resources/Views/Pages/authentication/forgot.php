<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<?php
include_once(__DIR__ . "\..\..\Headers\landing.php");
?>

<body class="font-sans antialiased" x-data="{ mobileMenuOpen: false, isColoursVisible: false }" x-init="$nextTick(() => { isColoursVisible = true })">
  <div class="app">
    <div class="bg-gray-50 h-screen">
      <?php
      include_once(__DIR__ . "\..\partials\header.php");
      ?>
      <div class="relative isolate px-6 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
          <div x-show="isColoursVisible" x-transition:enter="transition-opacity ease-in-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-30" class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-blue-100 to-purple-500 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem] transition-opacity ease-in-out duration-1000" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
          </div>
        </div>
        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 flex min-h-full flex-col justify-center">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <p class="text-lg leading-8 text-gray-600 text-center">Should you have forgotten your password, we kindly request that you seek assistance from a staff member at the gym.</p>
          </div>
        </div>
        <div x-show="isColoursVisible" x-transition:enter="transition-opacity ease-in-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-30" class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)] transition-opacity ease-in-out duration-1000" aria-hidden="true">
          <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-yellow-100 to-green-500 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>