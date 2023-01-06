<div>
    {{-- table promotion--}}
    @if($selectData == true)
    <div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <input wire:model="search" type="text" class="form-control" placeholder="Search name promotion">
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
                    <th>Name</th>
                    <th>Deduction</th>
                    <th>Description</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($promotions as $promotion)
                <tr>
                    <td>{{$promotion->IDpromotion}}</td>
                    <td>{{$promotion->namePromotion}}</td>
                    <td>{{$promotion->deduction}}</td>
                    <td>{{$promotion->description}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" wire:click='edit({{$promotion->IDpromotion}})'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" wire:click='delete({{$promotion->IDpromotion}})'>
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
             
            </tbody>
        </table>


        <div class="row justify-content-center">
        {!! $promotions->links() !!}
        </div>
    </div>
    @endif
    {{-- end table --}}




    {{-- Create --}}
    @if($createData == true)
    <div>
        <form action="" wire:submit.prevent='create()'>
            <div class="card-body">

                <div class="form-group">
                    <label for="menu">Name Promotion</label>
                    <input type="text" wire:model="namePromotion" class="form-control" placeholder="Enter name promotion">
                    <span class="text-danger">
                    @error('namePromotion')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="menu">Deduction</label>
                    <input type="number" wire:model="deduction" class="form-control" placeholder="Enter Deduction">
                    <span class="text-danger">
                    @error('deduction')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="menu">Description</label>
                    <input type="text" wire:model="description" class="form-control" placeholder="Enter Description">
                    <span class="text-danger">
                    @error('description')
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





    {{-- Update promotion--}}
    @if($updateData == true)
    <div>
        <form action="" wire:submit.prevent='update({{$IDpromotion}})'>
            <div class="card-body">

                <div class="form-group">
                    <label for="menu">Name Promotion</label>
                    <input type="text" wire:model="namePromotion" class="form-control" placeholder="Enter name promotion">
                    <span class="text-danger">
                        @error('namePromotion')
                            {{$message}}
                        @enderror
                </span>
                </div>
                <div class="form-group">
                    <label for="menu">Deduction</label>
                    <input type="number" wire:model="deduction" class="form-control" placeholder="Enter Deduction">
                    <span class="text-danger">
                        @error('deduction')
                            {{$message}}
                        @enderror
                </span>
                </div>
                <div class="form-group">
                    <label for="menu">Description</label>
                    <input type="text" wire:model="description" class="form-control" placeholder="Enter Description">
                    <span class="text-danger">
                    @error('description')
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