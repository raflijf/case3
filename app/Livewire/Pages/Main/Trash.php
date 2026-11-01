<?php

namespace App\Livewire\Pages\Main;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Computed;

class Trash extends Component
{

    #[Computed]
    public function getAllTrashed() {
        $article = Article::onlyTrashed()->where('user_id', me()->id)->get();
        return $article;
    }

    public function restore($id) {
        $target = Article::onlyTrashed()->findOrFail($id);
        $target->restore();
    }
    public function permanentDelete($id) {
        $target = Article::onlyTrashed()->findOrFail($id);
        $target->forceDelete();
    }

    public function render()
    {
        return view('livewire.pages.main.trash');
    }
}
