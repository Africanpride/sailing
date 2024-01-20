<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BackendPageHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public $modelName; // name of model in question
    public $description; // text describing activity on model
    public $addButton = false; // show add button or not // public String $icon = '<x-heroicon-o-ellipsis-vertical class="w-6 h-6 text-current" />';

    public function __construct($modelName = 'Header', $description, $addButton)
    {
        $this->modelName = $modelName;
        $this->description = $description;
        $this->addButton = $addButton;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend-page-header');
    }
}
