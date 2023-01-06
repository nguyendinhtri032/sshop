<?php

namespace App\Http\Livewire\shop;

use Livewire\Component;
use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\Support\Facades\DB;
class Listcart extends Component
{ 
    
    public $updateCart;
    public $cartItems = [];
    protected $listeners = ['cartUpdated' => '$refresh'];
    public $quantity=[];
    
    public function render()
    {
        $this->cartItems = \Cart::getContent();

        return view('livewire.shop.listcart');
    }
    public function removeCart($id)
    {
        \Cart::remove($id);

    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');
    }
    public function updateCart($id, $res)

    {
        $result =  DB::table('product')->join('promotion','product.IDpromotion', '=', 'promotion.IDpromotion')->where('product.IDproduct',$id)->first();
      
       if($this->quantity[$id]<=0){
            \Cart::remove($id);
            
        $this->emit('cartUpdated');

        
        }else{
        
            \Cart::update($id, [
                'quantity' =>  $this->quantity[$id] - $res
                
            ]);
            
        $this->emit('cartUpdated');
        }
    }
    public function addToCart($id)
    {
        $result =  DB::table('product')->join('promotion','product.IDpromotion', '=', 'promotion.IDpromotion')->where('product.IDproduct',$id)->first();
      
         \Cart::add([
            'id' => $result->IDproduct,
            'name' => $result->name,
            'price' => $result->price - $result->deduction,
            'quantity' => 1,
            'size' => $result->size,
            'image' => $result->defaultimage,

        ]);
 
       // return redirect()->route('cart.list');
    }

    public function addAmountToCart($id, $amount)
    {
        $result =  DB::table('product')->join('promotion','product.IDpromotion', '=', 'promotion.IDpromotion')->where('product.IDproduct',$id)->first();
            
         \Cart::add([
            'id' => $result->IDproduct,
            'name' => $result->name,
            'price' => $result->price - $result->deduction,
            'quantity' => $amount,
            'size' => $result->size,
            'image' => $result->defaultimage,

        ]);
    }
   

}
