
  <a href="{{ route($route , $slug ?? '') }}">
    <button type="button" class="py-3 px-4 flex items-center justify-between gap-x-2 text-xs font-medium rounded-lg border w-full border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 uppercase  ">
        {{ $slot }}
        <x-lucide-arrow-right class="w-5 h-5 text-current" />

    </button>
  </a>
