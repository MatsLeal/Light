<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    {{-- <link rel="stylesheet" href="https://unpkg.com/bulmaswatch/darkly/bulmaswatch.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
