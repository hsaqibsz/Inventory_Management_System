@extends('layouts.app')

@section('content')
<div class="container">

	
<div class="table table-responsive">
	<h2>Customers contacts</h2><br>
    <table class="table table-hover">
    	<tr>
    		<th>Name</th>
    		<th>Email</th>
    		<th>Phone</th>
    		<th>Time</th>
    		<th>show</th>
    	</tr>
      @foreach($contacts as $contact)
        <tr>
        	<td>{{$contact->name}}</td>
        	<td>{{$contact->email}}</td>
        	<td>{{$contact->phone}}</td>
        	<td>{{$contact->created_at->diffForHumans()}}</td>
        	<td><a href="{{route('contact.show', $contact->id)}}" class="btn btn-outline-primary">show <i class="fa fa-details"></i></a></td>
        </tr>
      @endforeach
    </table>

</div>

</div>
@endsection

@include('layouts.jquery')