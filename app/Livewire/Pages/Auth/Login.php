<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Attributes\Layout;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.pages.auth.login')->layout('layouts::auth');
    }
}
