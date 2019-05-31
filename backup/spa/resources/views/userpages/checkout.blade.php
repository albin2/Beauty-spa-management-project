@extends('layouts.checkouter')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/oh-autoval-style.css') }}">
<!-- Adding jQuery script. It must be before other script files -->
<script src="{{ asset('js/jquery.min.js') }}"> </script>
<!-- Adding oh-autoVal script file -->
<script src="{{ asset('js/oh-autoval-script.js') }}"></script>

<section class="section-xl bg-periglacial-blue">
  <form class="rd-mailform oh-autoval-form" method="post" action="{{ route('BillingAddress') }}">
    <div class="shell">
      <div class="range range-sm-center range-50">
        <div class="cell-md-10 cell-lg-6">
          <h3 class="text-center">Billing Details</h3>

          @csrf

          @if(count($address))
          @foreach($address as $add)
          <div class="range range-sm-bottom range-15">

            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-first-name">First Name *</label>
                <input class="form-control av-name" av-message="space and . is not allowed" value="{{$add ->firstname}}" id="billing-first-name" type="text" name="firstname" data-constraints="@Required">
              </div>

            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-last-name">Last Name *</label>
                <input class="form-control av-name" av-message="space and . is not allowed" value="{{$add ->lastname}}" id="billing-last-name" type="text" name="lastname" data-constraints="@Required">
              </div>
            </div>
            <div class="cell-xs-12">
              <div class="form-group">
                <label class="form-label-outside" for="billing-address">Address *</label>
                <input class="form-control av-required" av-message="Enter Your Address" value="{{$add ->address}}" id="billing-address" type="text area" name="address" data-constraints="@Required">
              </div>
            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-company-name">Land Mark</label>
                <input class="form-control av-required" av-message="Enter your landmark" value="{{$add ->landmark}}" id="billing-company-name" type="text" name="landmark">
              </div>
            </div>

            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-phone">Phone *</label>
                <input class="form-control av-number" av-message="enter a valid phone number" value="{{$add ->contact}}" id="billing-phone" type="number" name="contact" data-constraints="@Required @Numeric">
              </div>
            </div>

            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-country">State</label>
                <select type="text" id="state" class="form-control av-required" av-message="select your state" name="state" >
                  <option class="form-control" value="{{$add ->sid}}">{{$add ->s_name}}</option>
                  @foreach ($states as $state){{ $state}}
                  <option class="form-control" value="{{ $state['sid'] }}">{{ $state['s_name'] }}</option>
                  @endforeach

                </select>
              </div>
            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-country">District</label>
                <select type="text" id="district" value="{{$add ->district}}" name="district" class="form-control av-required" av-message="select your District">
                  <option class="form-control" value="{{$add ->did}}">{{$add ->d_name}}</option>
                </select>
              </div>
            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-town">Post *</label>
                <input class="form-control av-required" av-message="Enter your post" value="{{$add ->post}}" id="billing-town" type="text" name="post" data-constraints="@Required">
              </div>
            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-town">Pin code *</label>
                <input class="form-control av-pincode" av-message="Enter valid pincode" value="{{$add ->pincode}}" id="billing-town" type="text" name="pincode" data-constraints="@Required">
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div class="range range-sm-bottom range-15">
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-first-name">First Name *</label>
                <input class="form-control av-name" av-message="space and . is not allowed"  id="billing-first-name" type="text" name="firstname" data-constraints="@Required">
              </div>

            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-last-name">Last Name *</label>
                <input class="form-control av-name" av-message="space and . is not allowed"  id="billing-last-name" type="text" name="lastname" data-constraints="@Required">
              </div>
            </div>
            <div class="cell-xs-12">
              <div class="form-group">
                <label class="form-label-outside" for="billing-address">Address *</label>
                <input class="form-control av-required" av-message="Enter Your Address"  id="billing-address" type="text area" name="address" data-constraints="@Required">
              </div>
            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-company-name">Land Mark</label>
                <input class="form-control av-required" av-message="Enter your landmark" id="billing-company-name" type="text" name="landmark">
              </div>
            </div>

            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-phone">Phone *</label>
                <input class="form-control av-number" av-message="enter a valid phone number"  id="billing-phone" type="number" name="contact" data-constraints="@Required @Numeric">
              </div>
            </div>

            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-country">State</label>
                <select type="text" id="state" class="form-control" name="state" required>
                  <option class="form-control" value="0">select state</option>
                  @foreach ($states as $state){{ $state}}
                  <option class="form-control" value="{{ $state['sid'] }}">{{ $state['s_name'] }}</option>
                  @endforeach

                </select>
              </div>
            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-country">District</label>
                <select type="text" id="district"  name="district" class="form-control" required>
                  <option class="form-control" value="0">select District</option>
                </select>
              </div>
            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-town">Post *</label>
                <input class="form-control av-required" av-message="Enter your post"  id="billing-town" type="text" name="post" data-constraints="@Required">
              </div>
            </div>
            <div class="cell-sm-6">
              <div class="form-group">
                <label class="form-label-outside" for="billing-town">Pin code *</label>
                <input class="form-control av-pincode" av-message="Enter valid pincode" id="billing-town" type="text" name="pincode" data-constraints="@Required">
              </div>
            </div>
          </div>
          @endif


        </div>

      </div>
    </div>

    <div class="shell">
      <div class="range range-50">
        <div class="cell-xs-12">
          <h3>Your order</h3>
        </div>
      </div>
      <div class="range range-30">
        <div class="cell-sm-8 cell-md-6">
          <div class="terms-list-group">
            <dl class="terms-list-block terms-list-block-vertical">

              <dt>Product</dt>
              @foreach($data as $row)
              <dd>{{ $row->productname }}</dd>
              @endforeach
            </dl>

            <dl class="terms-list-block terms-list-block-vertical">
              <dt>Total</dt>
              @php $value = 0 @endphp
              @foreach($data as $row)
              <dd>{{ $row->count }}*{{ $row->price }}={{ $row->count * $row->price }}</dd>
              @php $value = $value + $row->count * $row->price
              @endphp
              @endforeach
            </dl>
          </div>

          <dl class="terms-list-block terms-list-block-horizontal">
            <dt>Total</dt>

            <dt>Rs : {{$value}}</dt>
          </dl>
        </div>
        <div class="cell-sm-8 cell-md-6">
          <ul class="list-blocks-bordered">
          
            <li>
              <div class="group-lg group-middle">
                <label class="radio-inline radio-bold">
                 MAKE PAYMENT WITH
                </label><
              </div>
              <ul class="inline-list inline-list-sm">
                <li><a href="#"><img src="/theam/images/card-1-65x40.png" alt="" width="65" height="40" /></a></li>
                <li><a href="#"><img src="/theam/images/card-2-65x40.png" alt="" width="65" height="40" /></a></li>
                <li><a href="#"><img src="/theam/images/card-3-65x40.png" alt="" width="65" height="40" /></a></li>
                <li><a href="#"><img src="/theam/images/card-4-65x40.png" alt="" width="65" height="40" /></a></li>
                <li><a href="#"><img src="/theam/images/card-5-65x40.png" alt="" width="65" height="40" /></a></li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="cell-sm-8 cell-md-12 offset-custom-1 text-right">
          <div class="table-cart-action-panel">
            <input hidden name="total" value="{{$value}}">
            <input type="submit" value="PLACE ORDER" class="btn btn-sm btn-default-size btn-primary btn-circle"></div>

        </div>
      </div>
    </div>

</section>


<script>
  var success = function(data) {
    $("#district").empty();
    $html = '<option class="form-control" value="0">Select District</option>';
    $.each(data, function(k, v) {
      $html += '<option class="form-control" value="' + v.did + '">' + v.d_name + '</option>';
    });
    $("#district").html($html);

  }

  var selectdistrict = function() {
    $sid = $(this).val();
    $.ajax({
      type: "post",
      url: "{{ route('district') }}",
      data: {
        'sid': $sid,
        _token: '{{csrf_token()}}'
      },
      success: success,
    });
  }

  $("#state").on("change", selectdistrict);
</script>
@endsection