<script type="text/javascript">
	window.print();
</script>
@extends('layouts.reportsApp')

@section('title')
 {{$customer->name}}
@endsection

@section('content')

<div class="container" style="margin-top: 10px; margin-bottom: 10px; border: 1px dashed #F8D7DA;">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
   <h2>{{$customer->name}}'s purchases Report &nbsp; &nbsp; </h2 >  
	     
	     <table class="table table-striped">
	        <tr>
	            <th>T-No</th>
	            <th>Our Employee</th> 
	            <th>Product</th>
	            <th>Quantity</th>
	            <th>Unit Price</th>
	            <th>Total Price</th>
	            <th>Discount</th>
	           <!--  <th>Net Total</th> -->
	            <th style="color: green;">Paid</th>
	            <th style="color: red;">Balance</th>
	            <th>Description</th>
	            <th>T_time</th>
	            <!-- <th>Status</th> -->
	        </tr>
	        @foreach($sales as $sale)
	         <tr>
	            <td>{{$loop->index+1}}</td>
	            <td>  {{$sale->user->name}}</td>
	            <td>{{$sale->imports->p_name}}</td>
	            <td>{{$sale->quantity}}</td>
	            <td>{{$sale->price}}</td>
	            <td>{{$sale->price*$sale->quantity}}</td>
	            <td>{{$sale->discount}}%</td>
	            <!-- <td>{{$sale->net_total}}</td> -->
	            <td style="color: green;">{{$sale->paid}}</td>
	            <td style="color: red;">@if($sale->balance<5 and $sale->balance>-5)
                               completed
                               @else
                               {{$sale->balance}}
	            	 @endif</td>
	            <td>{{$sale->description}}</td>
	            <td>{{$sale->created_at}} &nbsp;(<span class="badge badge-info">
	                
	            {{$sale->created_at->diffForHumans()}}
	            </span> )
	        </td>
	       <!--   <td>
	          @if($sale->balance == 0)
	              <i>Completed</i><br>
	               
	          @else
	          <i>Not completed</i><br>
	       
	          @endif
	       	        </td> -->
	        </tr>
	        @endforeach
	        <tr style="border: 1px solid #F8D7DA;">
	        	<td><span class=""> Total(all orders) balance:</span></td>
	        	<td ><span class="badge bg-danger text-white" style="font-weight: bold; font-size: 20px; margin-top: 10px; "> {{$total_balance}}</span></td>

		@if($total_transactions>1)
	            <td style="border: 1px solid #F8D7DA;">You have <span style="color: red; font-weight: bold;">
		  {{$total_transactions-1}}

	        </span> other Deals as well.</td>
		@endif
		
	        </tr>
	     </table>
	    </div>

</div>

@endsection


 <!-- include jquery cdns -->
@include('layouts.jquery')