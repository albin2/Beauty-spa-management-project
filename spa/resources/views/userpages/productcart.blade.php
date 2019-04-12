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
                        <th>SUBTOTAL</th>
                        <th></th>
                      </tr>
                      @isset($msg)
            <div class="alert-info alert">
                {{ $msg }}
            </div>
            @endisset
                    </thead>
                   @php $value = 0 @endphp
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
                        
                    
                       <b> <h5><label>{{ $row->count }}</label><h5></b>
                                                
                       
                        </td>
                        <td>
                          <p class="cart-price">{{ $row->count * $row->price }}</p>
                        </td>
                       <td>
                       <h3> <small>@if ($row->stock==0)<td>(not in stock)</td>
                    @else 
                    <td>{{$row->stock}} (in stock)</td>
                    </small></h3>
                    @endif
                           </td>
                      </tr>
                      @php $value = $value + $row->count * $row->price
                      @endphp
                    </tbody>
                    @endforeach
                  </table>
                </div>
                <div class="table-cart-footer">
                  <div class="table-cart-footer-left">
                  
                  </div>
                  <div class="table-cart-footer-right">
                    <dl class="terms-list-bold">
                      <dt>Total</dt>
                      <dd>{{$value}}</dd>
                    </dl>
                  </div>
                </div>
                <div class="table-cart-action-panel"><a class="btn btn-circle btn-primary" href="{{route('editcart')}}">UPDATE</a></div>
                <div class="table-cart-action-panel"><a class="btn btn-circle btn-primary" href="{{route('viewcheckout')}}"   >PROCEED TO CHECKOUT</a></div>

                </div>
            </section>

</div>

            @endsection