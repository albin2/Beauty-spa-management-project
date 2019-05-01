@extends('layouts.employee') @section('content')
<div class="container" style="margin-top:160px;">
<center><h2><b>PACKAGES</b></h2></center>
    <div class="row justify-content-center my-5">
        
        <div class="col-md-10">
            <div class="root row">
            @foreach($pack as $row)
                <div class="card col-md-3">
                    <div class="card__header">
                        <h5>{{ $row['packname'] }}</h5>
                        
                        <p class="price">RS:{{ $row['price'] }}</p>
                        <p></p>
                    </div>

                    <div class="card__body">
                        <ul class="features-list">
                            <!--<li>Start with 200 teams notes</li>
                            <li>Unlimited personal notes</li>-->
                            <li><h4><i>TIME REQUIRED  {{ $row['timed'] }}  MINUTES</i></h4></li>
                            <li>PAPAYA</li>
                        </ul>
                    </div>

                  
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection