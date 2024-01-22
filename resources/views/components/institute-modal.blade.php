@props(['formAction' => false])

<div>
    <div class=" ease-out transition-all mx-auto">

        <div
            class="relative flex flex-col bg-white border shadow-sm overflow-hidden
             dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] ">
            @if ($formAction)
                <form wire:submit="{{ $formAction }}" enctype="multipart/form-data"
                >
                    @csrf
            @endif
            <div class="p-4 sm:p-10 overflow-y-auto">
                <div class="mb-6 text-center">
                    <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                        @if (isset($title))
                            {{ $title }}
                        @endif
                    </h3>
                </div>

                <div class="space-y-4">

                    {{ $content }}

                </div>
            </div>

            <div
                class="flex justify-between items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">

                {{ $buttons }}
            </div>
            @if ($formAction)
                </form>
            @endif
        </div>
    </div>
</div>
