@extends('layouts.guests')

@section('content')
<style>
  .rating {
    display: inline-block;
    position: relative;
    height: 50px;
    line-height: 50px;
    font-size: 50px;
  }

  .rating label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    cursor: pointer;
  }

  .rating label:last-child {
    position: static;
  }

  .rating label:nth-child(1) {
    z-index: 5;
  }

  .rating label:nth-child(2) {
    z-index: 4;
  }

  .rating label:nth-child(3) {
    z-index: 3;
  }

  .rating label:nth-child(4) {
    z-index: 2;
  }

  .rating label:nth-child(5) {
    z-index: 1;
  }

  .rating label input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
  }

  .rating label .icon {
    float: left;
    color: transparent;
  }

  .rating label:last-child .icon {
    color: #000;
  }

  .rating:not(:hover) label input:checked~.icon,
  .rating:hover label:hover input~.icon {
    color: #e8b20b;
  }

  .rating label input:focus:not(:checked)~.icon:last-child {
    color: #000;
    text-shadow: 0 0 5px #09f;

  }

  .rating.outer {

    padding-left: 220px;
  }
</style>


<section class="section-xl bg-periglacial-blue">
  <div class="shell">
    <article class="product-single">
      <div class="product-single-left">
        @foreach($data as $row)
        <div class="slick-carousel-product">
          <!-- Slick Carousel-->
          <div class="slick-slider carousel-parent" data-arrows="false" data-dots="false" data-loop="true" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel">
            <div class="item"><img src="{{ asset('storage/'.$row->image) }}" alt="" width="274" height="280" />
            </div>

          </div>
          <div class="slick-slider carousel-child" id="child-carousel" data-for=".carousel-parent" data-arrows="false" data-loop="true" data-dots="false" data-swipe="true" data-items="3" data-xs-items="4" data-sm-items="3" data-md-items="4" data-lg-items="4" data-slide-to-scroll="1">
            <div class="item"><img src="{{ asset('storage/'.$row->image) }}" alt="" width="274" height="280" />
            </div>



          </div>
        </div>
      </div>

      <div class="product-single-body">
        <p class="product-single-title">{{ $row->productname }}</p>

        @if ($avgstars==1)
        <h6>(<span style="color:red">{{ $totalcount}}</span> reviews)</h6>
        <div class="rating ">
          <label>
            <span style="color:#e8b20b" class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          </h5>
        </div>
        @elseif ($avgstars==2)
        <h6>(<span style="color:red">{{ $totalcount}}</span> reviews)</h6>
        <div class="rating ">
          <label>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
        </div>
        @elseif ($avgstars==3)
        <h6>(<span style="color:red">{{ $totalcount}}</span> reviews)</h6>
        <div class="rating ">
          <label>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
        </div>
        @elseif ($avgstars==4)
        <h6>(<span style="color:red">{{ $totalcount}}</span> reviews)</h6>

        <div class="rating">

          <label>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
            <span class="icon">★</span>
          </label>

        </div>

        @elseif ($avgstars==5)
        <h6>(<span style="color:red">{{ $totalcount}}</span> reviews)</h6>
        <div class="rating">
          <label>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
            <span style="color:#e8b20b" class="icon">★</span>
          </label>
        </div>
        @else
        <div class="rating">
          <label>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
        </div>




        @endif

        <h3> <small>@if ($row->stock==0)<td> <span style="color:red">(not in stock)</td></span>
            @else
            <td> <span style="color:black">{{$row->stock}} </span><span style="color:green"> (in stock)</td></span>
          </small></h3>
        @endif
        <div class="product-single-price-wrap">
          <span style="color:black">
            <p class="price">RS:{{ $row->price }}</p>
          </span>
        </div>

        <div class="product-single-text">
          <span style="color:black"> <b>
              <p>Ideal For:
            </b>{{ $row->profor }}</p></span>
          <span style="color:black"> <b>
              <p>Application Area:
            </b>{{ $row->aplarea }}</p></span>

          <span style="color:black"> <b>
              <p>Quantity:
            </b>{{ $row->quantity }}g</p>
        </div>
        <div class="product-single-text">
          <span style="color:black"> <b>
              <p>Description:
            </b>{{ $row->proddecr }}</p></span>
        </div>

        @if ($row->stock==0)
        </h4> <b>sorry not in stock<b></h4>
            <a class="btn btn-circle btn-primary" href="{{ route('viewguestsproduct') }}">BACK TO SHOP</a>
            @else
            <input hidden name="ptoductid" value="{{ $row->id }}">
            <a class="btn btn-sm box-service-control" href="/login"> ADD TO CART</a>

            @endif

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
          <div>
          </div>
        </div>
        </form>
        <div class="cell-lg-10">
          @foreach($review as $row)
          <blockquote class="quote-review">

            <div class="quote-review-body">
              <div class="quote-review-meta"><span>By</span><span class="quote-review-user">"{{ $row->fname }} {{ $row->lname }}"</span><span>on</span>

                <time datetime="2016-06-08">{{ $row->feeddate }}</time>

                @if ($row->stars==1)
                <div class="rating outer" padding-left: 260px;>
                  <label>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label></div>
                @elseif ($row->stars==2)
                <div class="rating outer">
                  <label>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label></div>
                @elseif ($row->stars==3)
                <div class="rating outer">
                  <label>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label></div>
                @elseif ($row->stars==4)
                <div class="rating outer">
                  <label>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span class="icon">★</span>
                  </label></div>
                @elseif ($row->stars==5)
                <div class="rating outer">
                  <label>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                    <span style="color:#e8b20b" class="icon">★</span>
                  </label>
                </div> @else
                <div class="rating outer">
                  <label>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                    <span class="icon">★</span>
                  </label>
                </div>

                @endif
              </div>
              <p class="quote-review-text">
                <q>{{ $row->productfeed }}</q>
              </p>

            </div>

          </blockquote>

          @endforeach

        </div>
      </div>
    </div>
</section>

</div>
@endsection