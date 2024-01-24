<!-- Card Section -->
<div class="max-w-[85rem]  mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
        @forelse ($roles as $role)
            <div class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-firefly-900 dark:border-gray-800">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div
                        onclick="Livewire.dispatch('openModal',
                 {
                    component: 'update-role',
                 arguments: {{ json_encode([$role->id]) }}
                 })"

                        class="flex items-center cursor-pointer"  >
                            <img class="h-[2.375rem] w-[2.375rem] rounded-full"
                                src="https://ui-avatars.com/api/?name={{ $role->name }}?background=fff"
                                alt="{{ $role->name }}">
                            <div class="ml-3">
                                <h3
                                    class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200 capitalize">
                                    {{ $role->name }}
                                </h3>
                            </div>
                        </div>
                        <div class="pl-3 cursor-pointer"

                        onclick="Livewire.dispatch('openModal',
                        {
                           component: 'delete-role',
                        arguments: {{ json_encode([$role->id]) }}
                        })" >
                            <x-heroicon-o-trash class="w-6 h-6 text-red-500" />
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="w-full flex flex-col  space-y-3">
                <img class="h-16 w-16  rounded-full" src="{{ asset('/images/empty.png') }}" alt="Image Description">

                <div>No Role Added Yet</div>
            </div>
        @endforelse

    </div>
    <!-- End Grid -->
</div>
<!-- End Card Section -->
