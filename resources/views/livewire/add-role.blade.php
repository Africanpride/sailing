<x-roles-modal formAction="addRole">
    <x-slot name="title">
        <div class="absolute top-3 right-3 cursor-pointer">
            <div
                class="cursor-pointer delay-200  duration-500 bg-red-50 dark:bg-red-500/10 transition-colors dark:hover:bg-red-500/20  hover:bg-red-100  grid h-8 place-items-center rounded-full w-8">
                <x-heroicon-o-x-circle class="w-6 h-6 text-red-500" wire:click="$dispatch('closeModal')" />
            </div>
        </div>
        Add New Role

    </x-slot>

    <x-slot name="content">

        <input wire:model.live="name" id="name" type="text"
            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
            placeholder="Role Name">
        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <textarea wire:model.live="description" id="description"
            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
            rows="3" placeholder="Role Description"></textarea>
        @error('description')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="permission">
                Add Permissions
            </label>
            <div class="w-full grid grid-cols-2 gap-2 text-gray-900 dark:text-gray-100">
                @foreach (App\Models\Permission::all() as $permission)
                    <div class="flex justify-start items-center space-x-2">

                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                            type="checkbox" name="permission[]" wire:model.blur="permission"
                            value="{{ $permission->id }}" id="permission-{{ $permission->id }}">

                        <label for="permission-{{ $permission->id }}" class=" text-sm leading-5  capitalize">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('permission')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

    </x-slot>

    <x-slot name="buttons">
        <x-reset-button wire:click="$dispatch('closeModal')">Cancel</x-reset-button>

        <x-submit-button>Save Role</x-submit-button>

    </x-slot>
</x-roles-modal>
