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
        $editions = Edition::orderBy('startDate', 'asc')->paginate(5); // Sort by startDate in ascending order
        return view('livewire.editions-list', compact('institutes', 'editions'));
    }
}
