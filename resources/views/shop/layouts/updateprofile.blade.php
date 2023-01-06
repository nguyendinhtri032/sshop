@extends('shop.layouts.home')

@section('content')
   
<div class="container-xl px-4 mt-4"  style="margin-top: 250px">
    <!-- Account page navigation-->
   
    <hr class="mt-0 mb-4">
    <div class="row">
  
        <div class="col-xl-12" style="margin-top: 100px">
            <!-- Account details card-->
          
                <div class="card-body">
                   @livewire('shop.update-profile')
                </div>
            
        </div>
    </div>
</div>

@endsection
