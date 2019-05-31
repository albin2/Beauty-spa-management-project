@extends('layouts.guests')

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
           
           <div class="shop-panel-select"><span class="shop-panel-select-title" style=padding-left:100px;><span style="color:red">Choose category</span></span>
               <li class="nav-item dropdown">
           
           <a class="nav-link dropdown-toggle" href="{{ route('viewguestsproduct')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span style="color:black"> <----Select----></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                        @foreach($cat as $ser)
                        
                        <a class="dropdown-item" href="{{ route('product-cat-guest',$ser['id'])}}">{{ $ser['categeory']}}</a><br>
                        @endforeach
                        </div>
                      </li>
                      
              </div>  
  

              <p class="page-cart-right"><b><a class="btn btn-xs btn-circle btn-primary" href="/login"> My Cart</a></b></p>
            <section class="section-md bg-periglacial-blue text-center">
              <div class="shell">
                <div class="range range-30">

                @foreach($data as $row)
               
                  <div class="cell-sm-6 cell-md-4">
                    <article class="product"><a href="{{ route('guestsingleviewproduct', $row->id) }}" class="product-image" ><img src="{{ asset('storage/'.$row->image) }}" alt="" width="164" height="168"/></a>
                      <p class="product-title"><a href="{{ route('guestsingleviewproduct', $row->id) }}">{{ $row->productname }}</a></p>
                      <p class="product-price">RS: {{ $row->price }}
                      @if ($row->stock>=1)
                      <a class="btn btn-sm box-service-control" href="/login"> ADD TO CART</a>    
                   
                     @else
                     <a class="btn btn-sm box-service-control" href="/login"> OUT OF STOCK</a>
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


















