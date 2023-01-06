<?php

namespace App\Http\Livewire\shop;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
class Search extends Component
{
    use WithPagination;
    public $search;
    public $category;
    public $promotion;
    public $supplier;
    public $checkbox;
    public function paginationView()
    {
        return 'livewire.shop.custom-pagination-links-view';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
	
    public function render()
    { 
        
        if($this->checkbox==1){
        return view('livewire.shop.search',[
            'products' => DB::table('product')->join('promotion','product.IDpromotion','=','promotion.IDpromotion')->where([['name', 'like','%'.$this->search.'%'],['IDcategory',$this->category],['IDsupplier',$this->supplier],['promotion.IDpromotion', $this->promotion], ['amount','>',0 ]])->paginate(10),
            'count' =>  DB::table('product')->join('promotion','product.IDpromotion','=','promotion.IDpromotion')->where([['name', 'like','%'.$this->search.'%'],['IDcategory',$this->category],['IDsupplier',$this->supplier],['promotion.IDpromotion', $this->promotion], ['amount','>',0] ])->count(),
            'categories' => DB::table('category')->get(),
            'supplies' => DB::table('supplier')->get(),
            'promotions' => DB::table('promotion')->get(),
        ]);
        updatingSearch();
        
    }
    else
    return view('livewire.shop.search',[
        'products' => DB::table('product')->join('promotion','product.IDpromotion','=','promotion.IDpromotion')->where([['name', 'like','%'.$this->search.'%'],['amount','>',0]])->paginate(10),
        'count' =>  DB::table('product')->join('promotion','product.IDpromotion','=','promotion.IDpromotion')->where([['name', 'like','%'.$this->search.'%'],['amount','>',0]])->count(),
        'categories' => DB::table('category')->get(),
        'supplies' => DB::table('supplier')->get(),
        'promotions' => DB::table('promotion')->get(),
    ]);

    updatingSearch(); }
  

}
