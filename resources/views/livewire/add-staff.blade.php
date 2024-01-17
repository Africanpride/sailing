<x-user-modal formAction="addStaff">
    <x-slot name="title">
        <div class="absolute top-3 right-3 cursor-pointer">
            <x-heroicon-o-x-circle class="w-6 h-6 text-red-500" wire:click="$dispatch('closeModal')" />
        </div>
        Add New Staff
    </x-slot>

    <x-slot name="content">

        <div class="grid grid-cols-2 gap-x-4">
            <div>
                <input wire:model.live="firstName" id="firstName" type="text"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-firefly-500 focus:ring-firefly-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                    placeholder="First Name" required autocomplete="firstName">
                @error('firstName')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

            </div>
            <div>
                <input wire:model.live="lastName" id="lastName" type="text"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-firefly-500 focus:ring-firefly-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                    placeholder="Last Name" required autocomplete="lastName">
                @error('lastName')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

            </div>
        </div>
        <div>
            {{-- <label for="hs-leading-icon" class="block text-sm font-medium mb-2 dark:text-white">Email address</label> --}}
            <div class="relative">
                <input wire:model.live="email" type="text" id="hs-leading-icon" name="hs-leading-icon"
                    class="py-3 px-4 pl-11 block w-full border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                    placeholder="Staff email Address" required autocomplete="email">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                    </svg>
                </div>
            </div>
            @error('email')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        </div>
@if (!$resetPassword)
<div class=" w-full">
    <div class="mt-4">

        <x-input id="password" class="block mt-1 w-full" type="password" wire:model.live="password" required
            autocomplete="password" placeholder="enter password" />
        @error('password')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
</div>

@endif
        <div class=" w-full mt-4 text-sm dark:text-white space-y-3 ">

            {{-- <div class="italic ">{{__('Note: Staff would be sent an email to reset their password')}}</div> --}}
            <div class="grid space-y-3">
                <div class="relative flex items-start">
                    <div class="flex items-center h-5">
                        <input id="hs-checkbox-delete" name="hs-checkbox-delete" type="checkbox"
                            wire:model.live='resetPassword'
                            class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            aria-describedby="hs-checkbox-delete-description">
                    </div>
                    <label for="hs-checkbox-delete" class="ml-3">
                        <span class="block text-sm font-semibold text-gray-800 dark:text-white">Staff to create own password</span>
                        <span id="hs-checkbox-delete-description"
                            class="block text-sm text-gray-600 dark:text-gray-500 italic ">{{ $resetPassword ? 'Staff would be emailed to create password.' : 'Tick here to enable Staff create password.' }}</span>
                    </label>
                </div>

                <div class="relative flex items-start">
                    <div class="flex items-center h-5">
                        <input id="hs-checkbox-archive" name="hs-checkbox-archive" type="checkbox"
                            wire:model.live='active'
                            class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            aria-describedby="hs-checkbox-archive-description">
                    </div>
                    <label for="hs-checkbox-archive" class="ml-3">
                        <span class="block text-sm font-semibold text-gray-800 dark:text-white">Pre-Activate this account</span>
                        <span id="hs-checkbox-archive-description"
                            class="block text-sm text-gray-600 dark:text-gray-500 italic ">{{ $active ? 'Staff Account would be pre-activated.' : 'Tick here to pre-activate staff account' }}</span>
                    </label>
                </div>
                @error('active')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            </div>


        </div>

        @if (\Spatie\Permission\Models\Role::count() > 0)
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-firefly-500 text-sm font-bold my-3" for="role">
                    {{ __('Assign Role to staff') }}
                </label>
                <div class="w-full grid grid-cols-5 gap-2 text-gray-900 dark:text-gray-100">
                    @foreach (Spatie\Permission\Models\Role::all() as $role)
                        <div class="flex justify-start items-center space-x-2">

                            <input class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                type="checkbox" name="{{ $role->name }}" wire:model.live="roles"
                                wire:key="{{ $role->id }}"
                                value="{{ $role->id }}" id="role-{{ $role->id }}">

                            <label for="role-{{ $role->id }}" class=" text-sm leading-5  uppercase">
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('role')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

        @endif
    </x-slot>

    <x-slot name="buttons">
        <x-reset-button type="reset" class="rounded bg-red-500" wire:click="$dispatch('closeModal')">Cancel
        </x-reset-button>
        <button wire:click="addStaff"
            class="py-2.5 px-4 inline-flex w-full justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-firefly-500 text-white hover:bg-firefly-600 focus:outline-none focus:ring-2 focus:ring-firefly-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
            Create New Staff
        </button>
    </x-slot>
</x-user-modal>
