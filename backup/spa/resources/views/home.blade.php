@extends('layouts.user')
@section('content')


<section class="jumbotron-custom jumbotron-custom-1 bg-gray-base bg-image text-center" style="background-image: url({{asset('theam/images/backgound.jpg')}}">
  <div class="jumbotron-custom-content">
    <div class="shell">
      <div class="range range-sm-center">
        <div class="cell-sm-10 cell-lg-9"><a class="brand-big" href="index.html"><img src="" alt="" width="136" height="160"></a>
          <p class="caption">The Best</p>
          <h1>Beauty and Spa</h1>

          <p class="large"><span style="color:#c4a33a"><b><i>At PAPAYA, you will find an atmosphere of old school sophistication with modern amenities.We cater to gentlemen on the go. So stop in on your lunch break to get an old-fashioned straight razor shave or a perfect haircut.</i></b></span></p>
        </div>
      </div>
      <form class="login100-form validate-form" method="POST" action="{{ route('searchpack') }}">
        @csrf
        <div class="cell-sm-6">
          <div class="form-group has-error">
            <label class="form-label-outside" for="billing-last-name"></label>
            <input class="form-control form-control-has-validation form-control-last-child" id="billing-last-name" type="text" name="scontant" >
            <p class="large"><span style="color:black"><b><i>Enter your problems here and find the appropriate packge.</i></b></span></p>

          </div>
        <button type="submit" class="btn btn-sm box-service-control">FIND MY PACKAGE</button>
        
      </form>
    </div>
  </div>
</section>

@endsection