<?php

namespace App\View\Components;

use Closure;
use App\Models\Institute;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class WhatIsCostrad extends Component
{
    /**
     * Create a new component instance.
     */
    public $costrad;
    public function __construct()
    {
        $this->costrad = Institute::whereAcronym('costrad')->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.what-is-costrad');
    }
}
