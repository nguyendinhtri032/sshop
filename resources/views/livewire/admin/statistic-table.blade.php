<div>
    {{-- table--}}
    @if($selectData == true)
    <form action="" wire:submit.prevent='filter()'>
        <div>
            <div class="row justify-content-center">

                <div class="col-md-3">
                    <div class="form-group">
                        <label></label>
                        <input type="date" wire:model='start' class="form-control" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label></label>
                        <input type="date" wire:model='end' class="form-control" />
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label></label>
                        <button type="submit" class="form-control btn btn-primary">Filter</button>
                    </div>
                </div>
          

            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 50px">STT</th>
                        <th>Product</th>
                        <th>Date</th>
                        <th>Size</th>
                        <th>Amount</th>
                        <th>Price</th>



                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @if($orderDetails != null)
                        @foreach($orderDetails as $key=>$orderDetail)
                    <tr>

                        <td>{{$key+1}}</td>
                        <td>{{$orderDetail->product_linked->name}}</td>
                        <td>{{$orderDetail->created_at}}</td>
                        <td>{{$orderDetail->product_linked->size}}</td>
                        <td>{{$orderDetail->amountdetail}}</td>
                        <td>{{$orderDetail->price}}</td>


                    </tr>
                    @endforeach
                    @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </form>

    <div class="row justify-content-left">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total products sold</label>
                        <input type="text" readonly class="form-control" wire:model='totalProduct'/>
                    </div>
                </div>
               
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total revenue</label>
                        <input type="text"  readonly class="form-control" wire:model='totalRevenue'/>
                    </div>
                </div>
    </div>
    @endif

    
    {{-- end table promotion--}}
</div>