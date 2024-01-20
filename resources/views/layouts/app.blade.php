<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
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

    @livewireScripts
</body>

</html>
