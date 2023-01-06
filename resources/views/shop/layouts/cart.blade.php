@extends('shop.layouts.home')
@section('content')
    
    <div class="super_container">

    <div class="row" style="margin-top: 150px">
        @if(Cart::getTotalQuantity()>0)
            @livewire('shop.listcart')
            @livewireScripts
        @else 
        <div class="main_slider" style="background-image:url('template/shop/images/empty-cart.png'); margin-top: -50px">
        
        </div>
        @endif
    </div>
    <script>
          function checkout(){
        $.ajax({
            url: 'checkout',
            type: 'GET',
        }).done(function (response){
           
            alertify.success();
        });
    }
    </script>
    </div>
         <!------ Include the above in your HEAD tag ---------->
    
   @endsection