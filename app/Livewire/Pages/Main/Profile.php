<?php

namespace App\Livewire\Pages\Main;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Computed;



class Profile extends Component
{
    #[Computed]
    public function getMyArticles() {
        return Article::latest()->where('user_id', me()->id)->get();
    }

    public function render()
    {
        return view('livewire.pages.main.profile', [
            'count' => Article::where('user_id', me()->id)->count(),
        ]);
    }
}
