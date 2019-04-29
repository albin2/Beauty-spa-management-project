@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
    <title>LOGIN PAPAYA</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Key Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="/loggintheam/css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <!-- //fonts -->
    <link rel="stylesheet" href="/logginthem/css/font-awesome.min.css" type="text/css" media="all">
    <!-- //Font-Awesome-File-Links -->
	
	<!-- Google fonts -->
	<link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
	<!-- Google fonts -->

</head>
<!-- //Head -->
<!-- Body -->

<body>

<section class="main">
	<div class="layer">
		
		<div class="bottom-grid">
			<div class="logo">
				<h1> <a href="index.html"><span class="fa fa-key"></span> </a></h1>
			</div>
			<div class="links">
			
			</div>
		</div>
		<div class="content-w3ls">
			<div class="text-center icon">
				<span class="fa fa-html5">FORGOT_PASSWORD</span>
			</div>
			<div class="content-bottom">
           
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
				<form  method="POST" action="{{ route('password.email') }}">
					@csrf
					<div class="field-group">
						<span class="fa fa-user" aria-hidden="true"></span>
						<div class="wthree-field">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter your email Address"required >
						</div>
                       
					</div>
					<div >
						<span class="fa fa-lock" aria-hidden="true"></span>
                        @if ($errors->has('email'))
                         <span class="alert alert-success" role="alert">
                         <strong>{{ $errors->first('email') }}</strong>
                         </span>
                          @endif
					</div>
					<div class="wthree-field">
						<button type="submit" class="btn">SEND LINK TO E-MAIL</button>
					</div>
					<ul class="list-login">
						<li class="switch-agileits">
							<label class="switch">
								<input type="checkbox">
								<span class="slider round"></span>
							
							</label>
						</li>
						<li>
						
						</li>
						<li class="clearfix"></li>
					</ul>
					<ul class="list-login-bottom">
						
						<li class="clearfix"></li>
					</ul>
				</form>
			</div>
		</div>
		
</section>

</body>
<!-- //Body -->
</html>


@endsection








































