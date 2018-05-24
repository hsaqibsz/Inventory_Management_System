<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   <!--  from clean blog -->

   <!-- Theme CSS -->
   <link href="{{asset('libraries/clean-blog/css/clean-blog.min.css')}}" rel="stylesheet">

   <!-- Custom Fonts -->
   <link href="{{asset('libraries/clean-blog/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


   <!--  from clean blog -->

    <!-- Styles -->
    <link href="{{ asset('libraries/css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">

       <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary" style="">
             <div class="container">
               <a href="{{route('welcome')}}" class="navbar-brand">Wahdat Shop</a>
               <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="">
                 <span class="navbar-toggler-icon"></span>
               </button>
               <div class="navbar-collapse collapse" id="navbarResponsive" style="">
                 <ul class="navbar-nav">
                    
                   <li class="nav-item">
                     <a class="nav-link" href="{{route('welcome')}}">Home</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="{{route('about')}}">About</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" href="{{route('contact.create')}}">Contact</a>
                   </li>

                   <li class="nav-item">
                     <a class="nav-link" href="#">Order</a>
                   </li>

  @if(Auth::check())
   @if(Auth::user()->admin == 1)
                   <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">Admins menu <span class="caret"></span></a>
                     <div class="dropdown-menu" aria-labelledby="download">
                       <a class="dropdown-item" href="{{route('imports.index')}}">Imports</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{route('category.index')}}">Category</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{route('sales.index')}}">Sales</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{route('customer.index')}}">Customers</a>
                        <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{route('contact.index')}}">Contacts</a>
                     </div>
                   </li>
    @endif
  @endif 

   @if(Auth::check())
   @if(Auth::user()->admin == 1)
                   <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">Admins Reports <span class="caret"></span></a>
                     <div class="dropdown-menu" aria-labelledby="download">
                       <!-- <a class="dropdown-item" href="{{route('sales_english')}}">Sales Report</a> -->
                       <a class="dropdown-item" href="{{route('sales_pashto')}}">دخرڅلاو راپور</a>

                       <form method="post" action="{{route('sales_english')}}" >
                                                  {{csrf_field()}}
                                                  <input type="submit" value="sales report" class="dropdown-item">
                                              </form>

                       <div class="dropdown-divider"></div>
                      
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{route('stock_english')}}">Stock Report</a>
                       <a class="dropdown-item" href="{{route('stock_pashto')}}">د ګدام راپور</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{route('customer_english')}}">Customers Report</a>
                       <a class="dropdown-item" href="{{route('customer_pashto')}}">د مشتریانو راپور</a>
                        <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{route('deal_english')}}">Indebted Customers Report</a>
                       <a class="dropdown-item" href="{{route('deal_pashto')}}">د قرضدارانو راپور</a>
                     </div>
                   </li>
    @endif
  @endif
                 </ul>

                 <ul class="nav navbar-nav ml-auto">
                @guest
                   <li class="nav-item">
                     <a class="nav-link" href="{{route('register')}}" >Register</a>
                   </li>
                    <li class="nav-item">
                     <a class="nav-link" href="{{route('login')}}" >Login</a>
                   </li>
                 @else
                    <li class="nav-item dropdown " >
                             <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 {{ Auth::user()->name }} <span class="caret"></span>
                             </a>

                             <ul class="dropdown-menu" role="menu">
                                 <li>
                                     <a href="{{ route('logout') }}"  id="logout-link" 
                                         onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                         Logout
                                     </a>

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         {{ csrf_field() }}
                                     </form>
                                 </li>
                             </ul>
                         </li>
                @endguest
                 </ul>

               </div>
             </div>
           </div>
   <br>
   <br>
   <hr  />

 

        @yield('content')
        
      @include('layouts.messanger')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('libraries/js/app.js') }}"> </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    


 
 <style type="text/css">
   #logout-link{
    color:black;
    margin: 4px;
    text-align: center;
    text-decoration: none;
    
   } 

 </style>

 <script src="{{ asset('libraries/js/main.js') }}"> </script>
 
     <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
     {!! Toastr::render() !!}
  <script type="text/javascript">
         @if(Session::has('success'))
                    toastr.success("{{Session::get('success')}}")
         @endif

         @if(Session::has('error'))
                    toastr.error("{{Session::get('error')}}")
         @endif
        @if(Session::has('info'))
                    toastr.info("{{Session::get('info')}}")
         @endif
       @if(Session::has('warning'))
                    toastr.warning("{{Session::get('warning')}}")
         @endif


    </script>


    <script type="text/javascript">
      $(document).ready(function() {
         alert('implement messanger popout');
      });
    </script>


</body>
</html>