<?php

namespace App\Http\Livewire\admin;

use App\Models\Promotion;
use Livewire\Component;
use Livewire\WithPagination;

class PromotionTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $selectData = true;
    public $updateData = false;
    public $createData = false;

    public $IDpromotion;
    public $namePromotion;
    public $deduction;
    public $description;


    public $perPage = 3;
    public $search = '';
    public function render()
    {
        return view('livewire.admin.promotion-table', [

            'promotions' => Promotion::search($this->search)
                ->paginate($this->perPage)
        ]);
    }


    public function resetField()
    {
        $this->IDpromotion="";
        $this->namePromotion = "";
        $this->deduction = "";
        $this->description = "";

    }



    public function showForm()
    {
        $this->selectData = false;
        $this->createData = true;
    }


    public function create()
    {
        $promotion = new Promotion();
        $this->validate([

            'namePromotion' => 'required',
            'deduction'     => 'required',
            'description'   => 'required',
        ]);

        $promotion->namePromotion = $this->namePromotion;
        $promotion->deduction = $this->deduction;
        $promotion->description = $this->description;
        $result = $promotion->save();
        $this->resetField();

        $this->selectData = true;
        $this->createData = false;
    }


    public function edit($id)
    {

        $this->selectData = false;
        $this->updateData = true;
        $promotion = Promotion::findOrFail($id);    //select * from category where $this->id = $id

        $this->IDpromotion = $promotion->IDpromotion;
        $this->namePromotion = $promotion->namePromotion;
        $this->deduction = $promotion->deduction;
        $this->description =  $promotion->description;
    }

    public function update($id)
    {

        $promotion = Promotion::findOrFail($id);
        $this->validate([

            'namePromotion' => 'required',
            'deduction'     => 'required',
            'description'   => 'required',
        ]);


        $promotion->namePromotion = $this->namePromotion;
        $promotion->deduction = $this->deduction;
        $promotion->description = $this->description;
        $result = $promotion->save();
        $this->resetField();

        $this->selectData = true;
        $this->updateData = false;
    }


    public function delete($id){
       
        $category = Promotion::find($id)->product_linked()->delete();
        $result = Promotion::find($id)->delete();
        
     }
}
