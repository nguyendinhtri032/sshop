@extends('shop.layouts.home')

@section('content')
   

<section style="background-color: #eee; margin-top: 100px">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
        </div>
      </div>
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$user->username}}</h5>
              <p class="text-muted mb-4">Customer</p>
              <div class="d-flex justify-content-center mb-2">
                <a class="btn btn-outline-primary ms-1" href="update-profile">Change Information</a>
                <button class="btn btn-outline-primary ms-1" onclick="openForm()" >History order</button>
              </div>
            </div>
          </div>
         
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->fullname}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->number_telephone}}</p>
                </div>
              </div>
              
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->address}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-8" >
              <table class="table" id="table" style="width: 730px; display: none">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID order</th>
                    <th scope="col">Total</th>
                    <th scope="col">Pay</th>
                    
                <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    
                    
                <th scope="col">Status Order</th>
                
                <th scope="col"><button class="btn btn-outline-primary ms-1" onclick="closeForm()">Close</button></th>
                    
                  </tr>
                </thead>
                <tbody>
                  @php $i=1 @endphp
                  @foreach ($orders as $order)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$order->IDorder}}</td>
                    <td>${{$order->total}}</td>
                    <td>{{$order->pay}}</td>
                    <td>{{$order->description}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->status_order}}</td>
                    
                    <td> <a href="order-detail/{{$order->IDorder}}">Detail</a> </td>
                    
                  </tr>  
                  @endforeach
                
                </tbody>
                
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
    {{-- @livewire('shop.history')
     --}}
    
@endsection
<script>
    function openForm() {
  document.getElementById("table").style.display = "block";
}

function closeForm() {
  document.getElementById("table").style.display = "none";
}
function detail(id){

}
</script>
