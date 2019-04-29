@extends('layouts.service') 

@section('content')
            <div class="page-title">
              <div class="page-title-content">
                <div class="shell">
                  <p class="page-title-header">SHOP</p>
                </div>
              </div>
            </div>
            
           <div>

           <div class="shop-panel-select"><span class="shop-panel-select-title"></span></div>
           <div class="shop-panel-select"><span class="shop-panel-select-title"></span></div>

           <div class="shop-panel-select"><span class="shop-panel-select-title"></span></div>

           <div class="shop-panel-select"><span class="shop-panel-select-title">choose Category</span>
               <li class="nav-item dropdown">
           
           <a class="nav-link dropdown-toggle" href="{{ route('viewUserproduct')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Select
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                        @foreach($cat as $ser)
                        
                        <a class="dropdown-item" href="{{ route('product-cat-user',$ser['id'])}}">{{ $ser['categeory']}}</a><br>
                        @endforeach
                        </div>
                      </li>
              </div>        
            <section class="section-md bg-periglacial-blue text-center">
              <div class="shell">
                <div class="range range-30">

                @foreach($data as $row)
               
                  <div class="cell-sm-6 cell-md-4">
                    <article class="product"><a class="product-image" ><img src="{{ asset('storage/'.$row->image) }}" alt="" width="164" height="168"/></a>
                      <p class="product-title"><a href="{{ route('singleviewproduct', $row->id) }}">{{ $row->productname }}</a></p>
                      <p class="product-price">RS: {{ $row->price }}
                      @if ($row->stock>=1)
                      <form class="login100-form validate-form" method="POST" action="{{ route('toCart') }}">
                        @csrf
                        <input hidden name="ptoductid" value="{{ $row->id }}">
                     <button type="submit" class="btn btn-sm box-service-control">ADD TO CART</button>
                   
                    </form>
                     @else
                     <form class="login100-form validate-form" >
                        @csrf
                        <input hidden name="ptoductid" value="{{ $row->id }}">
                     <button type="submit" class="btn btn-sm box-service-control">OUT OF STOCK</button>
                     </form>
                     @endif
                    </article>
                  </div>
                  @endforeach
                </div>
                <ul class="pagination-custom">
                  <li class="disabled"><a href="#"></a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li class="ellipsis">...</li>
                  <li><a href="#">12</a></li>
                  <li><a href="#"></a></li>
                </ul>
              </div>
            </section>
            

</div>    
</div>
@endsection


















