<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
class UpdateProfile extends Component
{
    public $username;
    public $password;
    public $fullname;
    public $password_confirmation;
    public $birthday;
    public $number_telephone;
    public $address;
    protected $rules = [
        'username'=>'required|string|min:5',
        'password'=>'required|min:5|confirmed',
        'fullname'=> 'required|string',
        'number_telephone' => 'required|alpha_num',
        'address' => 'required|string',
        'birthday' => 'required|before:today',
    ];
    public function render()
    {
        return view('livewire.shop.update-profile',[
            'user' => DB::table('users')->where('username',session()->get('username'))->first(),
       
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function updateInfo(){
        
        if(DB::table('users')->where('username',session()->get('username'))->update(['fullname' => $this->fullname,'number_telephone'=>$this->number_telephone,'address'=>$this->address, 'birthday'=>$this->birthday])){
            $this->addError('field1', 'Update infomation successful 🐧');
        }
        else
        $this->addError('field1', 'Error update infomation');


    }
    public function updatePassword(){
   
        if(DB::table('users')->where('username',session()->get('username'))->update(['password' => Hash::make($this->password)])){
            $this->addError('field2', 'Update password successful 🐧');
        }
        else
        $this->addError('field2', 'Error update password ');
    }

}
