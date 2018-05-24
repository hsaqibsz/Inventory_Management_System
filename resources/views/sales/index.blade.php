@extends('layouts.app')


@section('content')

<div class="container">
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  
  <div class="card   box-shadow col-lg-4 col-md-4 col-sm-10">
    <div class="card-body">
         <form method="post" action="{{route('customer.search')}}">
            {{csrf_field()}}

         <input type="text" name="search_customer" placeholder="type customer name to search " class="form-control">
            <input type="submit" value="search" class="btn btn-lg btn-block btn-primary" name="" >
          
 
         </form>
       
    </div>
  </div>
  <h2>Custormers and Sales</h2>
  
 




 	<div class="card-deck mb-3 text-center">
 @foreach($customers as $customer)
   @if($loop->index>2)
   @break
   @endif
<div class="card   box-shadow col-sm">
  <div class="card-header">
    <h4 class="my-0 font-weight-normal">{{$customer->name}}</h4>
  </div>
  <div class="card-body">
     <img src="{{$customer->image}}" class="card-img"> 
    <h1 class="card-title pricing-card-title">{{$customer->sales->count()}} Sales</h1>
    <ul class="list-unstyled mt-3 mb-4">
      <li>Phone: {{$customer->phone}}</li>
      <li>Email: {{$customer->email}}</li>
      <li> {{$customer->address}}</li>
    </ul>
    <a href="{{route('customer.sale', $customer->id)}}" class="btn btn-lg btn-block btn-primary">Details</a>
  </div>
</div>
@endforeach
</div>
	{{$customers->links()}}
 
 </div>
@endsection



 <!-- include jquery cdns -->
@include('layouts.jquery')