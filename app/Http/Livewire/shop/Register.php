<?php

namespace App\Http\Livewire\shop;

use Livewire\Component;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Exceptions\AuthException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
class Register extends Component
{
    public $username;
    public $password;
    public $fullname;
    public $password_confirmation;
    public $birthday;
    public $number_telephone;
    public $address;
    public $email;
   
    protected $rules = [
        'username'=>'required|string|min:5',
        'password'=>'required|min:5|confirmed',
        'fullname'=> 'required|string',
        'number_telephone' => 'required|alpha_num',
        'address' => 'required|string',
        'birthday' => 'required|before:today',
        'email' => 'required|email'
    ];
    public function render()
    {
        return view('livewire.shop.register');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store()
    {
        $this->validate(); 

            try {
                $confirmation_code = Str::random(15);
                if(User::create([
                    'username' => $this->username,
                    'password' => Hash::make($this->password),
                    'fullname' => $this->fullname,
                    'email' => $this->email,
                    'number_telephone' => $this->number_telephone,
                    'address' => $this->address,
                    'birthday' => $this->birthday,
                    'level' => 0
                    ,'confirm' => 0,
                    'confirmation_code' => $confirmation_code,
                ])){
                   
                    Mail::send('shop.email.confirm',[
                        'name' => $this->fullname, 'confirmation_code' => $confirmation_code,
                        ], function($send ) {
                        $send->subject('Sport Shop');
                        $send->to($this->email);
                });
                $this->addError('field', 'please verify your email');

                }
            } catch (QueryException $exception) {
                $this->addError('field', $exception);
                report($exception);
                return redirect()->back();
            }
    }
    public function verify($code)
    {
        $user = User::where('confirmation_code', $code);

        if ($user->count() > 0) {
            $user->update([
                'confirm' => 1,
                'confirmation_code' => null
            ]);
            $notification_status = 'Bạn đã xác nhận thành công';
        } else {
            $notification_status ='Mã xác nhận không chính xác';
        }

        return redirect(route('login'))->with('status', $notification_status);
    }
}
