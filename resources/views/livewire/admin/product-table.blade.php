<div>
    {{-- table--}}
    @if($selectData == true)
    <div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <input wire:model="search" type="text" class="form-control" placeholder="Search name product">
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <select wire:model="perPage" class="form-control">
                        <option value="3">Display 3 row</option>
                        <option value="6">Display 6 row</option>
                        <option value="9">Display 9 row</option>
                    </select>
                </div>
            </div>


            <div class="row justify-content-end">
                <div class="col-md-1">
                    <div class="form-group">
                        <label></label>
                        <button wire:click='showForm' class="btn btn-success">CREATE</button>
                    </div>
                </div>
            </div>

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Name Product</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Promotion</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Size</th>


                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->IDproduct}}</td>
                    <td>{{$product->name}}</td>
                    <td><img src="{{asset('storage')}}/{{$product->defaultimage}}" width="40" height="40"></td>
                    <td>{{$product->category_linked->nameCategory}}</td>
                    <td>{{$product->supplier_linked->name}}</td>
                    <td>{{$product->promotion_linked->namePromotion}}</td>
                    <td>{{$product->amount}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->size}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" wire:click='edit({{$product->IDproduct}})'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" wire:click='delete({{$product->IDproduct}})'>
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>


        <div class="row justify-content-center">
            {!! $products->links() !!}
        </div>
    </div>
    @endif
    {{-- end table promotion--}}


    {{-- Create  enctype="multipart/form-data"--}}
    @if($createData == true)
    <div>
        <form action="" wire:submit.prevent='create()' enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Name Product</label>
                            <input type="text" wire:model='nameProduct'  class="form-control" placeholder="Nhập tên sản phẩm">
                            <span class="text-danger">
                        @error('nameProduct')
                            {{$message}}
                        @enderror
                </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" wire:model='category'>
                                <option>Select a Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->IDcategory}}">{{$category->nameCategory}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                        @error('category')
                            {{$message}}
                        @enderror
                </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Suppier</label>
                            <select class="form-control" wire:model='supplier'>
                                <option>Select a supplier</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{$supplier->IDsupplier}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                        @error('supplier')
                            {{$message}}
                        @enderror
                </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Promotion</label>
                            <select class="form-control" wire:model='promotion'>
                                <option value="">Select a Promotion</option>
                                @foreach($promotions as $promotion)
                                <option value="{{$promotion->IDpromotion}}">{{$promotion->namePromotion}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                        @error('promotion')
                            {{$message}}
                        @enderror
                </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="menu">Amount</label>
                            <input type="text" wire:model='amount' class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="menu">Price</label>
                            <input type="text" wire:model='price' class="form-control" placeholder="Enter price...">
                            <span class="text-danger">
                        @error('price')
                            {{$message}}
                        @enderror
                </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Size</label>
                            <select class="form-control" wire:model='size'>
                                <option value="">Select a Size</option>
                                <option value="NoSize">No Size</option>
                                
                                <option value="S">Size S</option>
                                <option value="M">Size M</option>
                                
                                <option value="L">Size L</option>
                                <option value="XL">Size XL</option>
                                <option value="XXL">Size XXL</option>
                            </select>
                            <span class="text-danger">
                        @error('size')
                            {{$message}}
                        @enderror
                </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea wire:model='description' class="form-control"></textarea>
                    <span class="text-danger">
                        @error('description')
                            {{$message}}
                        @enderror
                </span>
                </div>
                <div class="form-group">
                    <label for="menu">Image product</label>
                    <input type="file" class="form-control" wire:model="photo" >
                    <span class="text-danger">
                        @error('photo')
                            {{$message}}
                        @enderror
                </span>
                    <div id="image_show">
                        @if($photo)
                            <img src="{{$photo->temporaryUrl()}}" width="100" />
                        @endif
                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="menu">Image detail Product</label>
                    <input class="form-control" type="file" wire:model="photos" multiple>
                    <span class="text-danger">
                        @error('photos')
                            {{$message}}
                        @enderror
                </span>
                    <div id="image_show">
                        @if($photos)
                            @foreach($photos as $photo)
                            <img src="{{$photo->temporaryUrl()}}" width="100" />
                            @endforeach
                        @endif

                        
                    </div>
                    <span class="text-danger">
                    @error('photos')
                    {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            @csrf
        </form>
    </div>

    
    @endif
    {{-- end create--}}



    {{-- Update --}}
    @if($updateData == true)
    <div>
        <form action="" wire:submit.prevent='update({{$IDproduct}})' >
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Name Product</label>
                            <input type="text" wire:model='nameProduct'  class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" wire:model='category'>
                                <option>Select a Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->IDcategory}}">{{$category->nameCategory}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Suppier</label>
                            <select class="form-control" wire:model='supplier'>
                                <option>Select a supplier</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{$supplier->IDsupplier}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Promotion</label>
                            <select class="form-control" wire:model='promotion'>
                                <option>Select a Promotion</option>
                                @foreach($promotions as $promotion)
                                <option value="{{$promotion->IDpromotion}}">{{$promotion->namePromotion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="menu">Amount</label>
                            <input type="text" wire:model='amount' class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="menu">Price</label>
                            <input type="text" wire:model='price' class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Size</label>
                            <select class="form-control" wire:model='size'>
                                <option value="S">Size S</option>
                                <option value="L">Size L</option>
                                <option value="XL">Size XL</option>
                                <option value="XXL">Size XXL</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea wire:model='description' class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="menu">Image product</label>
                    <input type="file" class="form-control" wire:model="photo" >
                    <div id="image_show">
                        @if($photo)
                            <img src="{{$photo->temporaryUrl()}}" width="100" />
                        @endif
                        @if($photo == '')
                            <img  src="{{asset('storage')}}/{{$old_image}}" width="100">
                        @endif
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="menu">Image detail Product</label>
                    <input class="form-control" type="file" wire:model="photos" multiple>
                    <div id="image_show">
                        @if($photos)
                            @foreach($photos as $photo)
                            <img src="{{$photo->temporaryUrl()}}" width="100" />
                            @endforeach
                        @endif

                        @if(!$photos)
                            @foreach($old_images as $old_image2)
                                <img  src="{{asset('storage')}}/{{$old_image2->image}}" width="100">
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            @csrf
        </form>
    </div>
    @endif
    {{-- end Update--}}
</div>