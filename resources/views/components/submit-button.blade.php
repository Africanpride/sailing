<button wire:submit="submit" type="submit" {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2 px-3 my-3 w-full inline-flex justify-center items-center gap-2  border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-blue-800  transition']) }}>
    {{ $slot }}
</button>
