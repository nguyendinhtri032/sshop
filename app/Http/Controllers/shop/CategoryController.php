<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return DB::table('category')->get();
    }
    public function destroy($id)
    {
        return DB::table('category')->where('IDcategory',$id)->delete();
    }
    public function update(Request $request, $id)
    {
        return DB::table('category')->where('IDcategory',$id)->update(['name'=>$request->input('name')]);
    }
    public function store(Request $request)
    {
        return DB::table('category')->insert([]);
    }
    public function getProduct($id){
        return DB::table('category')->join('product','product.IDcategory','=','category.IDcategory')->where('IDcategory',$id)->get();
    }
}
