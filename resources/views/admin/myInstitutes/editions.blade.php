<x-app-layout>
    <x-backend-page-header model-name="Editions " description="Institute Editions List" add-button="false" class="mx-4">
        <x-heroicon-o-user-group class="w-5 h-5 text-current" />
    </x-backend-page-header>


    <div class="flex justify-between items-center gap-x-4 px-4">

        <x-button class="w-auto" type="button">
            <div onclick="Livewire.dispatch('openModal', { component: 'create-institute-edition' })"
                class="gap-x-3 flex items-center justify-center ">
                <x-lucide-book-open-check class="w-4 h-4 text-current" />
                {{ __('Add New Edition For an edition') }}
            </div>
        </x-button>
        {{-- <x-button class="w-full" type="button">
            <a href="#" class="gap-x-3 flex items-center justify-center ">
                <x-lucide-film class="w-4 h-4 text-current" />
                {{ __('Add Prep-Video for Mother edition') }}
            </a>
        </x-button> --}}
    </div>
<livewire:editions-list />

</x-app-layout>
