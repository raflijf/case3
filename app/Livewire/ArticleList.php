<?php

namespace App\Livewire;

use Livewire\Component;

class ArticleList extends Component
{
    public $count = 10;
    public function getOtherPost() {
        $this->count += 10;
    }

    public function render()
    {
        return view('livewire.article-list');
    }
}
