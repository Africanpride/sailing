<x-app-layout>

    <x-backend-page-header model-name="Institutes Editions " description="Create Institute Edition" add-button="false"
        class="mx-2">
        <x-heroicon-o-user-group class="w-5 h-5 text-current" />
    </x-backend-page-header>

    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

        <livewire:create-institute-edition />
    </div>
    <!-- End Card Section -->


    <x-tinymce-dark-mode-script-and-style />


</x-app-layout>

{{-- @livewire('tinymce-dark-mode-script-and-style') --}}
