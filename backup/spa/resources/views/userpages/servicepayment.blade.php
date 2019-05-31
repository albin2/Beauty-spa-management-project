@extends('layouts.checkouter')

@section('content')
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Card Payment Forms Responsive Widget Template :: W3layouts</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Card Payment Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="/payment/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/payment/css/creditly.css" type="text/css" media="all" />
<link rel="stylesheet" href="/payment/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- Web Fonts -->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i&amp;subset=latin-ext" rel="stylesheet">
<!-- //Web Fonts -->
</head>
<body>
<div class="main">	
	<h5>. </h5>
	<div id="myAccordion" class="nl-accordion">
		<ul>
			<li>
				<input type="radio" id="nl-radio-1" name="nl-radio" class="nl-radio" checked="checked"/>
				<label class="nl-label" for="nl-radio-1">Make Payment </label>
				<div class="nl-content">
					<div class="agileits_w3layouts_tab1 agileits_w3layouts_tab">
					<form action="{{ route('paymentDetails') }}" method="post" class="creditly-card-form agileinfo_form">
                    @csrf    
                    <section class="creditly-wrapper wthree w3_agileits_wrapper">
								<div class="first-row form-group">
									<div class="controls">
										<label class="control-label">Name on Card</label>
										<input class="billing-address-name form-control" type="text" name="cardholder" placeholder="John Smith" required="">
									</div>
									<div class="controls">
										<label class="control-label">Card Number</label>
										<input class="number credit-card-number form-control" type="text" name="cardnumber"inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<label class="control-label">Expiration Date</label>
												<input class="expiration-month-and-year form-control date" type="text" name="date" placeholder="MM / YY" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right">
											<div class="controls">
												<label class="control-label">CVV</label>
												<input class="security-code form-control" Â·inputmode="numeric" type="text" name="cvv" placeholder="&#149;&#149;&#149;" required="">
											</div>
										</div>
										<div class="clear"> </div>
									</div>
                                </div>
                                <input hidden name="amount" value="{{ $apm->amount}}">
                                <input hidden name="cartid" value="{{ $apm->packid }}">
                                <input hidden name="userid" value="{{ $apm->uid }}">
                                <input hidden name="id" value="{{ $apm->id }}">
								<button type="submit" class="btn btn-sm box-service-control" ><span>Make a payment <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></button>
						</section>
					</form>
					</div>	
				</div>
			</li>
			<li>
				<input type="radio" id="nl-radio-2" name="nl-radio" class="nl-radio" />
				<label class="nl-label" for="nl-radio-2">PayPal</label>
				<div class="check w3ls"></div>
				<div class="nl-content">
					<div class="agileits_w3layouts_tab2 agileits_w3layouts_tab">
						<h3>Don't Have an Account <a href="#">Register here</a></h3>
						<form action="#" method="post">
							<div class="creditly-wrapper wthree">
								<input type="email" name="Email" placeholder="Email" required="">
								<input type="password" name="Password" placeholder="Password" required="">
								<input type="submit" value="Login">
							</div>	
						</form>
					</div>				
				</div>
			</li>
		</ul>
	</div>
	<div class="agileits_copyright">
	</div>
</div>
<!-- js scripts --> 
<!-- js -->
	<script type="text/javascript" src="/payment/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- credit-card -->
	<script type="text/javascript" src="/payment/js/creditly.js"></script>
	<script type="text/javascript">
		$(function() {
		  var creditly = Creditly.initialize(
			  '.creditly-wrapper .expiration-month-and-year',
			  '.creditly-wrapper .credit-card-number',
			  '.creditly-wrapper .security-code',
			  '.creditly-wrapper .card-type');

		  $(".creditly-card-form .submit").click(function(e) {
			e.preventDefault();
			var output = creditly.validate();
			if (output) {
			  // Your validated credit card output
			  console.log(output);
			}
		  });
		});
	</script>
<!-- //credit-card -->
<!-- //js scripts --> 
</body>
</html>
@endsection