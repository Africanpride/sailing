<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function render()
    {
        return view('components.menu');
    }
}