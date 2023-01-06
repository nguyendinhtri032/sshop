
@extends('shop.layouts.home')
@section('content')
  <body>
    <div class = "card-wrapper" style="margin-top: 300px">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
                @foreach($products as $product)
                <img src = "{{asset('storage')}}/{{$product->image}}" alt = "product image" style="height: 100%; width:100%">
                
            @endforeach
            </div>
          </div>
          <div class = "img-select">
            @php $i=1 @endphp
            @foreach($products as $product)
            
            <div class = "img-item">
              <a href = "" data-id = "{{$i++}}">
                <img src = "{{asset('storage')}}/{{$product->image}}" alt = "product image" style="height: 100%; width:100%">
              </a>
            </div>
            @endforeach
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">{{$product->name}} </h2>
          

          <div class = "product-price">
            <p class = "last-price">Old Price: <span style="font-size: 20px">${{$promotions->price}}</span></p>
            <h2><p class = "new-price">New Price: <span style="font-size: 20px">${{$promotions->price-$promotions->deduction}}</span></p></h2>
          </div>

          <div class = "product-detail">
            <b><h2>about this item: </h2></b>
            <h4>{{$product->description}}</h4> 
            <ul>
              <h4><li>Category: <span>{{$category->nameCategory}}</span></li>
                <h4><li>Size: <span>{{$product->size}}</span></li>
             
              <li>Shipping Area: <span>All over the Vietnam</span></li>
              <li>Shipping Fee: <span>Free</span></li>
            </h4>
            </ul>
        
          </div>

          <div class = "purchase-info">
            <input type = "number" min = "0" id="amount" value = "1">
            <button type = "button" class = "btn" onclick="addAmountToCart({{$product->IDproduct}})">
              Add to Cart <i class = "fas fa-shopping-cart"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
 {{-- @include('shop.layouts.bestseller')
 --}}
    <script>
        function addAmountToCart(id) {
            var amount = document.getElementById('amount').value;
            console.log('add-to-cart/' + id + '/' + amount);
            $.ajax({
                url: 'add-to-cart/' + id + '/' + amount,
                type: 'GET',
            }).done(function(response) {
    
                alertify.success('Successfully added ' + amount +' product');
            });
        }
    </script>

      <script src="{{asset('template/shop/productdetail/script.js')}}"></script>
  </body>
@endsection