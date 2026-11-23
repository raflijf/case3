<?php

namespace App\Livewire\Pages\Main;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackShipped;


class Feedback extends Component
{
    public $reasons = [];
    public $email = '';
    public $suggestions = '';

    public $hasSend = false;

    public function rules() {
        return [
            'email' => ['regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
        ];
    }
    public function messages() {
        return [
            'email:regex' => 'Format email tidak valid'
        ];
    }

    public function sendFeedback()  {
        $this->validate();
        if (!$this->reasons && !$this->suggestions) {
            return $this->addError('sending', 'Masukan tidak boleh kosong');
        }
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new FeedbackShipped($this->email, $this->reasons, $this->suggestions));  
        $this->hasSend = true;
    }

    public function render()
    {
        return view('livewire.pages.main.feedback');
    }
}
