

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'PAPAYA' }}</title>

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
            <div class="container-fluid">
                <div class="page-header-left"><a class="brand" href="/home"><img src="http://127.0.0.1:8000/theam/images/logo-default-199x36.png" alt="" width="199" height="36"></a></div>
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
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
            <div class="container-login100" style="background-image: url('{{ asset('logtem/images/bg-01.jpg')}}');">
                
            <div class="row">
                <div class="col">
                <form action="{{ route('makeappointment') }}" class="pt-5 mt-5" method="post">
                    <div class="box-title text-center pt-5" margin-top>
     
                            <h3 class="pt-5"><b>Select your Appointment date....</b></h3>
                     
                    </div>
                    @csrf
                    <input type="text" name="bdate" id="datepicker" placeholder="Pick a Date" class="form-control mt-5" required>
                    <br>
                    <div class="alert alert-info mb-5" id="userInfo">
                        Select a date to Continue!
                    </div>
                    <br/>
                    <div class="times mt-5">
                        <!-- //times -->
                    </div>
                    <div>
                        <input hidden name="time" value="0" id="b-time">
                        <br/>
                        <div class="text-center mt-5">
                            <input type="submit" id="confirm-booking" class="btn btn-primary btn-sm" disabled value="Confirm Booking">
                        </div>
                    </div>
                </form>
                </div>

            </div>

            </div>
        </div>
        </main>
    </div>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: false,
                minDate: 1,
                maxDate: "5d",
                dateFormat: "yy-mm-dd"
            });

            //date change
            $("#datepicker").on("change", function() {
                $date = $(this).val();
                $("#confirm-booking").attr("disabled", "disabled");
                //date check
                $.ajax({
                    url: '/user/check/date',
                    method: 'get',
                    data: {
                        'date': $date
                    },
                    success: function(data) {
                        // console.log(data);

                        //result
                        if (data == '0') {
                            $("#userInfo").html("Date is not Available");
                            $(".times").html("");
                        } else {
                            $html = '<div class="row"><ul class="date-picker-list animated fadeIn">';
                            $("#userInfo").html(" Pick a time to Schedule your appointment");
                            data.forEach(element => {
                                $html += '<li class="timeSch" data-val="'+element.time+'"><a>'+element.time+'</a></li>'
                            });
                            $html += '</ul></div>';
                            $(".times").html($html);
                        }
                    }
                    ///on(focousot
                });
            });

            //time pick
            $('body').on("click", '.timeSch', function() {
                $(this).addClass("selected");
                $(this).siblings("li").removeClass("selected");
                $("#b-time").val($(this).data('val'));
                $("#confirm-booking").removeAttr("disabled");
            });
        });
    </script>
</body>

</html> 