@extends('layouts.app')

@section('content')

 <!-- Page Header -->
 <!-- Set your background image for this header on the line below. -->
 <header class="intro-header" style="background-image: url('libraries/clean-blog/img/home-bg.jpg'); margin-top: -25px;">
     <div class="container">
         <div class="row">
             <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                 <div class="site-heading">
                     <h1>{{ENV('APP_NAME')}}</h1>
                     <hr class="small">
                     <span class="subheading">Tailor Machines, Dresses, veils, Electric equipment in <span style="color:red;">Best quality </span> and Flexible discount </span>
                 </div>
             </div>
         </div>
     </div>
 </header>
     
  <div class="container">

 <h1>New Orders</h1><br>
  <div class="card-deck mb-3 text-center">

    @foreach($imports as $import)
 @if($loop->index>2)
 @break
@endif
          <div class="card   box-shadow col-sm" >
          <div class="card-body">
             <img src="{{$import->p_image}}" class="card-img"> 
          <h1 class="card-title pricing-card-title">{{$import->p_name}}&nbsp; </h1>
              @if($import->neworuse == 1) 
          <i class="badge badge-success">
            New</i>
             @else
             <i class="badge badge-danger">
          Used

          </i>
           @endif
 
            <ul class="list-unstyled mt-3 mb-4">
              <li style="text-decoration: line-through;">Price: {{$import->price+rand(300, 500)+($import->profit*$import->price/100)}} </li>
              <li> {{$import->profit/2 + rand(10, 15)}}% discount </li>
              
              <li>now available per&nbsp;<i class="badge badge-info">{{$import->price+($import->profit/2)}}</i>  </li>
              <li> </li>
            </ul>
            <!-- <a href="#" class="btn btn-lg btn-block btn-primary disabled" id="details_link" >Details</a> -->
            @if($import->is_trusted_by_auth_user())
            <a href="{{route('remove_review', $import->id)}}" id="interest" class="interest">
                <span class="fa-stack fa-lg r">
                    <i class="fa fa-circle fa-stack-2x " style="color: #cc0000;"></i>
                    <i class="fa fa-heart fa-stack-1x fa-inverse"></i>
                </span>
            </a>  <span style="color:#969191; "><span style="font-weight: bold;">{{$import->reviews()->count()}}</span> Interests & reviews</span>

            @else

    <a href="{{route('add_review', $import->id)}}" id="interest" class="interest">
        <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x " ></i>
            <i class="fa fa-heart fa-stack-1x fa-inverse"></i>
        </span>
    </a>  <span style="color:#969191; "><span style="font-weight: bold;">{{$import->reviews()->count()}}</span> Interests & reviews</span>
            @endif

        <!--     <div class="box-shadow small"   id="review{{$loop->index}}" style="display: none;">
          {{$loop->index}}
          <input type="hidden" id="unique" name="unique" value="{{$loop->index}}">
          <textarea name="review" class="form-control"></textarea>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 " style="margin-top: -3px;">   
          <input type="submit" name="" value="Ok" class="btn btn-sm btn-primary" style="margin: 6px; float: left; margin-left: -10px;" >
          </div>
        
        </div> -->

          </div>
          </div>
      @endforeach   
 
 </div>
     {{$imports->links()}}
     </div>


 <!-- Footer -->
 <footer >
 
      
             <div class="card box-shadow col-lg-12 col-md-12 col-sm-12 " style="margin-bottom: -100px !important; padding: 10px;  ">
                 <ul class="list-inline text-center" style="display: inline; text-align: center;">
                     <li style="display: inline; text-align: center;">
                         <a href="#">
                             <span class="fa-stack fa-lg">
                                 <i class="fa fa-circle fa-stack-2x"></i>
                                 <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                             </span>
                         </a>
                     </li>
                     <li style="display: inline; text-align: center;">
                         <a href="#">
                             <span class="fa-stack fa-lg">
                                 <i class="fa fa-circle fa-stack-2x"></i>
                                 <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                             </span>
                         </a>
                     </li>
                     <li style="display: inline; text-align: center;">
                         <a href="#">
                             <span class="fa-stack fa-lg">
                                 <i class="fa fa-circle fa-stack-2x"></i>
                                 <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                             </span>
                         </a>
                     </li>
                 </ul>
                  <span style="float: left;"><a href="#">
                             <span class="fa-stack fa-lg">
                                 <i class="fa fa-circle fa-stack-2x"></i>
                                 <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                             </span>
                         </a> <span style="color:#9e9e9e;">Ghazni, Afghan Market Second Floor</span></span>
             <p class="copyright text-muted"> &nbsp; Copyright &copy; Hedayatullah Wahdate <?PHP echo date('Y'); ?> &nbsp; </p>
             </div>
         
   
 </footer>
 
    @endsection


 <!-- include jquery cdns -->
@include('layouts.jquery')

 <script type="text/javascript">
   $(document).ready(function() {
   $('.review').hide();
     $('.interest').each(function(index, el) {
    
       event.preventDefault();
       //$('.review').slideUp('500');
      var unique =  $(this).find('unique').val();
      alert(unique);

   });


     });
 </script>