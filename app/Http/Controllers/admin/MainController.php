<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
   

    function index(){
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return view('admin.statistic.bytime', ['title' => 'Page Admin']);
        } else {
            return redirect()->route('login');
        }
    }
    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
