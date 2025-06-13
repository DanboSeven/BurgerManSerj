<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class Register extends Component
{
    #[Validate('required|string|max:250')]
    public $firstname;

    #[Validate('required|string|max:250')]
    public $lastname;

    #[Validate('required|email|max:250|unique:users,email')]
    public $email;

    #[Validate('required|string|max:250')]
    public $location;

    #[Validate('required|string|min:6|confirmed')]
    public $password;

    #[Validate('boolean')]
    public $terms = false;

    public $password_confirmation;

    public function register()
    {
        $this->validate();

        if ($this->terms != 'true') {
            return session()->flash('error', 'You must accept the Terms & Conditions to register!');
        }
       
        User::create([
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'email' => $this->email,
            'location' => $this->location,
            'password' => Hash::make($this->password),
            'last_activity' => now(),
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        Auth::attempt($credentials);

        session()->flash('message', 'You have successfully registered & logged in!');
 
        return $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.register')->title('Burgerman Serj - Register');
    }
}