@extends('layouts.app')

@section('content')
<div class="container">
   


    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    You are logged in!


@endsection


 <!-- include jquery cdns -->
@include('layouts.jquery')