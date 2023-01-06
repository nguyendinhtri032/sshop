<?php

namespace App\Http\Livewire\admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $selectData=true;
    public $updateData=false;
    public $createData=false;
    public $nameCategory;
    public $idCategory;
    public $edit_nameCategory;

    public $perPage=3;
    public $search='';
    public function render()
    {
        return view('livewire.admin.category-table',[
            'categories' => Category::search($this->search)
                            ->paginate($this->perPage)
        ]);
    }

    public function resetField(){
        $this->nameCategory="";
        $this->idCategory = "";
        $this->edit_nameCategory="";
    }


    public function showForm(){
        $this->selectData=false;
        $this->createData=true;
    }

    public function create(){
        $category = new Category();
        $this->validate([

            'nameCategory' => 'required'
        ]);

        $category->nameCategory= $this->nameCategory;
        $result = $category->save();
        $this->resetField();

        $this->selectData= true;
        $this->createData = false;
    }


    public function edit($id){

        $this->selectData= false;
        $this->updateData = true;
        $category = Category::findOrFail($id);    //select * from category where $this->id = $id
       
        $this->idCategory = $category->IDcategory;
       $this->edit_nameCategory = $category->nameCategory;
    }

    public function update($id){
       
       

        $category = Category::where('IDcategory', $id);
        
        $this->validate([

            'edit_nameCategory' => 'required'
        ]);

        $result = $category->update(['nameCategory'=>$this->edit_nameCategory]);
        $this->resetField();

       $this->selectData= true;
    $this->updateData = false;
    }


    public function delete($id){
       
       $category = Category::find($id)->product_linked()->delete();
       $result = Category::find($id)->delete();
       
    }
}
