<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class DeleteAnnouncement extends ModalComponent
{
    public Announcement $announcement;
    public function mount(Announcement $announcement)
    {
        $this->announcement = $announcement;
    }


    public static function closeModalOnEscape(): bool
    {
        return false;
    }


    public function deleteAnnouncement()
    {

        if(!Auth::check()) {
            app('flasher')->addError('Authentication', 'Authentication and Authorization Required!');
            return redirect()->route('announcements.index');
        }


        $this->announcement->delete();

        app('flasher')->addSuccess('success', 'Announcement Deleted!');
        return redirect()->route('announcements.index');
    }
    public function render()
    {
        return view('livewire.delete-announcement');
    }
}
