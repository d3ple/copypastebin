<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CopyPastebin</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ URL::asset('images/favicon/site.webmanifest') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body class="">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
