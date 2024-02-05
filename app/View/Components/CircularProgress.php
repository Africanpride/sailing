<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CircularProgress extends Component
{
    /**
     * Create a new component instance.
     */
    public $percentage;

    public function __construct($percentage)
    {
        $this->percentage = $percentage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.circular-progress');
    }
}
