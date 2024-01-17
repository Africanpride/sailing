<a href="{{ $url }}"
   class="font-bold uppercase dark:text-white hover:text-firefly-500
   {{ request()->is($url)   ? 'dark:text-yellow-500 hover:dark:text-firefly-400' : 'hover:dark:text-firefly-400' }}">
   {{ $slot }}
</a>
