<button {{ $attributes->merge(['type' => 'button', 'class' => 'py-2 px-3 my-3 w-full inline-flex justify-center items-center gap-2  border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-red-800  transition']) }}>
    {{ $slot }}
</button>
