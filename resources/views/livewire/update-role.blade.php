<x-roles-modal formAction="updateRole">
    <x-slot name="title">
        <div class="absolute top-2 right-2 cursor-pointer"   wire:click="$dispatch('closeModal')" >
            <div
                class="cursor-pointer delay-200  duration-500 bg-red-50 dark:bg-red-500/10 transition-colors dark:hover:bg-red-500/20  hover:bg-red-100  grid h-8 place-items-center rounded-full w-8">
                <x-heroicon-o-x-circle class="w-6 h-6 text-red-500"  />
            </div>
        </div>
        Update <span class="text-red-500 capitalize">{{ $role->name }}</span>
    </x-slot>

    <x-slot name="content">

        <input wire:model="name" id="name" type="text"
            class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <textarea wire:model="description" id="description"
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
                @foreach ($permissions as $key => $permission)
                    <div class="flex justify-start items-center space-x-2"
                        wire:key="input-checkbox-{{ $permission->id }}">

                        <input class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                            type="checkbox" value="{{ $permission->id }}" {{-- wire:model.live="rolePermissions.{{ $key }}" --}}
                            wire:model="rolePermissions" name="rolePermissions" value="{{ $permission->id }}"
                            @if (in_array($permission->id, $permissionIds)) checked @endif>

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


        <button type="reset" wire:click="$dispatch('closeModal')"
            class="py-2.5 px-4 inline-flex w-full justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
            Cancel
        </button>

        <x-submit-button>Submit</x-submit-button>

    </x-slot>
</x-roles-modal>
