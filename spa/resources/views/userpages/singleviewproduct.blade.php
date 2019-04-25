@extends('layouts.service')

@section('content')

<section class="section-xl bg-periglacial-blue">
              <div class="shell"><a class="link link-primary link-return" href="shop.html">Back</a>
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
                     <h3> <small>@if ($row->stock==0)<td>(not in stock)</td>
                    @else 
                    <td>{{$row->stock}} (in stock)</td>
                    </small></h3>
                    @endif
                    <div class="product-single-price-wrap">
                      <p class="price">RS:{{ $row->price }}</p>
                    </div>
                   
                    <div class="product-single-text">
                      <p>Ideal For:{{ $row->profor }}</p>
                    </div>
                    <div class="product-single-text">
                      <p>Application Area:{{ $row->aplarea }}</p>
                    </div>
                    <div class="product-single-text">
                      <p>Quantity:{{ $row->quantity }}g</p>
                    </div>
                    <div class="product-single-text">
                      <p>Description:{{ $row->proddecr }}</p>
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
                      <div class="unit-left text-sm-right">
                        <ul class="list-rating">
                          <li class="icon icon-xxs icon-primary fa fa-star"></li>
                          <li class="icon icon-xxs icon-primary fa fa-star"></li>
                          <li class="icon icon-xxs icon-primary fa fa-star"></li>
                          <li class="icon icon-xxs icon-primary fa fa-star"></li>
                          <li class="icon icon-xxs icon-primary fa fa-star"></li>
                        </ul>
                        <p class="small">4.66 average from 169 reviews</p>
                      </div>
                      <div class="unit-body"><a class="btn btn-xs btn-circle btn-primary" href="#">Write a review</a></div>
                    </div>
                  </div>
                  <div class="cell-lg-10">
                    <blockquote class="quote-review">
                      <div class="quote-review-left">
                        <div class="quote-review-avatar"><img class="quote-review-image" src="images/testimonials-1-100x100.jpg" alt="" width="100" height="100"/>
                        </div>
                      </div>
                      <div class="quote-review-body">
                        <div class="quote-review-header">
                          <p class="quote-review-title">Best Thing Ever!</p>
                          <ul class="quote-review-rating">
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                          </ul>
                        </div>
                        <div class="quote-review-meta"><span>By</span><span class="quote-review-user">Matt Parker</span><span>on</span>
                          <time datetime="2016-06-08">June 8, 2016</time>
                        </div>
                        <p class="quote-review-text">
                          <q>I have very thick/curly hair. I've used other salon brand pomades in the past, but ended with lots of fly aways. Finally, there is a product for my hair. If you have hair that's thick, curly, or just hard to manage this pomade will be the right choice for you. Although the smell may not be the one you prefer, this product is perfect for me.</q>
                        </p>
                      </div>
                    </blockquote>
                    <blockquote class="quote-review">
                      <div class="quote-review-left">
                        <div class="quote-review-avatar"><span class="quote-review-letter">J</span>
                        </div>
                      </div>
                      <div class="quote-review-body">
                        <div class="quote-review-header">
                          <p class="quote-review-title">Quite a Good Product</p>
                          <ul class="quote-review-rating">
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                          </ul>
                        </div>
                        <div class="quote-review-meta"><span>By</span><span class="quote-review-user">John Miller</span><span>on</span>
                          <time datetime="2016-03-21">May 21, 2016</time>
                        </div>
                        <p class="quote-review-text">
                          <q>In my opinion, the price for this product is a bit too high. I would use this every day if it wasn't for the price. I like the way it goes on and is water soluble so it washes off straightaway in the shower. I save my pomade for special occasions because it keeps my hair exactly the way I want it. However, it is perfect if you need high-quality hair care.</q>
                        </p>
                      </div>
                    </blockquote>
                    <blockquote class="quote-review">
                      <div class="quote-review-left">
                        <div class="quote-review-avatar"><img class="quote-review-image" src="images/testimonials-3-100x100.jpg" alt="" width="100" height="100"/>
                        </div>
                      </div>
                      <div class="quote-review-body">
                        <div class="quote-review-header">
                          <p class="quote-review-title">Definitely a Good Choice</p>
                          <ul class="quote-review-rating">
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                            <li class="icon icon-xs icon-primary fa fa-star"></li>
                          </ul>
                        </div>
                        <div class="quote-review-meta"><span>By</span><span class="quote-review-user">Anthony Smith</span><span>on</span>
                          <time datetime="2016-04-15">April 15, 2016</time>
                        </div>
                        <p class="quote-review-text">
                          <q>I've been using this product for nearly 2 months and I really like it. I tried a couple of other popular brands that weren't as good by far. After initially applying it, I use a tiny amount of water on my hands to help work it throughout my hair, then comb. I find it combs easier with a little water.</q>
                        </p>
                      </div>
                    </blockquote>
                  </div>
                </div>
              </div>
            </section>
</div>
            
            @endsection