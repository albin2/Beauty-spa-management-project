@extends('layouts.service') 

@section('content')

            <div class="page-title">
              <div class="page-title-content">
                <div class="shell">
                  <p class="page-title-header">PACKAGES</p>
                </div>
              </div>
            </div>
            <section class="section-xl bg-periglacial-blue text-center">
              <div class="shell">
                <h2>Our Packages</h2>
                <div class="p text-width-medium">
                  <p class="big">Beauty and Spa offers world-class men's haircuts, beard grooming, and hot razor shaves. Here are just some of the services we are known for.</p>
                </div>
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
                  <div class="box-service-left"><img class="box-service-image" src="{{ asset('storage/'.$row->image) }}" alt="" width="500" height="490"/>
                  </div>
                  <div class="box-service-body">
                    <div class="box-service-header">
                      <p class="box-service-title"> {{ $row->packname }}</p>
                      <p class="box-service-price"><small>RS:</small> {{ $row->price }}<small>00</small>
                      </p>
                    </div>
                    <div class="box-service-text">
                      <p><b>Package For:</b> {{ $row->packfor }}</p>
                      <p> {{ $row->packdecr }}</p>
                      <p><b>Package Specialities:</b> {{ $row->benafits }}</p>
                      
                    </div>
                    <form class="login100-form validate-form" method="POST" action="{{ route('userEmployees') }}">
                        @csrf
                    <input hidden name="sid" value="{{ $row['servename'] }}">
                        <input hidden name="pid" value="{{ $row['id'] }}">
                     <button type="submit" class="btn btn-sm box-service-control">Book Now</button>
</form>
                  </div>
                </article>
                @endforeach
              </div>
</div>

            </section>


           

            @endsection


















