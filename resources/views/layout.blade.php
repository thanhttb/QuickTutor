<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    {{-- select2 --}}
    <link href="/css/select2.min.css" rel="stylesheet" />
    <script src="/js/select2.min.js"></script>
    {{-- bootstrap-switch --}}
    <link href="/css/bootstrap-switch.min.css" rel="stylesheet">
    <script src="/js/bootstrap-switch.min.js"></script>
    @yield('header')
  </head>
  <body>
    <div class="container">
        @yield('content')
    </div>

    @yield('footer')
  </body>
</html>
