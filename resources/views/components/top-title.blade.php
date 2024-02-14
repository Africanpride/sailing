<div>

    <div class="mx-auto  ">

        <div
            {{ $attributes->merge([
                'class' => 'overflow-hidden relative bg-firefly-50 dark:bg-firefly-900 dark:text-firefly-50
                                inline-block m-2 p-1 rounded-full bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500 shadow-xl',
            ]) }}>
            <div
                class="w-auto text-black px-4 py-2 font-semibold rounded-full bg-white dark:bg-slate-900
            flex justify-center items-center gap-2 dark:text-white text-xs md:text-md">
                {{ $slot }}
                @if (isset($icon))
                    {{ $icon }}
                @else
                    <x-lucide-arrow-right-circle class="dark:text-white  w-5 h-5 " />
                @endif

            </div>
        </div>

        @if (isset($paragraph))
        <div class="text-lg  text-body-color sm:text-xl  leading-normal  px-4">
            {{ $paragraph }}
            </div>
        @else
            <div></div>
        @endif

    </div>
</div>
