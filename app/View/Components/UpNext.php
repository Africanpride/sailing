<?php

namespace App\View\Components;

use Closure;
use App\Models\Institute;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class UpNext extends Component
{
    /**
     * Create a new component instance.
     */

     public $upcomingInstitute;
     public $today;


    public function __construct()
    {
        // Get the current date
        // $this->today = date('Y-m-d');
        // Find the first instance of an institute where startDate is greater than today's date
        // $this->upcomingInstitute = Institute::where('startDate', '>', $this->today)
        //     ->orderBy('startDate', 'asc')
        //     ->first();

        // Find the first instance of an institute where startDate is greater than today's date
        // $this->upcomingInstitute = Institute::where('startDate', '>', $this->today)
        //     ->orderBy('startDate', 'asc')
        //     ->first();

        $this->upcomingInstitute = Institute::where('startDate', '>', now())
        ->orWhere('acronym','fdi')
            ->first();
    }

    public $editionTitle = array(
        "Limited edition",
        "Collector's edition",
        "Deluxe edition",
        "Premium edition",
        "Anniversary edition",
        "Exclusive edition",
        "Signature edition",
        "Unique edition"
    );

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.up-next', [
            'upcomingInstitute' => $this->upcomingInstitute,
            'editionTitle' => $this->editionTitle,
        ]);
    }
}
