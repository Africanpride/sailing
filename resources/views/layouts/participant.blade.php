<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {!! SEOMeta::generate() !!}
        {{-- {!! OpenGraph::generate() !!} --}}
        {!! Twitter::generate() !!}

        <link href="{{ asset('images/favicon/apple-touch-icon.png') }}" rel="apple-touch-icon" sizes="180x180">
        <link type="image/png" href="{{ asset('images/favicon/favicon-32x32.png') }}" rel="icon" sizes="32x32">
        <link type="image/png" href="{{ asset('images/favicon/favicon-16x16.png') }}" rel="icon" sizes="16x16">
        <link href="{{ asset('images/favicon/site.webmanifest') }}" rel="manifest">
        <link href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" rel="mask-icon" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net" rel="preconnect">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            if (typeof(Storage) !== "undefined") {
                if(localStorage.getItem('dark_mode') && localStorage.getItem('dark_mode') == 'true'){
                    document.documentElement.classList.add('dark');
                }
            }
        </script>
        <!-- Styles -->
        @livewireStyles


    </head>

    <body>
        <div class="overflow-x-hidden font-sans text-gray-900 antialiased dark:bg-firefly-900 dark:text-gray-100">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>

</html>
