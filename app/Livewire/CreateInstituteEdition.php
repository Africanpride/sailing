<?php

namespace App\Livewire;

use App\Models\Edition;
use Livewire\Component;
use App\Models\Institute;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\Renderless;

class CreateInstituteEdition extends ModalComponent
{
    use WithFileUploads;
    public $institute_id;
    public $title;
    public $slug;
    public $theme;
    public $acronym;
    public $overview;
    public $about;
    public $body;
    public $introduction;
    public $banner;
    public $startDate;
    public $endDate;
    public $seo;
    public $active;
    public $price = " ";
    public $institutes = [];
    public $institute;
    public $selectedInstituteName;


    protected static array $maxWidths = [

        '5xl' => 'max-w-2xl md:max-w-xl lg:max-w-3xl xl:max-w-5xl',

    ];


    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount()
    {
        $this->institutes = Institute::all();
    }


    public function storeInstituteEdition()
    {

        // Validation logic (customize as needed)
        $validatedData = $this->validate([

            'institute_id' => ['required', 'exists:institutes,id'],
            'title' => ['required', 'unique:editions', 'string', 'min:2', 'max:255'],
            'theme' => ['nullable', 'string', 'min:2', 'max:255'],
            'acronym' => ['nullable', 'string', 'min:2', 'max:255'],
            'overview' => ['nullable', 'string', 'min:2'],
            'about' => ['nullable', 'string', 'min:2'],
            'introduction' => ['nullable', 'string', 'min:2'],
            'banner' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg, webp'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date'],
            'seo' => ['nullable', 'string', 'min:2', 'max:255'],
            'active' => ['nullable', 'boolean'],
            'price' => ['required', 'numeric']

        ]);

        // Exclude 'banner' from the validated data
        $editionData = collect($validatedData)->except('banner')->toArray();

        // Create the Edition model
        $edition = Edition::create($editionData);

        if ($this->banner) {

            $edition->addMedia($this->banner->getRealPath())
                ->usingFileName($this->banner->getClientOriginalName())
                ->toMediaCollection('banner');
        }



        app('flasher')->addSuccess('success', $this->title . ' Created');
        return redirect()->route('editions');
    }



    public function render()
    {
        return view('livewire.create-institute-edition');
    }
}
