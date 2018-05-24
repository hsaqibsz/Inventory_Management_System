@extends('layouts.app')

@section('content')
<div class="container">
<div class="table table-responsive">
	 <h2 class="card-header" style="margin: 4px;">{{$contact->name}}</h2><span class="badge badge-danger">{{$contact->created_at->diffForHumans()}}</span>

     
     <div class="card box-shadow " style="margin: 6px; padding: 5px; border-radius: 5px;">
         <div class="card-block"><label>Email: {{$contact->email}}</label></div>
         <div class="card-block"><label>Phone: {{$contact->phone}}</label></div>
         <div class="card-block"><label>Message: {{$contact->message}}</label></div>
     </div>

</div>
</div>
@endsection

@include('layouts.jquery')