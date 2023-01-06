<div>
    {{-- table promotion--}}
    @if($selectData == true)
    <div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <input wire:model="search" type="text" class="form-control" placeholder="Search name supplier">
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
                    <th>Name Supplier</th>
                    <th>Number telephone</th>
                    <th>Address</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{$supplier->IDsupplier}}</td>
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->number_telephone}}</td>
                    <td>{{$supplier->address}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" wire:click='edit({{$supplier->IDsupplier}})'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" wire:click='delete({{$supplier->IDsupplier}})'>
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
             
            </tbody>
        </table>


        <div class="row justify-content-center">
        {!! $suppliers->links() !!}
        </div>
    </div>
    @endif
    {{-- end table promotion--}}




    {{-- Create--}}
    @if($createData == true)
    <div>
        <form action="" wire:submit.prevent='create()'>
            <div class="card-body">

                <div class="form-group">
                    <label for="menu">Name Supplier</label>
                    <input type="text" wire:model="nameSupplier" class="form-control" placeholder="Enter name Supplier">
                    <span class="text-danger">
                    @error('nameSupplier')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="menu">Number telephone</label>
                    <input type="number" wire:model="number_telephone" class="form-control" placeholder="Enter Number telephone">
                    <span class="text-danger">
                    @error('number_telephone')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="menu">Address</label>
                    <input type="text" wire:model="address" class="form-control" placeholder="Enter Address">
                    <span class="text-danger">
                    @error('address')
                            {{$message}}
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
    {{-- End Create --}}





    {{-- Update --}}
    @if($updateData == true)
    <div>
        <form action="" wire:submit.prevent='update({{$IDsupplier}})'>
            <div class="card-body">

            <div class="form-group">
                    <label for="menu">Name Supplier</label>
                    <input type="text" wire:model="nameSupplier" class="form-control" placeholder="Enter name promotion">
                    <span class="text-danger">
                    @error('nameSupplier')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="menu">Number telephone</label>
                    <input type="number" wire:model="number_telephone" class="form-control" placeholder="Enter Deduction">
                    <span class="text-danger">
                    @error('number_telephone')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="menu">Address</label>
                    <input type="text" wire:model="address" class="form-control" placeholder="Enter Description">
                    <span class="text-danger">
                    @error('address')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            @csrf
        </form>
    </div>
    @endif
    {{-- End Update promotion--}}

</div>