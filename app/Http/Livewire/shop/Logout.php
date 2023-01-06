<?php

namespace App\Http\Livewire\shop;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Exceptions\AuthException;
class Logout extends Component
{
    public function render()
    {
        return view('livewire.shop.logout');
    }
    public function logout()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken(); 

        return redirect()->route('home');
}
}
