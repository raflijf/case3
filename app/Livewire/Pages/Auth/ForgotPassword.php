<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordShipped;
use App\Models\User;
use App\Models\CustAuth;

class ForgotPassword extends Component
{
    public $email = '';

    public $hasSend = false;

    public function rules() {
        return [
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ]
        ];
    }
    public function messages() {
        return [
            'email.required' => 'Email Wajib diisi',
            'email.regex' => 'Format Email tidak valid',
        ];
    }

    public function send() {
        $this->validate();
        $this->hasSend = true;
        if (!User::where('email',$this->email)->exists()) {
            return;
        }
        $token = CustAuth::setPwResetToken($this->email);
        $url = request()->getSchemeAndHttpHost()."/auth/password/reset/?token=$token";
        Mail::to($this->email)->send(new ForgotPasswordShipped($url));
    }

    public function render()
    {
        return view('livewire.pages.auth.forgot-password')->layout('layouts::auth');
    }
}
