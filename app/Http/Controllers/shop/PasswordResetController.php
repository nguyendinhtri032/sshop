<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordReset;
use Mail;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Notifications\ResetPasswordRequest;
class PasswordResetController extends Controller
{
  
    public function sendMail(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email:filter',
            'username' => 'required|min:5'
        ]);
        $token = Str::random(15);
      $user =DB::table('users')->where('username',$request->username)->where('email',$request->email)->first();
     
      if($user!=null){
       PasswordReset::create([
            'username' => $request->username,
            'email' => $request->email,
            'token' =>  $token
        ]);
        Mail::send('shop.email.reset-password',[
            'name' => $user->fullname,
            'username' => $user->username,
            'token' => $token
            ], function($send  ) use ($user) {
            $send->subject('Sport Shop');
            $send->to($user->email);
    }); 
    $request->session()->flash('success', 'Please check your email');
    return redirect()->back();
      }
      else{
        $request->session()->flash('error', 'Email or Username does not exist');
        return redirect()->back();
      }
    }  
      
    
    public function viewreset($token){
        $reset = DB::table('password_resets')->where('token',$token)->first();
      
        if( $reset!=null){
        return view('shop.auth.resetpassword',['token' => $token]);
        }
        return view('shop.auth.expired');
    }
    public function reset(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|confirmed|min:5',
            
        ]);
        $reset = DB::table('password_resets')->where('token',$request->token)->first();
       if($reset != null){
        
       DB::table('users')->where('username',$reset->username)->update(['password'=> Hash::make($request->password)]);
       DB::table('password_resets')->where('email', $reset->email)->delete(); 
        
       return redirect()->route('login');
       } 
       else
       {
        $request->session()->flash('error', 'Change password fail');
        return redirect()->back();
       }
      
    }
    public function index(){
        return view('shop.auth.forget');
    }
   

}
