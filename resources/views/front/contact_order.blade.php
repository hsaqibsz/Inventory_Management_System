@extends('layouts.app')

@section("content")

        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="margin: 0 auto;  padding: 10px;">
<div class="card   box-shadow col-sm" >
<div class="card-body">
<h1 class=" pricing-card-title text-center text-capitalize card-header" style="padding: 5px; border-radius: 5px;">Contact Us </h1>
     <i class="badge badge-info"> </i>
         <!-- Main Content -->
                     
                     <form  method="post" action="{{route('contact.store')}}">
                     	{{csrf_field()}}
                         <div class="row control-group">
                             <div class="form-group col-lg-12 col-md-12 floating-label-form-group controls">
                                 <label>Name</label>
                                 <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name."  name="name" >
                                 <p class="help-block text-danger"></p>
                             </div>
                         </div>
                         <div class="row control-group">
                             <div class="form-group col-lg-12 col-md-12 floating-label-form-group controls">
                                 <label>Email Address</label>
                                 <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address." name="email">
                                 <p class="help-block text-danger"></p>
                             </div>
                         </div>
                         <div class="row control-group">
                             <div class="form-group col-lg-12 col-md-12 floating-label-form-group controls">
                                 <label>Phone Number</label>
                                 <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number." name="phone">
                                 <p class="help-block text-danger"></p>
                             </div>
                         </div>
                         <div class="row control-group">
                             <div class="form-group col-lg-12 col-md-12 floating-label-form-group controls">
                                 <label>Message</label>
                                 <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message." name="message"></textarea>
                                 <p class="help-block text-danger"></p>
                             </div>
                         </div>
                         <br>
                         <div id="success"></div>
                         <div class="row">
                             <div class="form-group col-xs-12">
                                 <button type="submit" class="btn btn-default">Send</button>
                             </div>
                         </div>
                     </form>
                
           
</div>
</div>
</div>







@endsection

@include('layouts.jquery')

<!-- jQuery
<script src="{{asset('libraries/clean-blog/vendor/jquery/jquery.min.js')}}"></script>

Bootstrap Core JavaScript
<script src="{{asset('libraries/clean-blog/vendor/bootstrap/js/bootstrap.min.js')}}"></script> -->

 <!-- Contact Form JavaScript -->
    <script src="{{asset('libraries/clean-blog/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('libraries/clean-blog/js/contact_me.js')}}"></script>

    <!-- Theme JavaScript -->
    <script src="{{asset('libraries/clean-blog/js/clean-blog.min.js')}}"></script>