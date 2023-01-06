<?php

namespace App\Http\Livewire\admin;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierTable extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $selectData = true;
    public $updateData = false;
    public $createData = false;

    public $IDsupplier;
    public $nameSupplier;
    public $number_telephone;
    public $address;

    public $perPage = 3;
    public $search = '';
    public function render()
    {
        return view('livewire.admin.supplier-table',[

            'suppliers' => Supplier::search($this->search)
                ->paginate($this->perPage)
        ]);
    }


    public function resetField()
    {
        $this->IDsupplier="";
        $this->nameSupplier="";
        $this->number_telephone="";
        $this->address="";
    }


    public function showForm()
    {
        $this->selectData = false;
        $this->createData = true;
    }


    public function create()
    {
        $supplier = new Supplier();
        $this->validate([

            'nameSupplier'         => 'required',
            'number_telephone'     => 'required',
            'address'              => 'required',
        ]);

        $supplier->name = $this->nameSupplier;
        $supplier->number_telephone = $this->number_telephone;
        $supplier->address = $this->address;
        $result = $supplier->save();
        $this->resetField();

        $this->selectData = true;
        $this->createData = false;
    }


    public function edit($id)
    {

        $this->selectData = false;
        $this->updateData = true;
        $supplier = Supplier::findOrFail($id);    //select * from category where $this->id = $id

        $this->IDsupplier = $supplier->IDsupplier;
        $this->nameSupplier=$supplier->name;
        $this->number_telephone=$supplier->number_telephone;
        $this->address=$supplier->address;
    }

    public function update($id)
    {

        $supplier = Supplier::findOrFail($id);
        $this->validate([

            'nameSupplier'         => 'required',
            'number_telephone'     => 'required',
            'address'              => 'required',
        ]);


        $supplier->name = $this->nameSupplier;
        $supplier->number_telephone=$this->number_telephone;
        $supplier->address=$this->address;
        $result = $supplier->save();
        $this->resetField();

        $this->selectData = true;
        $this->updateData = false;
    }


    public function delete($id){
       
        $category = Supplier::find($id)->product_linked()->delete();
        $result = Supplier::find($id)->delete();
        
     }
}
