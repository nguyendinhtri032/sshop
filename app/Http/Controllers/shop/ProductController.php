<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Models\Product;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(){    

        return view('shop.layouts.product');
    }
    public function detail($id)
    {
        return view('shop.layouts.productdetail',
        ['products' => DB::table('product')->join('images','product.IDproduct','=','images.IDproduct')->where('product.IDproduct',$id)->get(),
        'promotions' => DB::table('product')->join('promotion','product.IDpromotion', '=', 'promotion.IDpromotion')->where('product.IDproduct',$id)->first(),
        'category' => DB::table('category')->join('product','product.IDcategory','=','category.IDcategory')->where('IDproduct',$id)->first()
        ]) ;
    }
}
