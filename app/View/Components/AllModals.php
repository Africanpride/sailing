<?php

namespace App\View\Components;

use Closure;
use App\Models\Institute;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AllModals extends Component
{
    /**
     * The institutes collection.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $institutes;

    /**
     * The flattened array of edition durations.
     *
     * @var array
     */
    public $editionDurations;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Constructor is left empty for now
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.all-modals');
    }
}
