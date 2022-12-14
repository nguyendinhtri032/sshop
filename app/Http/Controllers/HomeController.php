<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Product;

use App\Models\Category;

use App\Models\User;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('shop.layouts.main',[
            'products' => DB::table('product')->join('promotion','product.IDpromotion', '=', 'promotion.IDpromotion')->join('category','product.IDcategory', '=', 'category.IDcategory')->where('amount','>',0)->orderByDesc('IDproduct')->limit(5)->get(),
            'categories' =>DB::table('category')->get(),
            'promotions' => DB::table('promotion')->get(),
            'bestsellers'=> DB::table('order_details')
            ->leftJoin('product','product.IDproduct','=','order_details.IDproduct')->join('promotion','product.IDpromotion','promotion.IDpromotion')
            ->select('product.IDproduct','product.name','order_details.IDproduct', 'product.defaultimage','promotion.namePromotion','product.price','deduction',
                 DB::raw('SUM(order_details.amountdetail) as total'))
            ->groupBy('product.IDproduct','order_details.IDproduct','product.name', 'product.defaultimage','promotion.namePromotion','product.price','deduction')
            ->orderBy('total','desc')
            ->limit(6)
            ->get()
 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testmail()
    {
        $name = session()->get('username');
        $email = DB::table('users')->where('username',$name)->value('email');
        Mail::send('shop.email.email',[
            'name' => $name, 'mail' => $email
        ], function($send ) use ($email){
            $send->subject('Sport Shop');
            $send->to($email);
        });
       
    }

}
