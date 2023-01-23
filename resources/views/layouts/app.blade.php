<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ladrillos Mochica</title>

    <!-- Tailwind CSS Link -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
  </head>
  <body class="bg-gray-100 text-gray-800">
    <!-- Document body -->
    <nav class="flex py-5 bg-purple-500 text-white">
      <div class="w-1/2 px-12 mr-auto">
      <p class="text-2xl font-bold">Ladrillos Mochica S.A.C</p>
      </div>
      <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">

      </ul>
    </nav>
    @yield('content')

  </body>
</html>
