<div class="row">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{ Cart::getTotalQuantity() }}</span>
        </h4>
        <ul class="list-group mb-3 sticky-top">
            @php $i=1 @endphp
            @foreach ($cartItems as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $i++ }} {{ $item->name }}</h6>
                        <small class="text-muted">Size: {{ $item->size }}</small>
                    </div>
                    <span class="text-muted">${{ $item->price }} x {{ $item->quantity }}</span>
                </li>
            @endforeach

            <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>${{ Cart::getTotal() }}</strong>
            </li>
        </ul>

    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate="" wire:submit.prevent="checkout">
            <div class="mb-3">
                <label for="">Full name: {{ $info->fullname }}</label>
            </div>
            <div class="mb-3">
                <label for="">Phone: {{ $info->number_telephone }}</label>
            </div>
            <div class="mb-3">
                <label for="">Email: {{ $info->email }}</label>
            </div>
            <div class="mb-3">
                <label for="">Address: {{ $info->address }}</label>
            </div>
            <div class="mb-3">
                <label for="">Description:</label>
                <input type="text" class="form-control" id="address" placeholder="" wire:model="description">
            </div>
            @error('description')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror

            <hr class="mb-4">
            <h4 class="mb-3">Payment</h4>
            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" disabled class="custom-control-input"
                        value="Banking" wire:model="pay">
                    <label class="custom-control-label" for="credit">Banking</label>
                </div>

                <div class="custom-control custom-radio">
                    <input id="paypal" name="paymentMethod" type="radio" disabled class="custom-control-input"
                        value="Momo" wire:model="pay">
                    <label class="custom-control-label" for="paypal">Momo</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                        value="Cash" wire:model="pay">
                    <label class="custom-control-label" for="debit">Cash</label>
                </div>
                @error('pay')
                    <span class="error" style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <hr class="mb-4"> @error('field')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

        </form>
    </div>
</div>

