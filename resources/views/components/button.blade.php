{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> --}}


<button {{ $attributes->merge(['type' => 'submit', 'class' => 'cursor-pointer w-auto px-6 py-2 bg-firefly-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-firefly-700 hover:shadow-lg focus:bg-firefly-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-firefly-800 active:shadow-lg transition duration-150 ease-in-out']) }}>{{ $slot }}</button>

