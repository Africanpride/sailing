<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class EditAnnouncement extends ModalComponent
{
    use WithFileUploads;

    public $title, $body, $image, $icon;
    public Announcement $announcement;

    public function mount(Announcement $announcement)
    {
        $this->announcement = $announcement;
        $this->title = $announcement->title;
        $this->body = $announcement->body;
        $this->image = $announcement->image;
        $this->icon = $announcement->icon;
    }

    public function editAnnouncement()
    {
        // dd($this->announcement->icon);
        $validatedData = $this->validate([
            'title' => 'required|min:2|max:255',
            'body' => 'required|min:2',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'icon' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:3048| nullable',

        ]);

        $this->announcement->update([...$validatedData]);

        // $this->closeModal();

        app('flasher')->addSuccess('success', 'Announcement Updated!');

        if ($this->image) {

            $imageName = $this->image->storeAs('images/announcements', rand(1, 20) . "." . $this->image->getClientOriginalExtension(), 'public');
            $validatedData['image'] = $imageName;
        }

        if ($this->icon) {

            $iconName = $this->icon->storeAs('icons/announcements', rand(1, 20) . "." . $this->icon->getClientOriginalExtension(), 'public');

            $validatedData['icon'] = $iconName;
        }



        return redirect()->route('announcements.index');
    }

    public function render()
    {
        return view('livewire.edit-announcement');
    }
}
