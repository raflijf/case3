<?php

namespace App\Livewire\Pages\Main;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Computed;
use Flux\Flux;

class Trash extends Component
{

    public $willPermDelete = null;
    #[Computed]
    public function getAllTrashed() {
        $article = Article::onlyTrashed()->where('user_id', me()->id)->get();
        return $article;
    }

    public function restore($id) {
        $target = Article::onlyTrashed()->findOrFail($id);
        $target->restore();
    }
    public function permanentDelete() {
        if ($this->willPermDelete == null) {
            return Flux::toast(
                heading: 'Gagal Menghapus permanen',
                text: 'Ada kesalahan',
            );
        }
        $target = Article::onlyTrashed()->findOrFail($this->willPermDelete);
        $target->forceDelete();
        $this->willPermDelete = null;
    }

    public function initWillPermDelete($id) {
        $this->willPermDelete = $id;
    }

    public function render()
    {
        return view('livewire.pages.main.trash');
    }
}
