<?php

namespace App\Livewire;

use Livewire\Component;

class LoginCard extends Component
{
    public $loginUsername = '';
    public $loginPassword = '';
    public $dataDummy = [
        'username' => 'admin',
        'password' => 'password',
    ];

    public function render()
    {
        return view('livewire.login-card');
    }

    public function submit()
    {
        $this->validate([
            'loginUsername' => 'required',
            'loginPassword' => 'required',
        ], [
            'loginUsername.required' => 'Username harus terisi.',
            'loginPassword.required' => 'Password harus terisi.',
        ]);

        if ($this->loginUsername == $this->dataDummy['username'] && $this->loginPassword == $this->dataDummy['password']) {
            session()->put('user', $this->loginUsername);
            return redirect('/beranda');
        }

        $this->addError('login', 'Username atau password salah.');
    }
}
