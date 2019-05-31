@extends('layouts.guests')

@section('content')

<section class="section-xl bg-periglacial-blue text-center">
  <div class="shell">
    <h2>Our Packages</h2>
    <!-- <article class="box-service box-service-dark box-service-reverse">
                  <div class="box-service-left"><img class="box-service-image" src="/theam/images/services-1-500x490.png" alt="" width="500" height="490"/>
                  </div>
                  <div class="box-service-body">
                    <div class="box-service-header">
                      <p class="box-service-title">TRADITIONAL HAIRCUTS</p>
                      <p class="box-service-price"><small>$</small>39.<small>00</small>
                      </p>
                    </div>
                    <div class="box-service-text">
                      <p>This classic and traditional service is perfect if you want your hair to be done the right way. Our barbers will be glad to help you with it. </p>
                    </div><a class="btn btn-sm box-service-control" href="step-1.html">Book Now</a>
                  </div>
                </article> -->
    @foreach($pack as $row)
    <article class="box-service">
      <div class="box-service-left"><img class="box-service-image" src="{{ asset('storage/'.$row->image) }}" alt="" width="500" height="490" />
      </div>
      <div class="box-service-body">
        <div class="box-service-header">
          <p class="box-service-title"> {{ $row->packname }}</p>
          <p class="box-service-price"><small>RS:</small> {{ $row->price }}<small></small>
          </p>
        </div>
        <div class="box-service-text">
          <span style="color:#c4a33a">
            <p><b>Package For:</b>
          </span><span style="color:black"> {{ $row->packfor }}</p></span>
          <span style="color:black">
            <p> {{ $row->packdecr }}</p>
          </span>
          <span style="color:#c4a33a">
            <p><b>Package specialities:
          </span></b><span style="color:black"> {{ $row->benafits }}</p></span>

        </div>
        <a class="btn btn-circle btn-primary" href="/login">Book Now</a>
      </div>
    </article>
    @endforeach
  </div>
  </div>

</section>




@endsection