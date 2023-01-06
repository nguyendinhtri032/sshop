<?php

namespace App\Http\Livewire\admin;

use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Supplier;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';


    public $selectData=true;
    public $updateData=false;
    public $createData=false;


    public $photo;
    public $photos = [];

    public $IDproduct;
    public $nameProduct;
    public $category;
    public $supplier;
    public $promotion;
    public $amount=0;
    public $price;
    public $size;
    public $description;
    public $old_image;
    public $old_images = [];
    public $image_detail;
    public $perPage=3;
    public $search='';
    
    public function render()
    {
        return view('livewire.admin.product-table',[

            'products'       => Product::search($this->search)->paginate($this->perPage),
            'categories'    => Category::all(),
            'suppliers'     => Supplier::all(),
            'promotions'    => Promotion::all(),
        ]);
    }


    public function showForm(){
        $this->selectData=false;
        $this->createData=true;
    }

    public function resetField(){
        $this->IDproduct ="";
        $this->nameProduct = "";
        $this->category="";
        $this->supplier="";
        $this->promotion="";
        $this->amount=0;
        $this->price="";
        $this->size="";
        $this->description="";
        $this->photo='';
        $this->photos="";
        $this->old_image="";
    
    }


    public function create(){

        $product = new Product();
        
        $this->validate([
            'photo' => 'required', // 1MB Max
            'photos.*' => 'required',
           
            'nameProduct' => 'required',
            'category' => 'required',
            'supplier' => 'required',
            'promotion'  => 'required',
            'price'=> 'required',
            'size'=> 'required',
            'description'=> 'required',

        ]);

        
       
       $filename = $this->photo->store('products', 'public');
      
        $product->defaultimage = $filename;   
        $product->name = $this->nameProduct;
        $product->amount = $this->amount;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->size = $this->size;
        $product->IDpromotion = $this->promotion;
        $product->IDcategory = $this->category;
        $product->IDsupplier = $this->supplier;
       
        $product->save();
        
        $this->photos[] = $this->photo;
        $this->IDproduct = Product::latest()->first()->IDproduct;
        foreach ($this->photos as $photo) {
                  
                    $filename2= $photo->store('product_detail','public');
                    $images = new Images();
                    $images->IDproduct = $this->IDproduct;
                    $images->image	=   $filename2;
                    $images->save();
        }
        
        $this->resetField();
        $this->selectData= true;
        $this->createData = false;

       
        
        
       
    }


    public function edit($id){

        $this->selectData= false;
        $this->updateData = true;
        $product = Product::findOrFail($id);    
       
        $this->IDproduct = $product->IDproduct;
        $this->nameProduct = $product->name;
        $this->amount = $product->amount;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->size = $product->size;
        $this->promotion = $product->IDpromotion;
        $this->category = $product->IDcategory;
        $this->supplier = $product->IDsupplier;
        $this->old_image = $product->defaultimage;
        $this->old_images = Product::findOrFail($id)->images_linked()->get();

    }


    public function update($id){
       
       

        $product = Product::findOrFail($id);
      
      
        $product->name = $this->nameProduct;
         $product->amount = $this->amount;
         $product->price = $this->price;
         $product->description = $this->description;
         $product->size = $this->size;
         $product->IDpromotion = $this->promotion;
         $product->IDcategory = $this->category;
         $product->IDsupplier = $this->supplier;
        if($this->photo !=null){
            $filename = $this->photo->store('products', 'public');
            $product->defaultimage = $filename;
        }
        $result = $product->save();


        if($this->photos !=null){
         Images::find($id)->delete();
        $this->photos[] = $this->photo;
        foreach ($this->photos as $photo) {
            $filename2= $photo->store('product_detail','public');
            $images = new Images();
            $images->IDproduct = $this->IDproduct;
            $images->image	= $filename2;
            $images->save();
        }
    }

        $this->resetField();
        $this->selectData = true;
        $this->updateData = false;
    }


    public function delete($id){
       
        $product = Product::find($id)->images_linked()->delete();
        $result = Product::find($id)->delete();
        
     }
}
