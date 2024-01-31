<?php

namespace App\Livewire;

use App\Models\Edition;
use Livewire\Component;
use App\Models\Institute;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Livewire\Attributes\Renderless;


class UpdateInstituteEdition extends ModalComponent
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
    public Edition $edition;


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

    public function mount(Edition $edition)
    {
        $this->edition = $edition;

        $this->institute_id = $edition->institute_id;
        $this->title = $edition->title;
        $this->slug = $edition->slug;
        $this->theme = $edition->theme;
        $this->acronym = $edition->acronym;
        $this->overview = $edition->overview;
        $this->about = $edition->about;
        $this->body = $edition->body;
        $this->introduction = $edition->introduction;
        $this->startDate = $edition->startDate;
        $this->endDate = $edition->endDate;
        $this->seo = $edition->seo;
        $this->active = $edition->active;
        $this->price = $edition->price;

        // Fetch all institutes
        $this->institutes = Institute::all();

        // Set the selectedInstituteName based on the selected institute_id
        $this->selectedInstituteName = Institute::find($this->institute_id)->name;
    }

    public function resetBanner() {
        $this->reset('banner');

    }

    public function getFormattedStartDateProperty()
    {
        return $this->startDate ? Carbon::parse($this->startDate)->toDateString() : null;
    }

    public function getFormattedEndDateProperty()
    {
        return $this->endDate ? Carbon::parse($this->endDate)->toDateString() : null;
    }

    // protected function generateSlug($title)
    // {
    //     return \Illuminate\Support\Str::slug($title);
    // }

    public function updateInstituteEdition()
    {


        // Validation logic (customize as needed)
        $validatedData = $this->validate([
            'institute_id' => ['required', 'exists:institutes,id'],
            'title' => [
                'required',
                Rule::unique('editions')->ignore($this->edition->id), // Ignore current edition
                'string',
                'min:2',
                'max:255'
            ],
            'theme' => ['nullable', 'string', 'min:2', 'max:255'],
            'acronym' => ['nullable', 'string', 'min:2', 'max:255'],
            'overview' => ['nullable', 'string', 'min:2'],
            'about' => ['nullable', 'string', 'min:2'],
            'body' => ['nullable', 'string', 'min:2'],
            'introduction' => ['nullable', 'string', 'min:2'],
            'banner' => ['nullable','image','max:4048', 'mimes:jpeg,png,jpg,webp'],
            'startDate' => ['required','date'],
            'endDate' => ['required','date'],
            'seo' => ['nullable', 'string', 'min:2', 'max:255'],
            'active' => ['nullable', 'boolean'],
            'price' => ['required', 'numeric']
        ]);


        try {
            // Exclude 'banner' from the validated data
            $editionData = collect($validatedData)->except('banner')->toArray();

            $this->edition->update($editionData);


            if ($this->banner) {

                $this->edition->clearMediaCollection('banner');

                $this->edition->addMedia($this->banner->getRealPath())
                    ->usingFileName($this->banner->getClientOriginalName())
                    ->toMediaCollection('banner');
            }

            app('flasher')->addSuccess('success', $this->title . ' Updated');

            return redirect()->route('editions');
        } catch (\Exception $e) {
            $this->notify('Error Updating Edition: ' . $e->getMessage(), 'error');
        }
    }



    public function render()
    {
        return view('livewire.update-institute-edition');
    }
}
