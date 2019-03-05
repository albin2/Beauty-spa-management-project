<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Wellness' }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('logtem/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logtem/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logtem/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logtem/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('logtem/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logtem/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logtem/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('logtem/vendor/daterangepicker/daterangepicker.css')}}"> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logtem/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('logtem/css/main.css')}}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Wellness
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('CHANGE PASSWORD') }}</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('feedback') }}">{{ __('GIVE FEEDBACK') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @isset($data)
                        @foreach($data as $item)
                        <a class="dropdown-item" href="{{ route('service-details-user', $item['id'])}}">{{$item['servname']}}</a>
                        @endforeach
                        @endisset
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>
                
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('SPECIALISTS') }}</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
        <div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('logtem/images/bg-01.jpg')}}');" >
                    <form action="{{ route('makeappointment') }}" method="post">
                    <div class="box-title" margin-top ><center><h3 class="pb-5"><b>Select your Appointment date....</b></h3></center>
            </div>
                    @csrf
                        <input type="text" name="bdate" id="datepicker" placeholder="Pick a Date" class="form-control" required>
                        <br>
                        <div class="alert alert-info" id="userInfo">
                            Select a date to Continue!
                        </div>
                        </br>
                        <input hidden name="time" value="0" id="b-time">
                        </br>
                        <div class="text-center">
                        <input type="submit" id="confirm-booking" class="btn btn-primary btn-sm" readonly value="Confirm Booking">
                    </div>
                    </form>

            </div>
            </div>
        </main>
    </div>
        <script>
       $( function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: false,
            minDate: 1,
            maxDate: "+1m +1w",
            dateFormat: "yy-mm-dd"
        });

        //date change
        $("#datepicker").on("change", function(){
            $date = $(this).val();
            //date check
            $.ajax({
                url:'/user/check/date',
                method:'get',
                data:{'date':$date},
                success:function(data){
                    //result
                    if(data=='0'){
                        $("#userInfo").html("Date is not Available");
                    }else{
                        $("#userInfo").html("Date is Available. Scheduled Time : " + data);
                        $("#b-time").val(data);
                        $("#confirm-booking").removeAttr("disabled");
                    }
                }
                ///on(focousot
            });
        });
      } );
     </script>
</body>
</html>
