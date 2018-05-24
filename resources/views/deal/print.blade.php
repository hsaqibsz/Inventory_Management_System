
@extends('layouts.reportsApp')
@section('title')
   {{$customer->name}}'s  Report
@endsection
@section('content')
    <div class="container" style="margin-top: 10px; margin-bottom: 10px; border: 1px dashed #F8D7DA;">
     <h2>{{$customer->name}}'s Loans/Deals  </h2><br>
    

  
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

    	 <table class="table table-striped">
    	 	<tr>
    	 		<th>Transaction No</th>
    	 		<th>Customer Name/Phone with Us</th> 
    	 		<th>Description</th>
    	 		<th>Debit</th>
    	 		<th>Credit</th>
    	 		<th>Balance</th>
    	 		<th>T_time</th>
    	 		<th>Status</th>
    	 	</tr>
    	 	@foreach($deals as $deal)
    	 	<tr>
    	 		<td>{{$deal->bill_number}} </td>
    	 		<td>{{$customer->name}}/{{$customer->phone}} &nbsp; with  <br> <span style="color: #F8D7DA; font-weight: bold;"> {{$deal->user->name}}</span></td>
    	 		 
    	 		<td>{{$deal->description}}</td>
    	 		<td>{{$deal->debit}}</td>
    	 		<td>{{$deal->credit}}</td>
    	 		<td>{{$deal->balance}}</td>
    	 		<td>{{$deal->created_at}} &nbsp;(<span class="badge badge-info">
    	 			
    	 		{{$deal->created_at->diffForHumans()}}
    	 		</span> )
    	 	</td>
    	 	 <td>
                @if($deal->balance == 0)
                    <i>Completed</i><br>
                     
                @else
                <i>Not completed</i><br>
               
                @endif
            </td>
    	 	</tr>
    	 	@endforeach
            <tr style="border: 1px solid #F8D7DA;"><td><span class="alert-danger"> Total balance:</span></td><td><span class="alert-danger" style="font-weight: bold; font-size: 20px;"> {{$total_balance}}</span></td>
            </tr>
    	 </table>

        </div>


        </div>
@include('layouts.jquery')