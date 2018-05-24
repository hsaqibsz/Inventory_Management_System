@extends('layouts.app')
@section('content')
   <div class="container">
     
    <h2>{{$customer->name}}'s purchases form &nbsp; &nbsp; <a href="{{route('customer.index')}}" class="btn btn-primary">Go to Customers</a></h2 >
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
         
         <table class="table table-hover">
            <tr>
                <th>Transaction No</th>
                <th>Our Employee</th> 
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Discount</th>
                <th>Total</th>
               <!--  <th>Net Total</th> -->
                <th>Paid</th>
                <th>Balance</th>
                <th>Description</th>
                <th>T_time</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
            @foreach($sales as $sale)
             <tr>
                <td>{{$loop->index+1}}</td>
                <td>  {{$sale->user->name}}</td>
                <td>{{$sale->imports->p_name}}</td>
                <td>{{$sale->quantity}}</td>
                <td>{{$sale->price}}</td>
                <td>{{$sale->discount}}%</td>
                <td>{{$sale->total}}</td>
               <!--  <td>{{$sale->net_total}}</td> -->
                <td>{{$sale->paid}}</td>
                <td>{{$sale->balance}}</td>
                <td>{{$sale->description}}</td>
                <td>{{$sale->created_at}} &nbsp;(<span class="badge badge-info">
                    
                {{$sale->created_at->diffForHumans()}}
                </span> )
            </td>
             <td>
                @if($sale->balance == 0)
                    <i>Completed</i><br>
                    <form method="post" action="{{route('sales.destroy', $sale->id)}}">
                        {{method_field("DELETE")}}
                        {{csrf_field()}}
                    <input type="submit" value="Delete" class="btn-block btn-danger btn-sm" >
                    </form>
                @else
                <i>Not completed</i><br>
                <button  class="btn-block btn-danger btn-sm" disabled="true" title="this Transaction is Not completed becouse its deletion will be danger and is not your authority">Delete</button>
                @endif
            </td>
             <td>
                 <a href="{{route('sales.edit',$sale->id)}}" class="btn btn-outline-success">Edit</a>
             </td>
            </tr>
            @endforeach
            <tr style="border: 1px solid #F8D7DA;"><td><span class="alert-danger" id="alert-danger"> Total balance:</span></td><td><span class="alert-danger" style="font-weight: bold; font-size: 20px;"> {{$total_balance}}</span></td>
               <td><a href="{{route("sales.print", $customer->id)}}" class="btn btn-outline-secondary">Print General Report</a></td>
               <td><a href="{{route("sales.print.last", $customer->id)}}" class="btn btn-sm btn-outline-primary">Print Last Order Report</a></td>
            </tr>
         </table>
        </div>
         <br><br><br>
         <hr>
         <br>
 
 
  <h2>Add New Order</h2>
   <form method="post" action="{{route('sales.store')}}">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       {{csrf_field()}}
   
    	 	<div class="form-group">
    	 		<label>Product Name (Available Quantity){Price}</label>
    	 		 <select class="form-control align-self-lg-center" name="imports_id" id="price" onchange="total_balance()">
    	 		@foreach($imports as $import)
                           <option value="{{$import->id}},{{$import->price}};{{$import->profit}}" >{{$import->p_name}}
                    @if($import->p_quantity<100)
                            (  {{$import->p_quantity}}qty )
                     @endif
                     { {{$import->price}} <small>Afg</small> }
                        </option>
    	 		@endforeach
    	 		    </select>
                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
    	     	</div>

            <div class="form-group">
                <label>Quantity</label>
                 <input type="number" class="form-control" id="quantity" name="quantity" placeholder="select or type how many he/she wants" onblur="total_balance()">
            </div>


            <div class="form-group" id="unit_price_lable" style="display: none;">
                <label>Unit Price</label>
                 <input type="number" class="form-control custom-select-sm" id="unit_price" name="price"  disabled="true" onblur="total_balance()">
                 <input type="hidden" name="price1" id="unit_price1">
            </div> 

            <div class="form-group">
                <label>Discount</label>
                  <select class="form-control custom-select-sm" name="discount" id="discount" onchange="total_balance()">
                      <option value="0">No Discount</option>
                      <option value="1">1 %</option>
                      <option value="2">2 %</option>
                      <option value="3">3 %</option>
                      <option value="4">4 %</option>
                      <option value="5">5 %</option>
                      <option value="6">6 %</option>
                      <option value="7">7 %</option>
                      <option value="8">8 %</option>
                      <option value="9">9 %</option>
                      <option value="10">10 %</option>

                  </select>
            </div>

            <div class="form-group" id="total_label" style="display: none;">
                <label>Total</label>
                 <input type="number" class="form-control" id="total" name="total" disabled="true">
                 <input type="hidden" name="total1" id="total1">
            </div>

    	 	<div class="form-group" id="net_total_label" style="display: none;">
                <label>Net Total</label>
                 <input type="number" class="form-control" id="net_total" name="net_total"  disabled="true">
                 <input type="hidden" name="net_total1" id="net_total1">
            </div>

            

            <div class="form-group">
                <label>Paid </label> &nbsp; <span id="total_balance" style="color: red; font-weight: bold; display: none;" class="alert alert-info"> </span>
                 <input type="number" class="form-control" id="paid" name="paid" placeholder="type amount of mony that customer paid" onblur="total_balance()">
            </div>

            <div class="form-group">
                <label>Description</label>
                  <textarea class="form-control" name="description" placeholder="type any thing extra if there is needed!"></textarea>
            </div>

        <input type="hidden" name="profit" id="profit">
        <input type="hidden" name="priceDefault" id="priceDefault">
 
    	 	<div class="form-group">
    	 		    <input type="submit" value="Order" class="btn btn-outline-primary" name="">

    	 	</div>
    	 	 
    	 </div>
   </form>
    
