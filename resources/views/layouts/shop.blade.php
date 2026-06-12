<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OwnHub')</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @include('components.theme-init')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-shell">
    @include('components.alerts')
    @include('components.announcement-bar')
    @include('components.main.navbar')
    @include('components.command-palette')

    <main>
        @yield('content')
    </main>

    @include('components.main.footer')

    @stack('scripts')
</body>
</html>
