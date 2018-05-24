@extends('layouts.app')

@section('content')
<div class="container">
	
 <h2>Customers List &nbsp; &nbsp; <a href="{{route('customer.create')}}" class="btn btn-outline-primary">Add New</a> </h2>

 <table class="table table-hover">
 	<tr>
 	<th>name</th>
 	<th>phone</th>
 	<th>Details</th>
 	<th>Sale</th>
 	<th>Loan/Deal</th>
 </tr>
     @foreach($customer as $cust)
     <tr>
     	<td>{{$cust->name}}</td>
     	<td>{{$cust->phone}}</td>
     	<td><a href="{{route('customer.show', $cust->id)}}" class="btn btn-outline-primary">Show</a></td>
     	<td><a href="{{route('customer.sale', $cust->id)}}" class="btn btn-outline-primary">Sale</a></td>
     	<td><a href="{{route('customer.deal', $cust->id)}}" class="btn btn-outline-primary">Loan/Deal</a></td>
     </tr>
     @endforeach
 </table>
   {{$customer->links()}}

</div>
@endsection
@include('layouts.jquery')