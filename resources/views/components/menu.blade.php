{{-- <a href="{{ route($url , $slug  ?? '') }}"
   {{ $attributes->merge(['class' => 'uppercase font-bold dark:text-white hover:text-yellow-700 bg-gray-200 py-2 px-4 sm:bg-transparent sm:py-0 sm:px-0 text-center rounded-md sm:rounded-none sm:dark:bg-transparent dark:bg-[#0e2a47] ' .
       (request()->routeIs($url) ? ' text-yellow-500 dark:text-yellow-500 hover:dark:text-firefly-400' : 'hover:dark:text-firefly-400')]) }}>
   {{ $slot }}
</a> --}}



<a href="{{ route($url , $slug ?? '') }}"
   {{ $attributes->merge(['class' => 'uppercase font-bold dark:text-white hover:text-yellow-700' .
       (request()->routeIs($url) ? ' text-yellow-500 dark:text-yellow-500 hover:dark:text-firefly-400' : 'hover:dark:text-firefly-400')]) }}>
   {{ $slot }}
</a>
