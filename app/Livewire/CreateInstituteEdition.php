<?php

namespace App\Livewire;

use App\Models\Edition;
use Livewire\Component;
use App\Models\Institute;
use Livewire\WithFileUploads;

class CreateInstituteEdition extends Component
{
    use WithFileUploads;
    public $instituteId;
    public $title;
    public $slug;
    public $theme;
    public $acronym;
    public $overview;
    public $about;
    public $introduction;
    public $banner;
    public $startDate;
    public $endDate;
    public $seo;
    public $active;
    public $price;
    public $institutes;
    public Institute $institute;

    public function mount() {
        $this->institutes = Institute::get();
    }

    public function save()
    {

        dd($this->instituteId);
        // Validation logic (customize as needed)
        $this->validate([
            'title' => 'required|min:2|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'price' => 'required|numeric',
            // Add more validation rules as needed
        ]);

        // Create a new Edition
        Edition::create([
            'institute_id' => $this->instituteId,
            'title' => $this->title,
            'slug' => $this->slug,
            'theme' => $this->theme,
            'acronym' => $this->acronym,
            'overview' => $this->overview,
            'about' => $this->about,
            'introduction' => $this->introduction,
            'banner' => $this->banner,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'seo' => $this->seo,
            'active' => $this->active,
            'price' => $this->price,
        ]);

        // Optionally, you can add a flash message or redirect to another page
        session()->flash('success', 'Edition created successfully!');
        return redirect()->route('your.route.name'); // Replace with your actual route name
    }

    public function render()
    {
        return view('livewire.create-institute-edition');
    }
}
