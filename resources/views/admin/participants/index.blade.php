<x-app-layout>


    <x-backend-page-header modelName="Participants" description="List of Participants" add-button="false"
        class="mx-4">
        <x-heroicon-o-question-mark-circle class="w-6 h-6 text-current" />
    </x-backend-page-header>

    <div class="px-4">

        <livewire:users-table />


    </div>

</x-app-layout>
