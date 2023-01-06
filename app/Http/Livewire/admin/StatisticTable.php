<?php

namespace App\Http\Livewire\admin;

use App\Models\OrderDetail;
use Livewire\Component;

class StatisticTable extends Component
{

    public $selectData = true;
    public $updateData = false;
    public $createData = false;

    public $start;
    public $end;
    public $orderDetails;
    public $totalRevenue=0;
    public $totalProduct=0;
   
    public function render()
    {
        return view('livewire.admin.statistic-table');
    }

    public function resetField()
    {
        
         $this->start = '';
         $this->end='';
         $this->orderDetails='';
         $this->totalRevenue='';
         $this->totalProduct='';
    }

    public function filter(){
        $this->validate([

            'start' => 'required',
            'end'     => 'required',
        ]);
        $this->totalRevenue=0;
        $this->totalProduct=0;
        $this->orderDetails = OrderDetail::select("*")->whereBetween('created_at', [$this->start, $this->end])->get();
        foreach($this->orderDetails as $orderDetail){
            $this->totalRevenue += $orderDetail->price;
            $this->totalProduct += $orderDetail->amountdetail;
        }

    }
}
