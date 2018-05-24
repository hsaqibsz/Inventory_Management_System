@extends('layouts.app')

@section('content')
    <div class="container">
     <h2>{{$customer->name}}'s Loans/Deals &nbsp; &nbsp; <a href="{{route('customer.index')}}" class="btn btn-primary">Go to Customers</a> </h2>
    

  
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
    	 
    	 <table class="table table-hover">
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
                    <form method="post" action="{{route('deal.destroy', $deal->id)}}">
                        {{method_field("DELETE")}}
                        {{csrf_field()}}
                    <input type="submit" value="Delete" class="btn-block btn-danger btn-sm" >
                    </form>
                @else
                <i>Not completed</i><br>
                <button  class="btn-block btn-danger btn-sm" disabled="true">Delete</button>
                @endif
            </td>
    	 	</tr>
    	 	@endforeach
            <tr style="border: 1px solid #F8D7DA;"><td><span class="alert-danger"> Total balance:</span></td><td><span class="alert-danger" style="font-weight: bold; font-size: 20px;"> {{$total_balance}}</span></td>
               <td><a href="{{route("deal.print", $customer->id)}}" class="btn btn-outline-secondary">Print Report</a></td>
            </tr>
    	 </table>
        </div>
    	 <br><br><br>
    	 <hr>
    	 <br>
    	  
<div> <h2> Create New Deal</h2></div>
    	 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form method="post" action="{{route('deal.store')}}">
    {{csrf_field()}}
    	 	<div class="form-group">
    	 		<label>Customer Name/Phone</label>
    	 		 <select class="form-control align-self-lg-center" name="customer_id">
    	 		@foreach($customers as $customers)
                           <option value="{{$customers->id}}">{{$customers->name}}/{{$customers->phone}}</option>
    	 		@endforeach
    	 		    </select>
    	 		
    	 	</div>

    	 	<div class="form-group">
    	 		<label>Description</label>
    	 		<textarea class="form-control" name="description"></textarea>
    	 	</div>

    	 	<div class="form-group">
    	 		<label>Debit</label>
    	 		<input type="number" class="form-control" name="debit">
    	 	</div>

    	 	<div class="form-group">
    	 		<label>Credit</label>
    	 		<input type="number" class="form-control" name="credit">
    	 	</div>

    	 	<div class="form-group">
    	 		    <input type="submit" value="Add Transaction" class="btn btn-outline-primary" >
    	 	</div>
    	 	 
    	 </div>

    	  </form>
    	
    </div>
    	
 
@endsection
@include('layouts.jquery')