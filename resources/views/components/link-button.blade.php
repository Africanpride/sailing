<!-- YourComponent.blade.php -->

@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->merge(['type' => 'submit', 'class' => 'cursor-pointer w-auto px-6 py-2 bg-lime-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-lime-700 hover:shadow-lg focus:bg-lime-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-lime-800 active:shadow-lg transition duration-150 ease-in-out text-center ']) }}>
    {{ $slot }}
</a>

