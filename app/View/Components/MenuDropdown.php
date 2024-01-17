<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public $buttonText;

    public function __construct($buttonText)
    {
        $this->buttonText = $buttonText;
    }

    public function render()
    {
        return view('components.menu-dropdown');
    }
}
