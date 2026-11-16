<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use App\Models\CustAuth;
use Livewire\Attributes\Url;


class ResetPassword extends Component
{
    public $newPassword = '';
    public $confirmNewPassword = '';

    public $validToken = false;

    #[Url]
    public $token = '';

    public function rules() {
        return [ 
            'newPassword' => [
                'required',
                'min:8',
                'different:oldPassword',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).+$/',
            ],
            'confirmNewPassword' => [
                'required',
                'same:newPassword'
            ]
        ];
    }

    public function messages() {
        return [
            'newPassword.required' => 'Password wajib diisi.',
            'newPassword.min' => 'Password minimal 8 karakter.',
            'newPassword.different' => 'Password baru harus berbeda dari password lama.',
            'newPassword.regex' => 'Password harus mengandung huruf kecil, huruf besar, angka, dan karakter.',

            'confirmNewPassword.required' => 'password wajib diisi.',
            'confirmNewPassword.same' => 'password tidak cocok.',
        ];
    }

    public function resetPw() {
        $this->validate();
        if (!$this->validToken) {
            return;
        }
        $target = CustAuth::getUserPwResetToken($this->token);
        $target->update(['password' => $this->confirmNewPassword]);
        if (me()->isAuthenticated) {
            CustAuth::logout();
        }
        $this->redirect('/login');
    }

    public function mount() {
        $this->validToken = CustAuth::validatePwResetToken($this->token);
    }

    public function render()
    {
        return view('livewire.pages.auth.reset-password')->layout('layouts::auth');
    }
}
