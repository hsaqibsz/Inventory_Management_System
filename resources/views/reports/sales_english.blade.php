<script type="text/javascript">
	window.print();
</script>
@extends('layouts.reportsApp')

@section('title')
  Sale_english <?PHP echo date("Y-m-d"); ?> Report
@endsection

@section('content')

 <div class="container" style="margin-top: 10px; margin-bottom: 10px; border: 1px dashed #F8D7DA;">
      <h2>Sales Report</h2><br>

      <table class="table table-hover"   style="text-align: left;">
      	<tr>
      		<th>Product</th>
      		<th>Qty Saled</th>
      		<th>Qty In Stock</th>
      		<th>Budget</th>
      		<th>Profit</th>
      		<th>loan</th>
      		<th>Customer/Phone</th>
      		<th>time</th>
      	</tr>
      	@foreach($sales as $sales)
   <tr>
     <td>{{$sales->imports->p_name}}</td>
     <td>{{$sales->quantity}}</td>
       <td>
     @if($sales->imports->p_quantity<100)
     <span class="alert alert-danger" >
        {{$sales->imports->p_quantity}}
      </span>
      @else
     {{$sales->imports->p_quantity}}
      @endif
      </td>
     <td>{{$sales->imports->price*$sales->quantity}}</td>
     <td>{{$sales->profit}}</td>
     <td>{{$sales->balance}} </td>
     <td>{{$sales->customer->name}}/{{$sales->customer->phone}}</td>
     <td>{{$sales->created_at->diffForHumans()}}</td>
 </tr>
      	@endforeach
      	
      </table>

      <div class="card box-shadow bg-inverse col-lg-3 col-md-3 col-sm-10 col-xs-12" style="padding: 5px; margin: 5px; font-weight: bold; font-style: italic;">
      	  total Profit:  {{$total_profit}}  <br>total Paid: {{$total_paid}} <br>total loans: {{$total_loans}}
      </div>
      
 </div>
@endsection


 <!-- include jquery cdns -->
@include('layouts.jquery')