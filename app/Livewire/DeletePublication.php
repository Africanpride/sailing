<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class DeletePublication extends ModalComponent
{
    public Publication $publication;
    public function mount(Publication $publication)
    {
        $this->publication = $publication;
    }


    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    protected static array $maxWidths = [

        '5xl' => 'max-w-2xl md:max-w-xl lg:max-w-3xl xl:max-w-5xl',

    ];



    public function deletePublication()
    {

        if (!Auth::check()) {
            app('flasher')->addError('Authentication', 'Authentication and Authorization Required!');
            return redirect()->route('publications-list');
        } else {

            $this->publication->delete();

            app('flasher')->addSuccess('Success', 'Publication Deleted!');
            return redirect()->route('publications-list');
        }
    }


    public function render()
    {
        return view('livewire.delete-publication');
    }
}
