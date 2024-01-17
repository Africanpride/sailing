<?php

namespace App\View\Components;

use Closure;
use App\Models\Institute;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class InstitutesList extends Component
{
    /**
     * Create a new component instance.
     */
    public $firstFour;
    public $lastFour;
    public $nextInstituteBanner;
    public function __construct()
    {

        // Fetch the last 4 objects excluding the one with slug 'costrad'
        $this->firstFour = Institute::where('slug', '<>', 'costrad')->take(4)->get();
        $this->lastFour = Institute::where('slug', '<>', 'costrad')->skip(5)->take(4)->get();
        // $this->nextInstituteBanner = Institute::where('startDate', '>', now())
        //     ->orderBy('startDate', 'asc')
        //     ->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.institutes-list');
    }
}
