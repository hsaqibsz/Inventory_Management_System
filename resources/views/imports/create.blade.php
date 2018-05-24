@extends('layouts.app')

<div class="container">
    @section('content')
    <div class="col-lg-12 col-md-12 ">
            <h2>Add New Products</h2>
            <form method="post" action="{{route('imports.store')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                
              <label>Name
              </label>
              <input type="text" placeholder="Product name  د جنس نوم" name="p_name" class="form-control">
              </div>
              <div class="form-group">
                
              <label>Category
              </label>
              <select name="category_id" class="form-control" placeholder="category ">
                @foreach($category as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
              </select>
              </div>
              
              <div class="form-group">
                
             <lable> Product Image<input type="file" name="p_image" class="form-control"></lable> 
              </div>
              <div class="form-group">
                
             <label>Quantity
             </label>
             <input type="number" class="form-control" name="p_quantity" placeholder="product quantity تعداد">
              </div>
              <div class="form-group">
                
             <label>Price
             </label>
             <input type="number" class="form-control" name="price" placeholder="price قیمت">
              </div>

              <div class="form-group">
                <label>Profit</label>
                <select name="profit" class="form-control">
                      @for($i = 1; $i<=40; $i++)
                               <option value="{{$i}}" @if($i == 5)
                               selected="true"
                               @endif> {{$i}} %</option>

                               @endfor
                  
                </select>
                
              </div>

              <div class="form-group">
                
         <label>Country
         </label>
                 <select name="country" class="form-control">
                   <option value="afghanistan">Afghanistan</option>
                   <option value="iron">Iran</option>
                   <option value="pakistan">Pakistan</option>
                   <option value="chaina">Chaina</option>
                 </select>
          
                 <br><a href="#">select other</a>
              </div>
              <div class="form-group">
                
         <label>New or Use
         </label> 
           <select name="neworuse" class="form-control">
              <option value="1">
                New
              </option>
               <option value="0">
                Used
             </option>
            </select>
              </div>

              <div class="form-group">
                
         <label>Qualitiy
         </label>
               <select name="quality" class="form-control">
              <option value="1">
                Best
              </option>
               <option value="0">
                Intermediat
             </option>
              </select>
              </div>

              <div class="form-group">
                
              </div>
         <label>Guaranty
         </label>

            <input type="radio" name="guaranty" value="1" checked="true"> yes &nbsp; &nbsp; 
            <input type="radio" name="guaranty" value="0" > No <br>

                <input type="submit" value="Save" class="btn btn-primary">
                <a href="{{route('imports.index')}}" class="btn btn-success">Go to list</a>



 
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

 <!-- include jquery cdns -->
@include('layouts.jquery')