<div class="p-6 font-sans text-gray-900 dark:text-gray-100 antialiased dark:bg-firefly-900">
    <div class="absolute top-2 right-2 cursor-pointer" wire:click="$dispatch('closeModal')">
        <div
            class="cursor-pointer delay-200  duration-500 bg-red-50 dark:bg-red-500/10 transition-colors dark:hover:bg-red-500/20  hover:bg-red-100  grid h-8 place-items-center rounded-full w-8">
            <x-heroicon-o-x-circle class="w-6 h-6 text-red-500"  />
        </div>
    </div>
    <div class=" space-y-4">
        {{-- {{ $edition->id }} --}}
        <div class="gap-x-4 flex items-center justify-start text-sm">
            <span> 1: Bad</span>
            <span> 2: Poor</span>
            <span> 3: OK</span>
            <span> 4: Good</span>
            <span> 5: Excellent</span>
        </div>

        <form wire:submit="updateReview">
            <!-- Rating -->
            <div class="flex flex-row-reverse justify-end items-center">
                <div class="px-5 py-4 uppercase text-sm gap-x-4 ">
                    <span
                        class="inline-flex items-center py-1 px-2 rounded-full text-xs font-medium bg-{{ $ratingValue > 2 ? 'yellow' : 'green' }}-500 text-white">
                        {{ $ratingValue ?? 0 }}</span>


                    {{-- <span>Rate 1 - 5 {{ $edition->title ?? '' }}</span> --}}
                </div>
                @for ($i = 5; $i >= 1; $i--)
                    <input id="hs-ratings-readonly-{{ $i }}" type="radio"
                        class="peer -ms-5 w-5 h-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0"
                        name="hs-ratings-readonly" value="{{ $i }}" wire:model.live="ratingValue">

                    <label for="hs-ratings-readonly-{{ $i }}"
                        class="peer-checked:text-yellow-500 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-500 dark:text-gray-600 px-2">

                        <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>

                    </label>
                @endfor
            </div>

            <textarea wire:model.live="comment"
                class="py-3 px-4 block w-full border-gray-300 rounded-lg text-sm focus:border-firefly-500 focus:ring-firefly-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-950 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                placeholder="Add your Review for {{ $edition->title }}" rows="5"></textarea>
            <!-- End Rating -->

            <div class="flex justify-between items-center gap-x-2">

                <div class="py-4 w-full md:w-3/4 ">
                    <x-button class="w-full ">Submit Rating & Review</x-button>
                </div>
                <div class="py-4 w-full md:w-1/4">
                    <x-button class="w-full bg-red-700 hover:bg-red-500"
                        wire:click.prevent="resetForm">Reset</x-button>
                </div>

            </div>
        </form>
    </div>

</div>
