<div>
    <form wire:click.prevent="application">
        @php
            $edition = $institute->editions()->latest()->first();
        @endphp
        <div class="mt-8 grid grid-cols-1 gap-3">
            <x-link-button class=" uppercase">
                Apply to {{ $edition->title }}
            </x-link-button>

        </div>
    </form>
</div>
