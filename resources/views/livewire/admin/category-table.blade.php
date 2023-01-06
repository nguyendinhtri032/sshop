<div>
    {{-- table category--}}
    @if($selectData == true)
    <div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <input wire:model="search" type="text" class="form-control" placeholder="Search name category">
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
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                <tr>

                    <td>{{$category->IDcategory}}</td>
                    <td>{{$category->nameCategory}}</th>
                    <td>
                        <a class="btn btn-primary btn-sm" wire:click='edit({{$category->IDcategory}})'>
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" wire:click='delete({{$category->IDcategory}})'>
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>


        <div class="row justify-content-center">
            {!! $categories->links() !!}
        </div>
    </div>
    @endif
    {{-- end table category--}}




    {{-- Create category--}}
    @if($createData == true)
    <div>
        <form action="" wire:submit.prevent='create'>
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Name Category</label>
                <input type="text" wire:model="nameCategory" class="form-control" placeholder="Enter name category">
                <span class="text-danger">
                        @error('nameCategory')
                            {{$message}}
                        @enderror
                </span>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Category</button>
        </div>
        @csrf
        </form>
    </div>
    @endif
    {{-- End Create category--}}





    {{-- Update category--}}
    @if($updateData == true)
    <div>
        <form action="" wire:submit.prevent='update({{$idCategory}})'>
            <div class="card-body">

                <div class="form-group">
                    <label for="menu">Name Category</label>
                    <input type="text" wire:model="edit_nameCategory" class="form-control" placeholder="Enter Name Category">
                    <span class="text-danger">
                        @error('edit_nameCategory')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit Categoy</button>
            </div>
            @csrf
        </form>
    </div>
    @endif
    {{-- End Update category--}}
    
</div>