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
  <div id="app">
    @include('layouts.nav')
    <main>
      @yield('content')
    </main>
    @include('layouts.footer')
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
