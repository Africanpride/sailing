<?php

namespace App\Livewire;

use App\Models\Publication;
use Livewire\Component;

class ArticleDisplay extends Component
{
    public Publication $publication;
    public int $likeCount;

    public $count = 0;
    public function increment()
    {
        $this->likeCount++;
        $this->publication->like = $this->likeCount;
        $this->publication->save();

    }


    public function mount(Publication $publication)
    {
        $this->publication = $publication;
        $this->likeCount = $publication->like;
    }

    public function render()
    {
        return view('livewire.article-display');
    }
}
