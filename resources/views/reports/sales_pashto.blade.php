<script type="text/javascript">
	window.print();
</script>
@extends('layouts.reportsApp')

@section('title')
  Sale_english <?PHP echo date("YY-mm-dd"); ?> Report
@endsection

@section('content')

 <div class="container" style="margin-top: 10px; margin-bottom: 10px; border: 1px dashed #F8D7DA;">
      <h2 style="float: right;">د خرڅلاو راپور</h2><br>

      <table class="table table-hover text-right"   style="text-align: right;">
      	<tr>
      		
      		<th>وخت</th>
          <th>د جنس شمیر په ګودام کی</th>
          <th>بودیجه</th>
          <th>ګټه</th>
          <th>پور</th>
          <th>دمشتری نوم/موبایل</th>
          <th>د خرڅ شوی جنس شمیر</th>
          <th>د جنس نوم</th>
      	</tr>
      	@foreach($sales as $sales)
   <tr>

     <td>{{$sales->created_at}}</td>
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
     <td>{{$sales->quantity}}</td>
     <td>{{$sales->imports->p_name}}</td>
 </tr>
      	@endforeach
      	
      </table>

      <div class="card box-shadow bg-inverse col-lg-3 col-md-3 col-sm-10 col-xs-12 text-right" style="padding: 5px; margin: 5px; font-weight: bold; font-style: italic; float: right; text-indent: rtl;">
      	  ټوله ګټه:  {{$total_profit}}  <br>د ترلاسه شوو پیسو مجموعه: {{$total_paid}} <br>مجموعی قرضونه : {{$total_loans}}
      </div>
      
 </div>
@endsection


 <!-- include jquery cdns -->
@include('layouts.jquery')