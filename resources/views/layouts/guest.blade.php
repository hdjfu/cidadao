<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="/img/icon/favicon.png" type="image/x-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.google.com/specimen/Roboto">
        <link href="/fonte" rel="stylesheet" />

        <!-- Scripts -->
        
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/app.js" defer=""></script>
    </head>
    <body>
        <div class="main">
            {{ $slot }}
        </div>
    </body>
</html>
