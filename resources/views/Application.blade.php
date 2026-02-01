<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hotel Management System') }}</title>

    @viteReactRefresh
    @vite(['resources/ts/app.tsx', 'resources/css/app.css']) 
</head>
<body>
    <div id="app"></div>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'baseUrl' => url('/'),
            'user' => Auth::user(),
            'isAdmin' => Auth::check() && Auth::user()->role === 'admin',
        ]) !!};
    </script>
</body>
</html>
