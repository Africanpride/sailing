@props(['type' => false])

<button {{ $attributes->merge(['type' => $type, 'class' => 'py-2 px-3 my-3 w-full inline-flex justify-center items-center gap-2  border border-transparent font-semibold bg-slate-500 text-white hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-slate-800  transition']) }}>
    {{ $slot }}
</button>
