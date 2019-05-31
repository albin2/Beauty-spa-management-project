@extends('layouts.service')

@section('content')

<section class="section-xl bg-periglacial-blue">
              <div class="shell">
                <article class="product-single">
                  <div class="product-single-left">
                  @foreach($data as $row)
                    <div class="slick-carousel-product">
                      <!-- Slick Carousel-->
                      <div class="slick-slider carousel-parent" data-arrows="false" data-dots="false" data-loop="true" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel">
                        <div class="item"><img src="{{ asset('storage/'.$row->image) }}"  alt="" width="274" height="280"/>
                        </div>
                        
                      </div>
                      <div class="slick-slider carousel-child" id="child-carousel" data-for=".carousel-parent" data-arrows="false" data-loop="true" data-dots="false" data-swipe="true" data-items="3" data-xs-items="4" data-sm-items="3" data-md-items="4" data-lg-items="4" data-slide-to-scroll="1">
                        <div class="item"><img src="{{ asset('storage/'.$row->image) }}"  alt="" width="274" height="280"/>
                        </div>
                        
                        
                        
                      </div>
                    </div>
                  </div>
                
                  <div class="product-single-body">
                    <p class="product-single-title">{{ $row->productname }}</p>
                     <h3> <small>@if ($row->stock==0)<td> <span style="color:red">(not in stock)</td></span>
                    @else 
                    <td> <span style="color:black">{{$row->stock}} </span><span style="color:green"> (in stock)</td></span>
                    </small></h3>
                    @endif
                    <div class="product-single-price-wrap">
                    <span style="color:black">  <p class="price">RS:{{ $row->price }}</p></span>
                    </div>
                   
                    <div class="product-single-text">
                    <span style="color:black"> <b> <p>Ideal For:</b>{{ $row->profor }}</p></span>
                    <span style="color:black">  <b><p>Application Area:</b>{{ $row->aplarea }}</p></span>
                   
                    <span style="color:black"> <b>  <p>Quantity:</b>{{ $row->quantity }}g</p>
                    </div>
                    <div class="product-single-text">
                    <span style="color:black"> <b>   <p>Description:</b>{{ $row->proddecr }}</p></span>
                    </div>
                    <form class="login100-form validate-form" method="POST" action="{{ route('toCart') }}">
                        @csrf
                        @if ($row->stock==0)
                        </h4> <b>sorry not in stock<b></h4>
                        <a class="btn btn-circle btn-primary" href= "{{ route('viewUserproduct') }}">BACK TO SHOP</a>
                       @else
                        <input hidden name="ptoductid" value="{{ $row->id }}">
                     <button type="submit" class="btn btn-sm box-service-control">ADD TO CART</button>
                    
                     @endif
                     </form>
                  </div>
                  @endforeach
                </article>
              </div>
            </section>

            <section class="section-xl bg-periglacial-blue text-center">
              <div class="shell">
                <div class="range range-sm-center range-75">
                  <div class="cell-xs-12">
                    <h2>Reviews</h2>
                    <div class="unit unit-spacimg-md unit-xs-horizontal unit-align-center unit-middle">
                      <div >
                       
                      <form class="login100-form validate-form" style="padding-bottom:3em;" method="POST" action="{{ route('productfeedback') }}">
                          @csrf
                        
                        
                         <textarea class="form-control  form-control-has-validation" id="billing-last-name" rows="5" cols="70" name="productfeed" required>
                         </textarea>
                     
                      <div class="unit-body">
                    
                      <input hidden name="productid" value="{{ $data[0]->id }}">  
               
                        <button type="submit" class="btn btn-sm box-service-control">wirte review</button></div>
                    </div>
                  </div>
                  </form>
                  <div class="cell-lg-10">
                  @foreach($review as $row)
                    <blockquote class="quote-review">
                   
                      <div class="quote-review-body">
                        <div class="quote-review-meta"><span>By</span><span class="quote-review-user">"{{ $row->fname }} {{ $row->lname }}"</span><span>on</span>
                          <time datetime="2016-06-08">{{ $row->feeddate }}</time>
                        </div>
                        <p class="quote-review-text">
                          <q>{{ $row->productfeed }}</q>
                        </p>
                      </div>
                      @if ($row->userid==Auth::id())
                      <a href="/user/view/singleproductrr/{{$row->feedid}}/{{ $row->productid }}"><span style="color:red">delete</span></a>
                      @endif
                    </blockquote>
                   
                    @endforeach
                  
                  </div>
                </div>
              </div>
            </section>
</div>
            
            @endsection