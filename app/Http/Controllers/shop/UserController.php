<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;
class UserController extends Controller
{
    function index(){
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return view('shop.layouts.profile',[
                'user' => DB::table('users')->where('username',session()->get('username'))->first(),
                'orders' => DB::table('order')->where('username',session()->get('username'))->get()
            ]);
        } else {
            return redirect()->route('login');
        }
    }
    function update(){
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return view('shop.layouts.updateprofile',[
                'user' => DB::table('users')->where('username',session()->get('username'))->first()
            ]);
        } else {
            return redirect()->route('login');
        }
    }
}
