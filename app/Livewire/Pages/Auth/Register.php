<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use App\Models\CustAuth;
use App\Models\Exception;
use App\Exceptions\InvalidCredentialException;


class Register extends Component
{
    public $username = '';
    public $email = '';
    public $makePassword = '';  
    public $confirmPassword = '';

     protected function rules(): array
    {
        return [
            'username' => [
                'required',
                'min:3',
                'regex:/^[a-zA-Z0-9_]+$/',
            ],
            'email' => [
                'required',
                'unique:users,email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'makePassword' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^a-zA-Z0-9]).+$/',
            ],
            'confirmPassword' => 'required|same:makePassword',
        ];
    }


    protected function messages(): array
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal 3 karakter.',
            'username.regex' => 'Username hanya boleh menggunakan huruf, angka, dan underscore.',

            'email.required' => 'Email wajib diisi.',
            'email.unique'   => 'Email sudah terdaftar.',
            'email.regex'    => 'Format email tidak valid.',

            'makePassword.required' => 'Password wajib diisi.',
            'makePassword.min' => 'Password minimal 8 karakter.',
            'makePassword.regex' => 'Password harus mengandung huruf kecil, huruf besar, angka, dan karakter.',

            'confirmPassword.required' => 'password wajib diisi.',
            'confirmPassword.same' => 'password tidak cocok.',
        ];
    }


    public function register() {
        $this->validate();
        try {
            $register = CustAuth::register($this->username, $this->confirmPassword, $this->email);
            if ($register == 'SUCCESS') {
                $this->redirect('/login');
            }
        } catch (InvalidCredentialException $e) {
            $this->addError('username', $e->getMessage());
        }
    
    }

    public function render()
    {
        return view('livewire.pages.auth.register')->layout('layouts::auth');
    }
}
