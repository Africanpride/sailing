<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{


    public function __construct
    (
        public $url = '', public $slug = ''
    ){}

    public function render()
    {
        return view('components.menu');
    }
}
