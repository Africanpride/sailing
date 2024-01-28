<x-app-layout>

    {{-- only Show Ratings to Athenticated users --}}
    @auth
        <livewire:edition-ratings :edition="$edition" />
    @endauth

</x-app-layout>
