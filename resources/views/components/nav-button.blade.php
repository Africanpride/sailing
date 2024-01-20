
<button type="button"
class="border-dashed border-t border-b dark:border-slate-800	 text-left flex gap-y-6 w-full h-full hover:bg-gray-100 p-5 transition-all dark:hover:bg-white/[.075] hs-tab-active:font-semibold hs-tab-active:border-firefly-600 hs-tab-active:text-firefly-600 py-4 px-1 items-center gap-2 border-transparent text-sm  text-gray-500 hover:text-firefly-500 active">
   {{ $icon ?? ' ' }}
    <div>
        <h3 class="block font-bold text-gray-800 dark:text-white">{{ $title ?? 'Button Title' }}</h3>
        <p class="text-gray-600 dark:text-gray-400 text-xs">
           {{ $description ?? " Ensure your account is using a long, random password to stay secure." }}
        </p>
    </div>
</button>
