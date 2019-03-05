@extends('layouts.user') @section('content')
<div class="container">
<div style="margin-top:50px;" class="box-title" ><center><h3><b>PACKAGES</b></h3></center>
            </div>
    <div class="row justify-content-center my-5">
        <div class="col-md-10">
            <div class="root row">
            @foreach($pack as $row)
                <div class="card col-md-3">
                    <div class="card__header">
                        <h1>{{ $row['packname'] }}</h1>
                        <p class="price">{{$row['price']}}$</p>
                    </div>

                    <div class="card__body">
                        <ul class="features-list">
                            <!--<li>Start with 200 teams notes</li>
                            <li>Unlimited personal notes</li>-->
                            <li><i><h3>TIME REQUIRED {{ $row['timed'] }} MINUTES</h3></i></li>
                            <li>WELLNESS </li>
                        </ul>
                    </div>
                    <form class="login100-form validate-form" method="POST" action="{{ route('userEmployees') }}">
                    @csrf
                    
                    <div class="form-group">    
                        <input hidden name="sid" value="{{ $row['servename'] }}">
                        <input hidden name="pid" value="{{ $row['id'] }}">
                     <button type="submit" class="submit">Choose</button>
                 </div>
                 </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection