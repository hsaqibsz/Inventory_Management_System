@extends('layouts.app')

<div class="container">
    @section('content')
    <div class="col-lg-12 col-md-12 ">
            <h2>Customer Registration form</h2>
            <form method="post" action="{{route('customer.store')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                
              <label>Name
              </label>
              <input type="text" placeholder="Customer name " name="name" class="form-control">
              </div>
              
              
              <div class="form-group">
                
             <lable> Photo<input type="file" name="image" class="form-control"></lable> 
              </div>

              <div class="form-group">
                
             <label>Phone
             </label>
             <input type="text" class="form-control" name="phone" placeholder="Phone number">
              </div>

           <div class="form-group">
                
             <label>Email
             </label>
             <input type="text" class="form-control" name="email" placeholder="email">
             </div> 

             <div class="form-group">
                
             <label>Address
             </label>
             <textarea placeholder="Address" class="form-control" name="address"></textarea>
             </div> 

             <div class="form-group">
                
             <label>Extra Info
             </label>
             <textarea placeholder="Extra Info" class="form-control" name="extra_info"></textarea>
             </div>

              

                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{route('customer.index')}}" class="btn btn-success">Go to list</a>



 
            </form>
             
        </div>
    @endsection
</div>


<style type="text/css">
  .form-control{
    width: 100% !important;
    border: 1px solid red;
  }
</style>


@include('layouts.jquery')