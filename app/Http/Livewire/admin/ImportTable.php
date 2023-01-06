<?php

namespace App\Http\Livewire\admin;

use App\Models\Images;
use App\Models\Import;
use App\Models\ImportDetail;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class ImportTable extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $selectData = true;
    public $updateData = false;
    public $createData = false;

    public $importDetails = [];
    public $suppliers = [];
    public $products = [];
    public $IDsupplier;
    public $date;
    public $IDimport;

    public $perPage = 3;
    public $search = '';


    public function mount(){
        $this->products = Product::all();
        $this->suppliers = Supplier::all();
        $this->importDetails =[
            ['IDproduct' => '', 'amount' => 1, 'price'=>1]
        ];
    }

    public function addImportDetail()
    {
        $this->importDetails[] = ['IDproduct' => '', 'amount' => 1, 'price'=>1];
    }

    public function removeImportDetail($index)
    {
        unset($this->importDetails[$index]);
        $this->importDetails = array_values($this->importDetails);
    }
    public function render()
    {
        
        return view('livewire.admin.import-table',[
            'imports' => Import::where('status', 1)
            ->paginate($this->perPage)
        ]);
    }


    public function resetField()
    {
        
        $this->importDetails =[
            ['IDproduct' => '', 'amount' => 1, 'price'=>1]
        ];
        $this->suppliers = [];
        $this->products = [];
        $this->IDsupplier = null;
        $this->date=null;
    }



    public function showForm()
    {
        $this->selectData = false;
        $this->createData = true;
    }


    public function create()
    {
        

        $this->validate([

            'IDsupplier' => 'required',
            'date'     => 'required',
        ]);

        $import = new Import();
        $import->date_import = $this->date;
        $import->IDsupplier = $this->IDsupplier;
        $import->status = 1;
        $total=0;
        $amount=0;
        foreach($this->importDetails as $importDetail){
            $total += $importDetail['price'] * $importDetail['amount'];
            $amount += $importDetail['amount'];
        }
        $import->amount=$amount;
        $import->total=$total;
        $result = $import->save();

        $IDimport=Import::latest()->first()->IDimport;

        foreach($this->importDetails as $importDetail){
            $importDetail2 = new ImportDetail();
            $importDetail2->IDimport =  $IDimport;
            $importDetail2->IDproduct = $importDetail['IDproduct'];
            $importDetail2->amount = $importDetail['amount'];
            $importDetail2->price = $importDetail['price'];
            $importDetail2->save();
            $productUpdate = Product::findOrFail($importDetail['IDproduct']);
            $productUpdate->amount = $productUpdate->amount+$importDetail['amount'];
            $productUpdate->save();
        }
        $this->resetField();
        $this->selectData = true;
        $this->createData = false;
    }


    public function edit($id)
    {
       
        $this->selectData= false;
        $this->updateData = true;
        $import = Import::findOrFail($id);
        $this->IDimport = $import->IDimport;    
        $this->IDsupplier = $import->IDsupplier;
        $this->date = $import->date_import;
        $importDetailById = ImportDetail::where('IDimport', $id)->get();
        foreach($importDetailById as $index=>$importDetail){
            $importDetailArr = ['IDproduct' => $importDetail->IDproduct, 'amount' => $importDetail->amount, 'price'=>$importDetail->price];
            $this->importDetails[$index] = $importDetailArr;
        }
       
    }

    public function update($id)
    {
        $import = Import::findOrFail($id);
        $this->validate([

            'IDsupplier' => 'required',
            'date'     => 'required',
        ]);

        
        $import->date_import = $this->date;
        $import->IDsupplier = $this->IDsupplier;
        $import->status = 1;
        $total=0;
        $amount=0;
        foreach($this->importDetails as $importDetail){
            $total += $importDetail['price'] * $importDetail['amount'];
            $amount += $importDetail['amount'];
        }
        $import->amount=$amount;
        $import->total=$total;
        $result = $import->save();

        $importDetailDelete  = ImportDetail::find($id)->delete();


        foreach($this->importDetails as $importDetail){
            $importDetail2 = new ImportDetail();
            $importDetail2->IDimport =  $id;
            $importDetail2->IDproduct = $importDetail['IDproduct'];
            $importDetail2->amount = $importDetail['amount'];
            $importDetail2->price = $importDetail['price'];
            $importDetail2->save();
            $productUpdate = Product::findOrFail($importDetail['IDproduct']);
            $productUpdate->amount = $productUpdate->amount+$importDetail['amount'];
            $productUpdate->save();
        }
        $this->resetField();
        $this->selectData = true;
        $this->updateData = false;
      
    }


    public function delete($id){
       
        
        $import = Import::find($id);
        $import->status = 0;
        $import->save();
     
     }
}
