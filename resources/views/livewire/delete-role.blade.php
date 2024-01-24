<x-roles-modal formAction="deleteRole">
    <x-slot name="title">
        Delete Confirmation
    </x-slot>

    <x-slot name="content">
        <div class="text-current dark:text-white text-md">
            Are you sure you want to delete <span class="text-red-500 text-bold"> {{ $role->name }}</span>?

        </div>

    </x-slot>

    <x-slot name="buttons">
        <x-reset-button wire:click="$dispatch('closeModal')" type='reset'>Cancel</x-reset-button>

        <button type="submit"
            class="py-2.5 px-4 inline-flex w-full justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
            Delete Role
        </button>



    </x-slot>
</x-roles-modal>
