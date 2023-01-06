<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateFormRequest;
use App\Models\Category as ModelsCategory;
use Category;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class CategoryController extends Controller
{
    
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function dele($id){
         $cate = ModelsCategory::find($id)->product_linked->toArray();

     }
    public function index()
    {
        
        return view('admin.category.list',[
            'title' => "Category"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add',['title'=>'Thêm danh mục']);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
  
   
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
    public function destroy(Request $request)
    {
        $result = $this->categoryService->destroy($request);
        if($result){
            return response()->json([
                'error'=> false,
                'message' => 'Xóa thành công',
            ]);
        }

        return response()->json([
            'error'=> true
        ]);
    }
}
