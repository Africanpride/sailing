<?php

namespace App\Livewire;

use App\Models\Edition;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class DeleteEdition extends ModalComponent
{

    public Edition $edition;

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function mount(Edition $edition)
    {
        $this->edition = $edition;
    }

    public function deleteEdition()
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
        }

        $this->edition->delete();
        app('flasher')->addSuccess('success', 'Edition ' .  $this->edition->title  . ' Deleted successcully!');

        return redirect()->route('editions');
    }

    public function render()
    {
        return view('livewire.delete-edition');
    }
}
