@extends('layouts.service') 

@section('content')

<section class="section-xl bg-periglacial-blue one-screen-page-content text-center">
    <div class="shell">
        <h2>OUR SERVICES</h2>
        <div class="p text-width-medium">
        <span style="color:black"> <p class="big">On this page you can select a service that you need. Here are presented only the most popular Beauty and Spa services we provide.</span></p>
        </div>
        <div class="range range-50">
           
        @foreach($data as $row)
            <div class="cell-xs-6 cell-md-3">
                <article class="card-service-option"><img class="card-service-option-image" src="/theam/images/icon-service-3-70x62.png" alt="" width="70" height="62" />
                    <b><p class="card-service-option-title">{{ $row->servname }}</p></b>
                    <div class="card-service-option-panel">
                        <p class="card-service-option-text"><span style="color:black">{{ $row->serDisc }}</span></p>
                        <form class="login100-form validate-form" method="POST" action="{{ route('userServiceToPackage') }}">
                        @csrf
                        <!-- <a class="btn btn-xs card-service-option-control" href="step-2.html">Choose</a> -->
                        <input hidden name="pid" value="{{ $row['id'] }}">
                        <button type="submit" class="btn btn-xs card-service-option-control">Choose</button>
                     </form>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
</div>
@endsection 