<?php

namespace App\View\Components;

use Closure;
use App\Models\Institute;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class InstitutesIntro extends Component
{
    /**
     * Create a new component instance.
     */
    public $institutes;
    public function __construct()
    {
        //
        $this->institutes = Institute::where('acronym', '<>', 'costrad')->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.institutes-intro');
    }
}
