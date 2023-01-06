<?php

namespace App\Http\Livewire\shop;

use Livewire\Component;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\AuthException;
use Illuminate\Database\QueryException;
class Login extends Component
{
    public $username, $password, $remember;
    protected $rules = [
        'username'=>'required|string|min:5',
        'password'=>'required|min:5'
    ];
    public function render()
    {
        return view('livewire.shop.login');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function postLogin(){
           
       // $this->validate();

            if (Auth::attempt(['username' => $this->username,
                            'password' => $this->password, 'level' => 0, 'confirm' => 1] , $this->remember)){
                               
                session()->put('username',$this->username);
                return redirect()->route('home');
            }
            elseif(Auth::attempt(['username' => $this->username,
            'password' => $this->password, 'level' => 1,  'confirm' => 1], $this->remember)){
                session()->put('username',$this->username);
                return redirect()->route('admin');
            }

        else{
            $this->addError('field', 'Username or Password is not correct 🐧');
         
        
        }
           
               
             
         
           
    }
}
