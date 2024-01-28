<?php

namespace App\Livewire;

use App\Models\Rating;
use App\Models\Edition;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class ReviewRating extends ModalComponent
{

    public $ratingValue;
    public $comment;
    public Edition $edition;
    public bool $hideForm;
    public Rating $rating;

    public function mount(Edition $edition, Rating $rating)
    {
        $this->edition = $edition;
        $this->rating = Rating::where('rateable_id', $this->edition->id)
            ->where('user_id', Auth::id())
            ->first();
        $this->ratingValue = $this->rating->ratingValue;
        $this->comment = $this->rating->comment;
    }

    protected static array $maxWidths = [

        '5xl' => 'max-w-2xl md:max-w-xl lg:max-w-3xl xl:max-w-5xl',

    ];

    public function resetForm()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->ratingValue = 1; // Assign a default value of null for an int property
        $this->comment = '';
    }

    protected $rules = [
        'ratingValue' => ['nullable', 'in:1,2,3,4,5'],
        'comment' => 'nullable',
    ];


    public function updateReview()
    {
        $validatedData = $this->validate();

        if ($this->rating) {
            $this->rating->update($validatedData);
        }

        app('flasher')->addSuccess('success', 'Thanks for Updating Review/Rating');

        return redirect()->route('editions.show', [$this->edition]);
    }
    public function render()
    {
        return view('livewire.review-rating');
    }
}
