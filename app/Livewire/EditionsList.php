<?php

namespace App\Livewire;

use App\Models\Edition;
use Livewire\Component;
use App\Models\Institute;

class EditionsList extends Component
{

    public function render()
    {
        $institutes = Institute::all();
        $editions = Edition::paginate(2);
        return view('livewire.editions-list', compact('institutes', 'editions'));
    }
}
