@extends('layouts.service')

@section('content')

<section class="section-xl bg-periglacial-blue">

              <div class="shell"><a class="link link-primary link-return" href="shop.html">Back</a>
                <div class="table-custom-responsive table-cart-wrap">
                  <table class="table-cart">
                    <thead>
                      <tr>
                        
                        <th></th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    @isset($msg)
            <div class="alert-info alert">
                {{ $msg }}
            </div>
            @endisset
                    <form class="login100-form validate-form" method="POST"  action="{{ route('updatecart') }}" >
                        @csrf
                    @foreach($data as $row)
                    <tbody>
                      <tr>
                        <td><img class="cart-image" src="{{ asset('storage/'.$row->image) }}" alt="" width="80" height="82"/>
                        </td>
                        <td>
                          <p class="cart-title"><a href="single-product.html">{{ $row->productname }}</a></p>
                        </td>
                        <td>
                          <p class="cart-price">{{ $row->price }}</p>
                        </td>
                        <td>

                        <input type="number" name="x{{$row->ptoductid}}" value="{{ $row->count }}" min="1" max="6">
                        <input type="hidden" name="{{$row->ptoductid}}" id="x{{$row->ptoductid}}" value="{{ $row->count }}">
                    
                        </td>
                      
                        <td><a class="btn btn-circle btn-primary" href="{{ route('removecartproduct', $row->ptoductid) }}">remove</a></td>
                        <td>
                          <p class="cart-price">{{ $row->stock }} in Stock</p>
                          
                        </td>
                      </tr>
                    
                    </tbody>
                    @endforeach
                  </table>
                  <script>
                    $("body").on("click", "span.stepper-arrow.up", function(){
                      var ele = $(this).siblings('.stepper-input');
                      var val = ele.val();

                      $("#"+ele[0].name).val(val);
                      
                    });

                    $("body").on("click", "span.stepper-arrow.down", function(){
                      var ele = $(this).siblings('.stepper-input');
                      var val = ele.val();

                      $("#"+ele[0].name).val(val);
                      
                    });

                    $("body").on("blur", "input.stepper-input", function(){
                      var val = $(this).val();
                      var ele = $(this);

                      $("#"+ele[0].name).val(val);
                      
                    });
                  </script>
                </div>
                <div class="table-cart-footer">
                  <div class="table-cart-footer-left">
             
                  </div>
                  <div class="table-cart-footer-right">
                   
                  </div>
                </div>
                <div class="table-cart-action-panel"><input type="submit" value="UPDATE" class="btn btn-sm btn-default-size btn-primary btn-circle" ></div>
                </form>
              </div>
            </section>

</div>

            @endsection