<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ChangePassword extends Component
{
    public $oldPassword = '';
    public $newPassword = '';
    public $confirmNewPassword = '';
    
    public function rules() {
        return [ 
            'oldPassword' => [
                'required',
            ],
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
            'oldPassword.required' => 'password wajib diisi.',

            'newPassword.required' => 'Password wajib diisi.',
            'newPassword.min' => 'Password minimal 8 karakter.',
            'newPassword.different' => 'Password baru harus berbeda dari password lama.',
            'newPassword.regex' => 'Password harus mengandung huruf kecil, huruf besar, angka, dan karakter.',

            'confirmNewPassword.required' => 'password wajib diisi.',
            'confirmNewPassword.same' => 'password tidak cocok.',
        ];
    }

    public function change() {
        $this->validate();  
        if (!Hash::check($this->oldPassword, me()->password)) {
            return $this->addError('oldPassword', 'Password salah');
        }
        $newPassword = Hash::make($this->confirmNewPassword);
        User::find(me()->id)->update(['password' => $newPassword]);
        $this->redirect('/profile');
    }

    public function render()
    {
        return view('livewire.pages.auth.change-password')->layout('layouts::auth');
    }
}
