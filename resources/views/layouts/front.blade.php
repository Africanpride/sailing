{{-- <!DOCTYPE html> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}
    {{-- {!! OpenGraph::generate() !!} --}}
    {!! Twitter::generate() !!}

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script>
        if (typeof(Storage) !== "undefined") {
            if(localStorage.getItem('dark_mode') && localStorage.getItem('dark_mode') == 'true'){
                document.documentElement.classList.add('dark');
            }
        }
    </script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    {{-- @livewireStyles --}}
</head>

<body
    class="bg-white dark:bg-firefly-900  scrollbar-thin relative
scrollbar-thumb-firefly-800 dark:scrollbar-thumb-firefly-900 scrollbar-track-gray-300
overflow-y-scroll overflow-x-hidden">


    <x-cookie />
    <x-up-next />
    <x-front-header />

    <div
        class="font-sans text-gray-900 dark:text-gray-100 antialiased dark:bg-firefly-900 overflow-x-hidden ">

        {{ $slot }}
        <x-all-modals />
    </div>

    <x-footer />
    @livewireScripts
    @livewire('wire-elements-modal')
</body>

</html>
