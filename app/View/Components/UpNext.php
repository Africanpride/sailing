<?php

namespace App\View\Components;

use Closure;
use App\Models\Edition;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class UpNext extends Component
{
    /**
     * Create a new component instance.
     */

    public $upcomingEdition;
    public $today;


    public function __construct()
    {
        // Get the current date
        // $this->today = date('Y-m-d');
        // Find the first instance of an Edition where startDate is greater than today's date
        // $this->upcomingEdition = Edition::where('startDate', '>', $this->today)
        //     ->orderBy('startDate', 'asc')
        //     ->first();

        // Find the first instance of an Edition where startDate is greater than today's date
        $this->upcomingEdition = Edition::where('startDate', '>', now())
            ->orderBy('startDate', 'asc')
            ->first();
            
            // $this->upcomingEdition= Edition::where('startDate', '>', now())
            // ->orWhere('acronym','fdi')
        // ->first();
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
            'upcomingEdition' => $this->upcomingEdition,
            'editionTitle' => $this->editionTitle,
        ]);
    }
}
