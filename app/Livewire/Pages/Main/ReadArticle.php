<?php

namespace App\Livewire\Pages\Main;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Computed;


class ReadArticle extends Component
{
    public $slug = '';
    public function mount($slug) {
        $this->slug = $slug;
    }

    #[Computed]
    public function read() {
        return Article::where('slug', $this->slug)->firstOrFail();
    }

    public function delete($slug) {
        $target = Article::where('slug', $slug)->first();
        if ($target->user->id !=  me()->id) {
            return $this->redirect('/', navigate: true);
        }
        $target->delete();
        return $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.main.read-article');
    }
}
