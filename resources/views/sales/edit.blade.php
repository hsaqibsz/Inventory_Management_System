@extends('layouts.app')
 
@section('content')
    <div class="container">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
    
    <h2>{{$sale->customer->name}}'s purchases Edit form &nbsp; &nbsp; <a href="{{route('customer.index')}}" class="btn btn-primary">Go to Customers</a></h2 >
 
 
   <form method="post" action="{{route('sales.update',$sale->id)}}">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       {{csrf_field()}}
       {{method_field('patch')}}
   
    	 	<div class="form-group">
                <span id='change_warning' class="alert alert-warning" style="display: none;">Sory, these changes will apply on Original(first loaded) product</span>
    	 		<label>Product Name (Available Quantity){Price}</label>
    <select class="form-control align-self-lg-center" name="imports_id" id="price" onclick="alert('Sorry! you can only change its quantity, price, discount and description')"   >
    	 @foreach($imports as $import)
                           <option value="{{$import->id}},{{$import->price}}" 
        @if($sale->imports_id == $import->id)
        selected="true" 
        @endif
          >            {{$import->p_name}}
                    @if($import->p_quantity<100)
                            (  {{$import->p_quantity}}qty )
                     @endif
                     { {{$import->price}} <small>Afg</small> }
                        </option>
       @endforeach
    	 		    </select>


                    <input type="hidden" name="customer_id" value="{{$sale->customer_id}}">

    	     	</div>

    	 	<div class="form-group">
                <label>Quantity</label>
                 <input type="number" class="form-control" id="quantity" name="quantity" placeholder="select or type how many he/she wants" value="{{$sale->quantity}}" onblur="total_balance()">
            </div>

            <div class="form-group">
                <label>Price</label>
                 <input type="number" class="form-control" id="price_input_box" name="price"    value="{{$sale->price}}" onblur="total_balance()">
            </div>
 

                    <div class="form-group">
                        <label>Discount</label>
                          <select class="form-control custom-select-sm" name="discount" id="discount" onchange="total_balance()">

                              <option  @if($sale->discount == 0)
                                   selected
                            @endif value="0">No Discount</option>

                              <option  @if($sale->discount == 1)
                                   selected
                            @endif value="1">1 %</option>

                              <option  @if($sale->discount == 2)
                                   selected
                            @endif value="2">2 %</option>

                              <option  @if($sale->discount == 3)
                                   selected
                            @endif value="3">3 %</option>

                              <option  @if($sale->discount == 4)
                                   selected
                            @endif value="4">4 %</option>

                              <option  @if($sale->discount == 5)
                                   selected
                            @endif value="5">5 %</option>

                              <option  @if($sale->discount == 6)
                                   selected
                            @endif value="6">6 %</option>

                              <option  @if($sale->discount == 7)
                                   selected
                            @endif value="7">7 %</option>

                              <option  @if($sale->discount == 8)
                                   selected
                            @endif value="8">8 %</option>

                              <option  @if($sale->discount == 9)
                                   selected
                            @endif value="9">9 %</option>

                              <option  @if($sale->discount == 10)
                                   selected
                            @endif value="10">10 %</option>

                          </select>
                    </div>

                    <div class="form-group" id="total_label" style="display: none;">
                        <label>Total</label>
                         <input type="number" class="form-control" id="total" value="{{$sale->total}}" name="total" disabled="true">

                         <input type="hidden" name="total1" id="total1">
                    </div>

                    <div class="form-group" id="net_total_label" style="display: none;">
                        <label>Net Total &nbsp; &nbsp; <span class="alert-success alert-dismissible" id="total_discount_label" style="display: none;">  </span></label>
                         <input type="number" class="form-control" id="net_total" value="{{$sale->net_total}}" name="net_total"  disabled="true">

                         <input type="hidden" name="net_total1" id="net_total1">
                         <input type="hidden" name="profit" id="profit" value="{{$sale->profit}}">
                    </div>



            <div class="form-group">
                <label>Paid</label> &nbsp; <span id="total_balance_label" style="color: red; font-weight: bold; display: none;" class="alert alert-info"> </span>
                 <input type="number" class="form-control" id="paid" name="paid" placeholder="type amount of mony that customer paid" value="{{$sale->paid}}" onblur="total_balance()">
            </div>

            <div class="form-group">
                <label>Description</label>
                  <textarea class="form-control" name="description" placeholder="type any thing extra if there is needed!"> {{$sale->description}} </textarea>
            </div>
 
    	 	<div class="form-group">
    	 		    <input type="submit" onsubmit="enable()" value="Save Changes" class="btn btn-outline-danger" name="">
                      
                    
    	 	</div>
    	 	 
    	 </div>
      
   </form>
 
  

 
</div>
@endsection


<script type="text/javascript">
    function total_balance()
    {
        var price = document.getElementById('price_input_box').value;

         //var  price1 = price.substring(price.indexOf(',') + 1 ,price.length); //this is for geging from combo box
         var quantity = document.getElementById('quantity').value;
         var paid = document.getElementById('paid').value;
          var discount = document.getElementById('discount').value;

        if (quantity <1 ) {
         quantity = 1;
          document.getElementById('quantity').value = 1;
           }

        if (paid<1) {
            paid = 0;
            document.getElementById('paid').value = 0;
        }

         var total = price*quantity-paid;

         var total_discount = Math.round((price*discount/100)*quantity);
         var net_total = total-total_discount; 

         var net_total_status = "";
         if (net_total>0) {
            net_total_status = "Customer Must pay:";
         }else if (net_total<0) {
            net_total_status = "We Must Pay: ";
         }else{
            net_total_status = "Deal Completed, No mony remained to Customer or Us";
         }


        //document.getElementById('total_balance').innerHTML=total;
        //document.getElementById('total_balance').style.display="inline";
        //document.getElementById('unit_price_lable').style.display="inline";
        document.getElementById('net_total_label').style.display="inline";
        document.getElementById('total_label').style.display="inline"; 

        document.getElementById('total_balance_label').style.display="inline";
        document.getElementById('total_balance_label').innerHTML="Balance: "+net_total_status+" "+net_total;

       if (total_discount>0) {

        document.getElementById('total_discount_label').style.display="inline";
        document.getElementById('total_discount_label').innerHTML = total_discount+ "  subtracted from original price by "+ discount+"% discount";
   }
        
        document.getElementById('net_total').value = net_total;
        document.getElementById('net_total1').value = net_total;

        document.getElementById('total').value= total;
        document.getElementById('total1').value= total;

    }


</script>


 <!-- include jquery cdns -->
@include('layouts.jquery')