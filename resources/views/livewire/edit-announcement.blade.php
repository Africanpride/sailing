<div>
    <x-institute-modal formAction="editAnnouncement">

        <x-slot name="title">
            <div class="absolute top-3 right-3 cursor-pointer">
                <div
                    class="cursor-pointer delay-200  duration-500 bg-red-50 dark:bg-red-500/10 transition-colors dark:hover:bg-red-500/20  hover:bg-red-100  grid h-8 place-items-center rounded-full w-8">
                    <x-heroicon-o-x-circle class="w-6 h-6 text-red-500" wire:click="$dispatch('closeModal')" />
                </div>
            </div>
            <div class=" text-md ">Add New Announcement </div>
        </x-slot>
        <x-slot name="content">


            <div class="space-y-4">

                <div class="">
                    <x-label for="title" value="{{ __('Title') }}" />
                    <x-input id="title" type="text"
                        class="mt-1 block w-full dark:bg-firefly-900 dark:border-gray-700 dark:text-gray-400"
                        wire:model.live="title" autocomplete="title" placeholder="Title" />
                    <x-input-error for="title" class="mt-2" />
                </div>

                <div class="">
                    <textarea wire:model.live="body" id="accouncementBody"
                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm dark:bg-firefly-900 dark:border-gray-700 dark:text-gray-400"
                        rows="3" placeholder="Announcement content"></textarea>


                    <x-input-error for="body" class="mt-2" />
                </div>

                <div class="flex justify-between items-center gap-4">
                    {{-- @if ($image)
                        <div>
                            <img class="block  w-[3.375rem] aspect-square rounded-full ring-2 ring-white dark:ring-firefly-900"
                                src={{ $image->temporaryUrl() }} alt="{{ __('temporary file name') }}">
                        </div>
                    @endif --}}

                    <div class="block w-full">
                        <label for="small-file-input"
                            class=" font-medium text-gray-700 dark:text-gray-300 text-xs text-[0.7rem] flex justify-start">Add
                            Announcement Image</label>
                        <input wire:model.live="image" type="file"
                            class="flex-auto block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400
                                file:bg-transparent file:border-0
                                file:bg-gray-100 file:mr-4
                                file:py-2 file:px-4
                                dark:file:bg-gray-700 dark:file:text-gray-400">
                        @error('image')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
                <div class="flex flex-col  space-y-4">
                    {{-- @if ($icon)
                        <div class="block w-full">
                            <img class=" aspect-auto w-full ring-2 ring-white dark:ring-firefly-900"
                                src={{ $icon->temporaryUrl() }} alt="{{ __('temporary file name') }}">
                        </div>
                    @endif --}}

                    <div class="block w-full">
                        <label for="small-file-input"
                            class=" font-medium text-gray-700 dark:text-gray-300 text-xs text-[0.7rem] flex justify-start">Add
                            Announcement icon</label>

                        <input wire:model.live="icon" type="file"
                            class="flex-auto block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400
                                file:bg-transparent file:border-0
                                file:bg-gray-100 file:mr-4
                                file:py-2 file:px-4
                                dark:file:bg-gray-700 dark:file:text-gray-400">
                        @error('icon')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
            </div>
        </x-slot>

        <x-slot name="buttons">
            <x-reset-button type="reset" class="rounded bg-red-500" wire:click="$dispatch('closeModal')">Cancel
            </x-reset-button>


            <button type="submit" wire:click="editAnnouncement"
                class="py-2.5 px-4 inline-flex w-full justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                {{ __('Update Announcement') }}
            </button>

        </x-slot>

    </x-institute-modal>

</div>
