<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'College of Sustainable Transformation & Development') }}</title>

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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    {{-- @livewireStyles --}}
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

</head>

<body
    class="font-sans text-gray-900 dark:text-gray-100 antialiased dark:bg-firefly-900 overflow-x-hidden scrollbar-thin
scrollbar-thumb-firefly-800 scrollbar-track-gray-300 overflow-y-scroll ">

    <x-cookie />
    <div class="grid md:grid-cols-12 gap-2">
        <div class="md:col-span-2 w-full relative">
            <!-- Navigation -->
            <x-navigation />
            <!-- End Navigation -->
        </div>

        <div class="md:col-span-10 w-full overflow-x-hidden">

            <!-- Content -->
            <div class="w-full  min-h-screen ">
                <!-- ========== HEADER ========== -->
                <x-app-header />
                <!-- Sidebar Toggle -->
                <x-sidebar-toggle />
                <!-- End Sidebar Toggle -->
                <!-- ========== END HEADER ========== -->
                {{ $slot }}
                <!-- Footer -->
                <x-footer />
                <!-- End Footer -->
            </div>
            <!-- End Content -->

        </div>


    </div>

    <x-all-modals />
    @stack('modals')

    @livewire('wire-elements-modal')
    {{-- @livewireScripts --}}



    @stack('scripts')

</body>

</html>
