@extends('layouts.service') 

@section('content')

            <section class="section-xl bg-periglacial-blue text-center">
              <div class="shell">
                <h2>Our Packages</h2>
                <div class="p text-width-medium">
                  <p class="big"></p>
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
                @isset($pack)
    
                <article class="box-service">
                  <div class="box-service-left"><img class="box-service-image" src="{{ asset('storage/'.$pack['image']) }}" alt="" width="500" height="490"/>
                  </div>
                  <div class="box-service-body">
                    <div class="box-service-header">
                      <p class="box-service-title"><span style="color:black"> {{ $pack['packname'] }}</span></p>
                      <p class="box-service-price"><small>RS:</small> {{ $pack['price'] }}<small></small>
                      </p>
                    </div>
                    <div class="box-service-text">
                    <span style="color:#c4a33a">
                      <p><b>Package For:</b></span><span style="color:black"> {{ $pack['packfor'] }}</span></p>
                      <span style="color:black"> <p> {{ $pack['packdecr'] }}</p></span>
                      <span style="color:#c4a33a"><p><b>Package Specialities:</b></span> <span style="color:black">{{ $pack['benafits'] }}</p></span>
                      
                    </div>
                    <form class="login100-form validate-form" method="POST" action="{{ route('userEmployees') }}">
                        @csrf
                    <input hidden name="sid" value="{{ $pack['servename'] }}">
                        <input hidden name="pid" value="{{ $pack['id'] }}">
                     <button type="submit" class="btn btn-sm box-service-control">Book Now</button>
                   </form>
                  </div>
                </article>
                
             @endisset
              </div>
             </div>

            </section>


           

            @endsection


















