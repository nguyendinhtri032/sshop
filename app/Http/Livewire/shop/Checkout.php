<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

use App\Models\User;

use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;
use Mail;
use App\Http\Livewire\shop\Listcart;
class Checkout extends Component
{
    public $cartItems;
    public $pay;
    public $description="";
    protected $rules = [
        'pay' => 'required'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        $this->cartItems = \Cart::getContent();
        return view('livewire.shop.checkout',[
                'info' => DB::table('users')->where('username',session()->get('username'))->first(),
               
            ]);
      
    }
    public function checkout(){
        $this->validate();
        try {
            if(Order::create([
                'total' => \Cart::getTotal(),
                'username' => session()->get('username'),
                'pay' => $this->pay,
                'description' => $this->description,
                'status_order' => 'the shop is preparing'
                ])){
                    $IDorder = DB::getPdo()->lastInsertId();
                    $cartItems = \Cart::getContent();
                    foreach ($cartItems as $item){
                    $res = DB::table('product')->where('IDproduct',$item->id)->value('amount');
                    $temp = $res - $item->quantity ;
                    DB::table('product')->where('IDproduct',$item->id)->update(['amount'=>$temp]);
                    OrderDetail::create([
                        'IDorder' => $IDorder,
                        'price' => $item->price,
                        'amountdetail' =>$item->quantity,
                        'IDproduct'=>$item->id,
                      
                    ]);  

                   }
            $this->addError('field', 'Order Successful 🐧');
            $username = session()->get('username');
            $email = DB::table('users')->where('username',$username)->value('email');
            $name = DB::table('users')->where('username',$username)->value('fullname');
            Mail::send('shop.email.email',[
            'name' => $name, 'total' => \Cart::getTotal() ,
            ], function($send ) use ($email){
            $send->subject('Sport Shop');
            $send->to($email);
            \Cart::clear();

        });
            }
        } catch (QueryException $exception) {
            $this->addError('field', 'Order faild :(( 🐧');
            report($exception);
            return redirect()->back();
        }
    }

}