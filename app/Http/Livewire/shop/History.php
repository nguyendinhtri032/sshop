<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use App\Models\Order;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
class History extends Component
{
    
    use WithPagination;


    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
       return view('livewire.shop.history',[
            'orders'=> DB::table('order')->where('username',session()->get('username'))->paginate(10),
       
        ]);
    
    }
    public function paginationView()
    {
        return 'livewire.shop.custom-pagination-links-view';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
 
}
