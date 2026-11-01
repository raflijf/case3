<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;


class ArticleList extends Component
{
    use WithPagination;
    
    #[Computed]
    public function getAll() {
        return Article::latest()->paginate(15);
    }

    public function render()
    {
        return view('livewire.article-list');
    }
}

