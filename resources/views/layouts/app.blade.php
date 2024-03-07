<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Disdik Natuna</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- bootstrap 5.0 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="app" class="poppins">
   <header class="sticky-top">
    @include('layouts.nav')
   </header>
    <main>
      @yield('content')
    </main>
    <footer class="main-footer py-3">
      @include('layouts.footer')
    </footer>
   
  </div>

  <script>
    // Add this script to your page or in a separate JavaScript file
    document.addEventListener('DOMContentLoaded', function() {
      var elements = document.getElementsByClassName('truncate-text-30');

      for (var i = 0; i < elements.length; i++) {
        var text = elements[i].textContent.trim();
        var words = text.split(' ');
        var truncatedText = words.slice(0, 50).join(' ');

        if (words.length > 50) {
          truncatedText += '...'; // Add ellipsis if content is truncated
        }

        elements[i].textContent = truncatedText;
      }
    });
  </script>

  <!-- bootstrap 5.0 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-dsi1h0ucU5Pkppe4lJS6qY8cpgJe7eSxF+qvazOlr06YmK6XcDqe5kMvVO92KqKJ" crossorigin="anonymous"></script>

</body>

</html>
