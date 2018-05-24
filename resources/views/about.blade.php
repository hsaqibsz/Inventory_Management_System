@extends('layouts.app')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('libraries/clean-blog/img/about-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>About Me</h1>
                    <hr class="small">
                    <span class="subheading">This is what I do.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae debitis nobis, quod sapiente qui voluptatum, placeat magni repudiandae accusantium fugit quas labore non rerum possimus, corrupti enim modi! Et.</p>
        </div>
    </div>
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