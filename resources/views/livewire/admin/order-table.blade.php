<div>
    {{-- table promotion--}}
    @if($selectData == true)
    <div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="form-group">
                    <label></label>
                    <input wire:model="search" type="text" class="form-control" placeholder="Search ID order">
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

        </div>

        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Name Customer</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Pay</th>
                    <th>Date</th>
                    
                    <th>Status</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>

                    <td>{{$order->IDorder}}</td>
                    <td>{{$order->user_linked->fullname}}</td>
                    <td>{{$order->user_linked->number_telephone}}</td>
                    <td>{{$order->user_linked->address}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->pay}}</td>
                    <td>{{$order->created_at}}</td>
                    
                    <td>{{$order->status_order}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" wire:click='detail({{$order->IDorder}})'>
                            <i class="fas fa-edit"></i>
                        </a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>


        <div class="row justify-content-center">
            {!! $orders->links() !!}
        </div>
    </div>
    @endif
    {{-- end table --}}


    {{-- Select detail order--}}
    @if($selectDetail == true)
    <div>
        <div class="row justify-content-end">
            <div class="col-md-2">

                <button class="btn btn-primary" wire:click='update({{$order->IDorder}})'>Status update</button>

            </div>
        </div>

        <div class="row justify-content-left">
            <div class="card-header">
                <p><b> Order:</b> {{$order->IDorder}}</p>
               <p><b> Name: </b>{{$user->fullname}}</p>
               <p><b> Address: </b>{{$user->address}}</p>
               <p><b> Phone: </b>{{$user->number_telephone}}</p>
              
            </div>
            <div class="card-header">
                <p><b> Total:</b> {{$order->total}}</p>
                <p><b> Pay: </b>{{$order->pay}}</p>
                <p><b> Description:</b> {{$order->description}}</p>
                <p><b> Status Order:</b> <select wire:model="status_order" class="form-control">
                        <option>------Select status order-----</option>
                        <option value="the shop is preparing">the shop is preparing</option>
                        <option value="the shipper is delivering">the shipper is delivering</option>
                        <option value="successful delivery">successful delivery</option>
                    </select></p>
            </div>
        </div>
    
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">STT</th>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Amount</th>
                    <th>Price</th>

                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $key=>$orderDetail)
                <tr>

                    <td>{{$key+1}}</td>
                    <td>{{$orderDetail->product_linked->name}}</td>
                    <td>{{$orderDetail->product_linked->size}}</td>
                    <td>{{$orderDetail->amount}}</td>
                    <td>{{$orderDetail->price}}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @endif
    {{-- end create--}}

</div>