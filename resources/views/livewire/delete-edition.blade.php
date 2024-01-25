<x-roles-modal formAction="deleteEdition">
    <x-slot name="title">
        Delete Confirmation
    </x-slot>

    <x-slot name="content">
        <div class="text-current dark:text-white text-md">
            Are you sure you want to delete <span class="text-red-500 text-bold"> {{ $edition->title }}</span>?

        </div>

    </x-slot>

    <x-slot name="buttons">
        <x-reset-button wire:click="$dispatch('closeModal')" type='reset'>Cancel</x-reset-button>

 <x-delete-button type="submit">Delete Edition </x-delete-button>



    </x-slot>
</x-roles-modal>
