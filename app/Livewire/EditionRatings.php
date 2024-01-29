<?php

namespace App\Livewire;

use App\Models\Edition;
use App\Models\Rating;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EditionRatings extends Component
{
    public $ratingValue;
    public $comment;
    public Edition $edition;
    public bool $hideForm;
    public $rating;


    protected $rules = [
        'ratingValue' => ['nullable', 'in:1,2,3,4,5'],
        'comment' => 'nullable',
    ];

    public function mount(Edition $edition, Rating $rating)
    {
        $this->edition = $edition;
        $this->rating = Rating::where('rateable_id', $this->edition->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($this->rating  && $this->rating->user_id == Auth::id()) {
            $this->ratingValue = $this->rating->ratingValue;
            $this->hideForm = true;
        }
        // dd($this->rating);
    }



    public function resetForm()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->ratingValue = 1; // Assign a default value of null for an int property
        $this->comment = '';
    }


    public function rate()
    {
        $validatedData = $this->validate();

        $rating = new Rating;
        $rating->user_id = Auth::id();
        $rating->rateable_id = $this->edition->id;
        $rating->ratingValue = $this->ratingValue;
        $rating->comment = $this->comment;
        $rating->status = 1;
        $this->edition->ratings()->save($rating);

        app('flasher')->addSuccess('success', 'Thanks for your Review/Rating');
        $this->hideForm = true;
        return redirect()->route('editions.show', [$this->edition]);
    }

    public function delete($id)
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == Auth::id())) {
            $rating->delete();
        }
    }


    public function updateRating()
    {
        $validatedData = $this->validate();

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // dd($this->rating);
        $rating = Rating::where('user_id', Auth::id())->where('rateable_id', $this->edition->id)->first();


        if (!empty($rating)) {
            $rating->user_id = Auth::id();
            $rating->edition_id = $this->edition->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->update($validatedData);
            } catch (\Throwable $th) {
                throw $th;
            }
            app('flasher')->addSuccess('success', 'Thanks for your Review/Rating');
        } else {
            // dd("We are here");
            $rating = new Rating;
            $rating->user_id = Auth::id();
            $rating->rateable_id = $this->edition->id;
            $rating->ratingValue = $this->ratingValue;
            $rating->comment = $this->comment;
            $rating->status = 1;
            $this->edition->ratings()->save($rating);
            app('flasher')->addSuccess('success', 'Thanks for your Review/Rating');

            try {
                // dd("We are here 2");
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
    public function render()
    {
        // dd("We are here");
        $comments = Rating::where('rateable_id', $this->edition->id)->where('status', 1)->get();
        // dd($comments);
        return view('livewire.edition-ratings', compact('comments'));
    }
}
