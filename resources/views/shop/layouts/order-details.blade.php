@extends('shop.layouts.home')
@section('content')
<table class="table" id="table" style=" margin-top: 150px">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID order</th>
        <th scope="col">Price</th>
        <th scope="col">Amount</th>
        
        <th scope="col">Name Product</th>
        <th scope="col">Image Product</th>
        
        <th scope="col">Total</th>
        
        
        
      </tr>
    </thead>
    <tbody>
      @php $i=1 @endphp
      @foreach ($orderdetails as $orderdetail)
      <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$orderdetail->IDorder}}</td>
        <td>${{$orderdetail->price}}</td>
        <td>{{$orderdetail->amountdetail}}</td>
        <td>{{$orderdetail->name}}</td>
        <td><img src="{{asset('storage')}}/{{$orderdetail->defaultimage}}" alt="" width="50px" height="150px"></td>
        
        <td>${{$orderdetail->price*$orderdetail->amountdetail}}</td>
      </tr>  
      @endforeach
    
    </tbody>
    
  </table>
@endsection