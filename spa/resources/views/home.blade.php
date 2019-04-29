@extends('layouts.user')
@section('content')


<section class="jumbotron-custom jumbotron-custom-1 bg-gray-base bg-image text-center" style="background-image: url({{asset('theam/images/backgound.jpg')}}">
  <div class="jumbotron-custom-content">
    <div class="shell">
      <div class="range range-sm-center">
        <div class="cell-sm-10 cell-lg-9"><a class="brand-big" href="index.html"><img src="theam/images/logo-md-white-136x160.png" alt="" width="136" height="160"></a>
          <p class="caption">The Best</p>
          <h1>Beauty and Spa</h1>



          <p class="large">At PAPAYA, you will find an atmosphere of old school sophistication with modern amenities.We cater to gentlemen on the go. So stop in on your lunch break to get an old-fashioned straight razor shave or a perfect haircut.</p>
        </div>
      </div>
      <form class="login100-form validate-form" method="POST" action="{{ route('searchpack') }}">
        @csrf
        <div class="cell-sm-6">
          <div class="form-group has-error">
            <label class="form-label-outside" for="billing-last-name"></label>
            <input class="form-control form-control-has-validation form-control-last-child" id="billing-last-name" type="text" name="scontant" data-constraints="@Required"><span class="form-validation">The text field is required.</span>
          </div>
        </div>
        <button type="submit" class="btn btn-sm box-service-control">SEARCH</button>
      </form>
    </div>
  </div>
</section>

@endsection