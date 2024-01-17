<a href="{{ route($url) }}"
   class="font-bold uppercase dark:text-white hover:text-yellow-700
   {{ request()->routeIs($url) ? ' text-yellow-500 dark:text-yellow-500 hover:dark:text-firefly-400' : 'hover:dark:text-firefly-400' }}">
   {{ $slot }}
</a>