</div>
@endsection

<script type="text/javascript">
    function total_balance()
    {      
       
        var price = document.getElementById('price').value;

          var  price1 = parseInt(price.substring(price.indexOf(',') + 1 ,price.indexOf(';') )); 
          var profit = price.substring(price.indexOf(';') +1, price.length);

     

 
         var quantity = document.getElementById('quantity').value;
         var paid = document.getElementById('paid').value;
         var discount = document.getElementById('discount').value;

          profit = parseInt(profit);
          price1 = parseInt(price1);
          discount = parseInt(discount);
 
         var unit_profit = Math.ceil(parseInt(price1*profit/100));
         var price2 = parseInt(price1)+ unit_profit; // we should add profit to this without adding discount becouse after discount price should seen by customer.
         var total_discount = Math.round((price2*discount/100)*quantity);
 

        if (quantity <1 ) {
            quantity = 1;
          document.getElementById('quantity').value = 1;
           }

        if (paid<1) {
            paid = 0;
            document.getElementById('paid').value = 0;
        }

         var total_profit = unit_profit*quantity;

         var total = price2*quantity-paid;

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
        
        document.getElementById('total_balance').style.display="inline";
        document.getElementById('unit_price_lable').style.display="inline";
        document.getElementById('net_total_label').style.display="inline";
        document.getElementById('total_label').style.display="inline";



        document.getElementById('unit_price').value = price2;
        document.getElementById('unit_price1').value = price2;

        document.getElementById('net_total').value = net_total;
        document.getElementById('net_total1').value = net_total;

        document.getElementById('total_balance').innerHTML="Balance: "+ net_total_status + " "+net_total+" Afg";

        document.getElementById('total').value= total;
        document.getElementById('total1').value= total;

        document.getElementById('priceDefault').value = price1;
        document.getElementById('profit').value = total_profit;
    }

</script>



 <!-- include jquery cdns -->
@include('layouts.jquery')