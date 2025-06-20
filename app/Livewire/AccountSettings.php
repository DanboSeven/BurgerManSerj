<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountSettings extends Component
{
    public $ToggleHideName;
    public $ToggleHideLocation;
    public $privacyActive = 0;
    public $passwordActive = 0;
    public $emailActive = 1;
    public $email;
    
    public function mount()
    {
        $this->ToggleHideName = auth()->user()->hide_full_name;
        $this->ToggleHideLocation = auth()->user()->hide_location;
        $this->email = auth()->user()->email;
    }

    public function changeEmail()
    {
        $this->validate([
        'email' => [
            'required',
            'email',
            'max:250',
            Rule::unique('users', 'email')->ignore(auth()->id()),
        ],
    ]);

        $user = auth()->user();
        $user->email = $this->email;
        $user->save();
    
        session()->flash('success_email', 'Email Address changed successfully!');
    }

    #[Validate('required')]
    public $current_password;

    #[Validate('required|string|min:6|confirmed')]
    public $password;

    public $password_confirmation;

    public function changePassword()
    {
        $this->emailActive = 0;
        $this->passwordActive = 1;
        $this->privacyActive = 0;
        $this->validate();

        if (!Hash::check($this->current_password, auth()->user()->password)) {
            session()->flash('error_pw', 'Your current password is incorrect!');
            return;
        }

        $user = auth()->user();
        $user->password = Hash::make($this->password);
        $user->save();
    
        session()->flash('success_pw', 'Password changed successfully!');
    }

    public function updatedToggleHideName($value) {
        $this->ToggleHideName = $value;
        $user = auth()->user();
        $user->hide_full_name = $value;
        $user->save();
        $this->emailActive = 0;
        $this->passwordActive = 0;
        $this->privacyActive = 1;
        if ($value == 0) {
            session()->flash('success_privacy', 'You have updated your privacy settings to show your last name across the website');
        } else {
            session()->flash('success_privacy', 'You have updated your privacy settings to hide your last name across the website');
        }
    }

    public function updatedToggleHideLocation($value) {
        $this->ToggleHideLocation = $value;
        $user = auth()->user();
        $user->hide_location = $value;
        $user->save();
        $this->emailActive = 0;
        $this->passwordActive = 0;
        $this->privacyActive = 1;
        if ($value == 0) {
            session()->flash('success_privacy', 'You have updated your privacy settings to show your location across the website');
        } else {
            session()->flash('success_privacy', 'You have updated your privacy settings to hide your location across the website');
        }
    }

    public function render()
    {
        return view('livewire.account-settings')->title('Burgerman Serj - Account Settings');
    }
}
