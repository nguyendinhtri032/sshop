<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\shop\ProductController;
use Illuminate\Auth\Middleware\Authenticate;

use App\Http\Controllers\shop\UserController;
use App\Http\Controllers\shop\CartController;
use App\Http\Livewire\shop\Search;
use App\Http\Livewire\shop\Listcart;

use App\Http\Livewire\shop\Register;
use App\Http\Controllers\shop\PasswordResetController;

use App\Http\Livewire\shop\HistoryDetail;
use Illuminate\Support\Facades\DB;

use App\Models\OrderDetail;


use Illuminate\Foundation\Auth\EmailVerificationRequest;
 
use Illuminate\Http\Request;


///admin///

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ImportController;
use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductAdminController;
use App\Http\Controllers\admin\PromotionController;
use App\Http\Controllers\admin\StatisticController;
use App\Http\Controllers\admin\SupplierController;


    Route::get('shop/auth/register', function(){
        return view('shop.auth.register');
    });
 
    Route::get('shop/auth/login', function(){
        return view('shop.auth.login');
    })->name('login');
    
    Route::post('shop/auth/forget', [PasswordResetController::class,'sendMail']);
    Route::get('shop/auth/forget', [PasswordResetController::class,'index']);
    Route::get('shop/auth/reset-password/{token}', [PasswordResetController::class,'viewreset']);
    
    Route::post('shop/auth/reset-password/{token}', [PasswordResetController::class,'reset']);


//Route::put('reset-password/{token}', 'ResetPasswordController@reset');
    
    Route::get('register/verify/{code}', [Register::class,'verify']);

    Route::get('profile', [UserController::class, 'index'])->name('profile');
    
    Route::get('update-profile', [UserController::class, 'update']);


    

    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('home', [HomeController::class,'index']);
    Route::get('shop', [HomeController::class,'index']);
    
   Route::get('product', [ProductController::class,'index'])->name('product'); //list product
  //  Route::get('search', [Search::class,'render']); //list product
    
    Route::get('product/{id}', [ProductController::class,'detail']); //detail
    
   
    
 //  Route::get('cart', [Cart::class,'render']); 
    
  
    Route::get('add-to-cart/{id}', [Listcart::class,'addToCart']);
    
    Route::get('product/add-to-cart/{id}/{amount}', [Listcart::class,'addAmountToCart']);

    Route::get('cart',function(){
        return view('shop.layouts.cart');
    })->name('cart');

    Route::get('promotion/{id}',[Promotion::class,'index']);

    Route::get('checkout',function(){
        return view('shop.layouts.checkout');
    
    });
    Route::get('order-detail/{id}', function($id){
        return view('shop.layouts.order-details',[
            'orderdetails' => DB::table('order_details')->join('product','order_details.IDproduct','product.IDproduct')->where('IDorder',$id)->get()
        ]);
    });




    ////////////admin/////////////
    
Route::prefix('admin')->group(function () {
   
    Route::get('/', [MainController::class, 'index'])->name('admin');
   
    Route::get('logoutadmin', [MainController::class, 'logout'])->name('logoutadmin');
   

    #Product


     Route::get('products/list',[ProductAdminController::class, 'index'])->name('products');
    


    #Category
        Route::get('categories/list',[CategoryController::class, 'index'])->name('categories');

    #Promotion

        Route::get('promotions/list',[PromotionController::class, 'index'])->name('promotions');


    #Supplier

       
        Route::get('supplier/list',[SupplierController::class, 'index'])->name('suppliers');

    #Order
       
        Route::get('order/list',[OrderController::class, 'index'])->name('orders');

    #Import
       
        Route::get('import/list',[ImportController::class, 'index'])->name('imports');

    #Statistic
        Route::get('statistic/bytime',[StatisticController::class, 'index'])->name('statistics');
});