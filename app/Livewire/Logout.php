<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CustAuth;

class Logout extends Component
{
    public function logout() {
        $logout = CustAuth::logout();
        if ($logout == 'SUCCESS') {
            return $this->redirect('/');
        } 
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
