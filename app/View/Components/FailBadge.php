<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FailBadge extends Component
{
    /**
     * Create a new component instance.
     */

 // show add button or not // public String $icon = '<x-heroicon-o-ellipsis-vertical class="w-6 h-6 text-current" />';

    public function __construct(
        // public string $type,
        public string $message = "Hello World" ,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fail-badge');
    }
}
