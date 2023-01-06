<div>
    {{-- table promotion--}}
    @if($selectData == true)
    <div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <input wire:model="search" type="text" class="form-control" placeholder="Search ID import">
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
                    <th style="width: 50px">ID Import</th>
                    <th>Supplier</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($imports as $key=>$import)
                @if($import->status ==1)
                <tr>
                   
                    <td>{{$import->IDimport}}</td>
                    <td>{{$import->supplier_linked->name}}</td>
                    <td>{{$import->amount}}</td>
                    <td>{{$import->total}}</td>
                    <td>{{$import->date_import}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" wire:click='edit({{$import->IDimport}})'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" wire:click='delete({{$import->IDimport}})'>
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endif
                @endforeach

            </tbody>
        </table>


        <div class="row justify-content-center">
        {!! $imports->links() !!}
        </div>
    </div>
    @endif
    {{-- end table --}}




    {{-- Create --}}
    @if($createData == true)
    <div>
        <form action="" wire:submit.prevent='create()'>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Supplier</label>
                            <select class="form-control" wire:model='IDsupplier'>
                                <option>----Select a Supplier---</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{$supplier->IDsupplier}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                            @error('IDsupplier')
                                {{$message}}
                            @enderror
                </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Date</label>
                            <input type="date" wire:model='date' class="form-control">
                            <span class="text-danger">
                            @error('date')
                                {{$message}}
                            @enderror
                </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h3>Imported products</h3>
                <table class="table" id="products_table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($importDetails as $index =>$importDetail)
                        <tr>
                            <td>

                                <select class="form-control" name="importDetails[{{$index}}][IDproduct]" wire:model="importDetails.{{$index}}.IDproduct">
                                    <option>---Select a Product---</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->IDproduct}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                               
                            </td>

                            <td>
                                <input type="number" name="importDetails[{{$index}}][amount]" class="form-control" wire:model="importDetails.{{$index}}.amount" />
                            </td>

                            <td>
                                <input type="number" name="importDetails[{{$index}}][price]" class="form-control" wire:model="importDetails.{{$index}}.price" />
                            </td>

                            <td>
                                <a href="#" wire:click.prevent="removeImportDetail({{$index}})">Delete</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary" wire:click.prevent="addImportDetail">+ Add Another Product</button>
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
    {{-- End Create --}}





    {{-- Update --}}
    @if($updateData == true)
    <div>
        <form action="" wire:submit.prevent='update({{$IDimport}})'>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Supplier</label>
                            <select class="form-control" wire:model='IDsupplier'>
                                <option>----Select a Supplier---</option>
                                @foreach($suppliers as $supplier)
                                <option value="{{$supplier->IDsupplier}}">{{$supplier->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Date</label>
                            <input type="date" wire:model='date' class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h3>Imported products</h3>
                <table class="table" id="products_table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($importDetails as $index =>$importDetail)
                        <tr>
                            <td>

                                <select class="form-control" name="importDetails[{{$index}}][IDproduct]" wire:model="importDetails.{{$index}}.IDproduct">
                                    <option>---Select a Product---</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->IDproduct}}">{{$product->name}}</option>
                                    @endforeach
                                </select>

                            </td>

                            <td>
                                <input type="number" name="importDetails[{{$index}}][amount]" class="form-control" wire:model="importDetails.{{$index}}.amount" />
                            </td>

                            <td>
                                <input type="number" name="importDetails[{{$index}}][price]" class="form-control" wire:model="importDetails.{{$index}}.price" />
                            </td>

                            <td>
                                <a href="#" wire:click.prevent="removeImportDetail({{$index}})">Delete</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary" wire:click.prevent="addImportDetail">+ Add Another Product</button>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            @csrf
        </form>
    </div>
    @endif
    {{-- End Update --}}

</div>