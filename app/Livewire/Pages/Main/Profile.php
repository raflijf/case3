<?php

namespace App\Livewire\Pages\Main;

use Livewire\Component;
use App\Models\Article;
use App\Models\User;
use Livewire\Attributes\Computed;


class Profile extends Component
{
    public $username = '';
    public $name = '';
    public $email = '';

    public $disabled = true;

    #[Computed]
    public function getMyArticles() {
        return Article::latest()->where('user_id', me()->id)->get();
    }

    public function mount() {
        $this->username = me()->username;
        $this->name = me()->name;
        $this->email = me()->email;
    }

    protected function rules() {
        return [
            'name' => ['string', 'max:100'],

            'email' => [
                'email',
                'max:255',
                'unique:users,email',
            ],

            'username' => [
                'string',
                'min:3',
                'max:30',
                'regex:/^[a-zA-Z0-9_]+$/',
                'unique:users,username'
            ],
        ];
    
    }

    protected function messages()
    {
        return [
            // Name
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama maksimal 100 karakter.',

            // Email
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'email.unique' => 'Email sudah digunakan.',

            // Username
            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.min' => 'Username minimal 3 karakter.',
            'username.max' => 'Username maksimal 30 karakter.',
            'username.regex' => 'Username hanya boleh menggunakan huruf, angka, dan underscore.',
            'username.unique' => 'Username sudah digunakan.',
        ];
    }


    public function update() {
        $data = [];
        $rules = [];
        if ($this->username != me()->username) {
            $data['username'] = $this->username;
            $rules['username'] = $this->rules()['username'];
        }
        if ($this->name != me()->name) {
            $data['name'] = $this->name;
            $rules['name'] = $this->rules()['name'];
        }
        if ($this->email != me()->email) {
            $data['email'] = $this->email;
            $rules['email'] = $this->rules()['email'];
        }
        
        if (!$data) {
            return;
        }
        $this->disabled = false;
        $this->validate($rules);
        User::profileUpdate($data);
    }

    public function render()
    {
        return view('livewire.pages.main.profile', [
            'count' => Article::where('user_id', me()->id)->count(),
        ]);
    }
}
