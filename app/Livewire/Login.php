<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required')]
    public $password;

    #[Validate('boolean')]
    public $remember = false;

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if(Auth::attempt($credentials, $this->remember))
        {
            Auth::user()->update(['last_activity' => now(),]);
            session()->flash('message', 'You have successfully logged in!');
            return $this->redirect('/');
        }
        
        session()->flash('error', 'Your Email Address and/or Password is incorrect!');
    }   
    public function render()
    {
        return view('livewire.login')->title('Burgerman Serj - Login');
    }
}
