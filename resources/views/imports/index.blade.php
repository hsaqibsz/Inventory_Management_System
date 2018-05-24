@extends('layouts.app')
@section('content')

<div class="container">
	<h2>Wahdat Shop New Products</h2>
	<table class="table table-hover">
		<tr> <td colspan="3"><a href="{{route('imports.create')}}" class="btn btn-info">Add New</a></td></tr>
		<tr><td>Pname</td><td>PCategory</td><td>Details</td></tr>
	@foreach($imports as $import)
		<tr><td>
          {{$import->p_name}}</td>
          <td>{{$import->category->name}}</td>
          <td><a href="{{route('imports.show',$import->id)}}">show...</a></td></tr>
          
	@endforeach
	</table>
 
	{{$imports->links()}}
</div>
@endsection


 <!-- include jquery cdns -->
@include('layouts.jquery')