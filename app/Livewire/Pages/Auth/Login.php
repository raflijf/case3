<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Attributes\Layout;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\CustAuth;
use Illuminate\Support\Facades\Cookie;
use App\Exceptions\InvalidCredentialException;

class Login extends Component
{
    public $username = '';
    public $password = '';

    protected function rules() {
        return [
            'username' => ['required'],
            'password' => ['required'],
        ];
    }

    protected function messages() {
        return [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ];
    }

    public function login(Request $request) {
        $this->validate();
        $auth = new CustAuth;
        
        try { 
            $login = $auth->login($this->username, $this->password);
            if ($login == 'SUCCESS') {
                return $this->redirect('/', navigate:true);

            }
        } catch (InvalidCredentialException $e) {
            $this->addError('both', $e->getMessage());
        }
 
    }

    public function render()
    {
        return view('livewire.pages.auth.login')->layout('layouts::auth');
    }
}
