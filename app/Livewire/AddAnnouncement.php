<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddAnnouncement extends ModalComponent
{
    use WithFileUploads;
    public $title, $body, $icon, $image;

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function storeAnnouncement()
    {

        $validatedData = $this->validate([
            'title' => 'required|min:2|unique:announcements,title',
            'body' => 'required|min:2',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:3048',
        ]);

        // dd($validatedData);
        Announcement::create($validatedData);
        // $uuid = $announcement->uuid;



        if ($this->image) {

            // if ($this->announcement->logo) {
            //     Storage::delete('images/announcements/' . $this->institute->logo);
            // }
            $imageName = $this->image->storeAs('images/announcements', rand(1, 20) . "." . $this->image->getClientOriginalExtension(), 'public');

            $validatedData['image'] = $imageName;
        }

        if ($this->icon) {

            // if ($this->announcement->icon) {
            //     Storage::delete('icons/announcements/' . $this->institute->icon);
            // }
            $iconName = $this->icon->storeAs('icons/announcements', rand(1, 20) . "." . $this->icon->getClientOriginalExtension(), 'public');

            $validatedData['icon'] = $iconName;
        }


        app('flasher')->addSuccess('success', 'Announcement Added Successfully!');
        return redirect()->route('announcements.index');
    }
    public function render()
    {
        return view('livewire.add-announcement');
    }
}
