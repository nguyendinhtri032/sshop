<div class="col-xs-8" style="width: 100%">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                <div class="row">
                    <div class="col-xs-6">
                        <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                    </div>
                    <div class="col-xs-6">
                        <a style="color: white" href="{{route('product')}}" class="btn btn-primary btn-sm btn-block">
                            <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            @foreach ($cartItems as $item)
                <div> 
                    <div>
                        <div class="row">
                            <div class="col-xs-2"><img class="img-responsive" src="{{asset('storage')}}/{{$item->image}}">
                            </div>
                            <div class="col-xs-4">
                                <h4 class="product-name"><strong>{{ $item->name }}</strong></h4>
                            <div>
                                <h6>Size: {{$item->size}}</h6>
                            </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="col-xs-6 text-right">
                                    <h6><strong>${{ $item->price }} <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-xs-4">
                                    <div>
                                        Quantity 
                                       <input type="number"  wire:model="quantity.{{$item->id}}" class="form-control input-sm"  placeholder="{{$item->quantity}}"  wire:change="updateCart({{$item->id}},{{$item->quantity}})">
                                       
                                    </div>
                                      @livewireScripts
                                </div>
                                @error('field')
                                       <span class="error" style="color: red">{{ $message }}</span>
                                   @enderror
                                <div class="col-xs-2">
                                    <button type="button" class="btn btn-link btn-xs" wire:click.prevent="removeCart({{$item->id}})">
                                        <span class="glyphicon glyphicon-trash"> </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
            @endforeach
        </div>
    </div>
    <div class="row text-center">
        <div class="col-xs-9">
            <h4 class="text-right">Total <strong>${{Cart::getTotal()}}</strong></h4>
        </div>
        <div class="col-xs-3">
            <a href="checkout" style="text-decoration: none"><button type="button" onclick="" class="btn btn-success btn-block">
                Checkout ({{Cart::getTotalQuantity()}})
            </button></a>
            <button style="background-color: red" type="button" class="btn btn-success btn-block"
                wire:click.prevent="clearAllCart">
                Delete All
            </button>
        </div>
    </div>
</div>
