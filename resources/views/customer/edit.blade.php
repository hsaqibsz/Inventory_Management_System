@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="col-lg-12 col-md-12 ">
            <h2>Update {{$customer->name}}'s Record</h2>
            <form method="post" action="{{route('customer.update',$customer->id)}}" enctype="multipart/form-data">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <div class="form-group">
                
              <label>Name
              </label>
              <input type="text" value="{{$customer->name}}" name="name" class="form-control">
              </div>
              
              
              <div class="form-group">
                
             <lable> Photo<input type="file" name="image" class="form-control">
            <img src="{{$customer->image}}" alt="photo" width="4px;" height="30px;">
             </lable> 
              </div>

              <div class="form-group">
                
             <label>Phone
             </label>
             <input type="text" class="form-control" name="phone" value="{{$customer->phone}}">
              </div>

           <div class="form-group">
                
             <label>Email
             </label>
             <input type="text" class="form-control" name="email" value="{{$customer->email}}">
             </div> 

             <div class="form-group">
                
             <label>Address
             </label>
             <textarea   class="form-control" name="address">{{$customer->address}}</textarea>
             </div> 

             <div class="form-group">
                
             <label>Extra Info
             </label>
             <textarea   class="form-control" name="extra_info">value="{{$customer->extra_info}}</textarea>
             </div>

              

                <input type="submit" value="Save Changes" class="btn btn-primary">
                <a href="{{route('customer.show',$customer->id)}}" class="btn btn-warning">Cancel</a>
                <a href="{{route('customer.index')}}" class="btn btn-success">Go to list</a>
            </form>
             
        </div>
 	
 </div>
@endsection

@include('layouts.jquery')