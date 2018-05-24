@extends('layouts.app')
@section('content')
<div class="container">
 
	<h2>{{$imports->p_name}}'s Details</h2>
 
  <div class="table table-responsive">

<table class="table table-striped">
  <tr>
      <th>name</th>
      <th>category</th>
      <th>price</th>
      <th>quantity</th>
      <th>quaranty</th>
      <th>country</th>
      <th>new or use</th>
    </tr>
    <tr>
      <td>{{$imports->p_name}}</td>
      <td>{{$imports->category->name}}</td>
      <td>{{$imports->price}}</td>
      <td>{{$imports->p_quantity}}</td>
      <td>@if($imports->guaranty == 1)
       Yes
       @else
       No
       @endif
       </td>
      <td>{{$imports->country}}</td>
      <td>@if($imports->neworuse == 1)
      New
    @else
    Used
     @endif</td>
    </tr>
</table>

</div>



















<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Update
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-edit"></i> {{$imports->p_name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <!-- show edit form start -->

                              <form method="post" enctype="multipart/form-data" action="{{route('imports.update',$imports->id)}}" >
                                <table class="table table-responsive" id="product_edit">
                                <!-- start edit form   -->      
                             <div id="imports_edit" name="imports_edit" style="display: none; border: 1px solid red;">
                                <tr>
                                      {{csrf_field()}}
                                      {{method_field('PUT')}}
                                    
                              <td>
                                <label>
                                  Item Name
                                <input type="text"  name="p_name" value="{{$imports->p_name}}"  class="form-control text-danger"></td>
                                </label>

                              <td>
                                <label>Category
                                <select name="category_id" class="form-control">

                                     @foreach($category as $category)
                                                      <option value="{{$category->id}}" @if($category->id == $imports->category_id) 
                                                        selected="true" 
                                                        @endif >
                                                        {{$category->name}}
                                                      </option>
                                     @endforeach
                                </select>
                                 </label>
                              </td>
                              <td>
                                <label>
                                  Price
                                <input type="text"  name="price" value="{{$imports->price}}"   class="form-control"></td>
                                </label>
                              <td>
                                <label>
                                                 Quantity
                                  <input type="text"  name="p_quantity" value="{{$imports->p_quantity}}"   class="form-control"></td>
                                  
                                </label>
                                          
                              <td > 
                          
                                            <label>Guaranty No  &nbsp;  <input type="radio" name="guaranty" value="0" @if($imports->guaranty== 0) 
                                             checked="true" 
                                             @endif
                                            
                                              ></label> 
                                            </td>
                                            <td>
                                              <label> Guaranty Yes   &nbsp; <input type="radio" name="guaranty" value="1" @if($imports->guaranty == 1) 
                                             checked="true" 
                                             @endif
                                           
                                              ></label> 

                                         </label>
                              </td>
                              <td>
                                <label>Country
                                <input type="text"  name="country" value="{{$imports->country}}"   class="form-control"></td>
                                </label>
                              <td> 

                                        <label>New &nbsp;
                                          <input type="radio" name="neworuse" value="1"
                                             @if($imports->neworuse == 1 )
                                                checked= 'true'
                                                @endif >
                                        </label>

                                        <label>Used &nbsp;
                                          <input type="radio" name="neworuse" value="0"
                                           @if($imports->neworuse == 0 )
                                              checked= 'true'
                                              @endif >
                                            </label>
                                          </td>          
                                        </tr>
                                        <tr>

                              <td colspan="7">
                              <input type="submit" value="Save Changes" class="btn btn-sm btn-success" name="">

                            </td></tr>

                               </div>
                         <tr>
                          <td colspan="3">

                                <img src="{{$imports->p_image}}" class="img-fluid" style="max-width: 40%; max-height: 30%; float: right;">
                            </td>


                                    <td class="form-group"><label>
                                Edit Image
                                <input type="file" name="p_image" class="form-control">
                              </label>
                              </td>

                              </tr>
                              </table>
                           </form>
                           <form method="post" action="{{route('imports.destroy', $imports->id)}}">
                             {{csrf_field()}}
                             {{method_field('DELETE')}}
                           
                           <input type="submit" value="Delete" class="btn btn-danger " name="">
                           </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
 


       @if($related !== null)
		<table class="table-hover col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<tr><td colspan="3"><span style="color: #CE45FF; font-size: 30px; font-weight: bold;">
				
	Here is other  {{$imports->category->name}}'s related Products   <small style="font-size: 8px;">I will use animat css</small>
			</span>
	          </td>
             <tr>
             	<tr>
               <th>name</th>
                <th>quantity</th>
                <th>details</th>
             	</tr>
             	@foreach($related as $related)
             	<tr>
                    <td>{{$related->p_name}}</td>
                    <td>{{$related->p_quantity}}</td>
                    <td><a href="{{route('imports.show',$related->id)}}" class="btn btn-success">Show</a></td>
                    </tr>
             	@endforeach
			
		</table>
   @endif
  
 </div>

@endsection


 

<style type="text/css">
	.form-control{
		min-width: 150px;
		max-width: 150px;
	}

	table tr td{
padding: 10px;
	}

 table tr th{
padding: 10px;
	}

</style>


 <!-- include jquery cdns -->
@include('layouts.jquery')

<script type="text/javascript">
  $(document).ready(function() {
    $("show_edit").click(function(event){
  event.preventDefault();
  alert("ok");
}); 
  });
</script>