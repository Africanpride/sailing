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
        $editions = Edition::with('ratings')->orderBy('startDate', 'asc')->paginate(9);
        return view('livewire.editions-list', compact('institutes', 'editions'));
    }
}
