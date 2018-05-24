@extends('layouts.app')

@section('content')
 <div class="container">

 	<div class="col-lg-4 col-md-4 col-sm-12">	
 	<table class="table table-hover">
 	<tr>
 	<th>name</th>
 	<th>phone</th>
 	<th>email</th>
 </tr>
     
     <tr>
     	<td>{{$customer->name}}</td>
     	<td>{{$customer->phone}}</td>
     	<td>{{$customer->email}}</td>
     </tr>
   
 </table>
 	</div>
 <hr>
 <br>

 <div class="col-lg-6 col-md-6 col-sm-12 " >	
 	<table class="table table-hover">
 	<tr>
 	<th>Address</th>
 	<th>Extra Information</th>
 	<th>Photo</th>
 </tr>
     
     <tr>
     	<td>{{$customer->address}}</td>
     	<td>{{$customer->extra_info}}</td>
     	<td><img src="{{$customer->image}}" alt="{{$customer->name}} image" width="100px"></td>
     </tr>
   
 </table>
 
 	</div>
     <a href="{{route('customer.index')}}" class="btn btn-outline-primary">Back</a>
 	<a href="{{route('customer.edit',$customer->id)}}" class="btn btn-outline-primary">Edit</a>
 </div>
@endsection

@include('layouts.jquery')