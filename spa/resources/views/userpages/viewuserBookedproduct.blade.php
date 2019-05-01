@extends('layouts.service')
 @section('content')

 
    
        <div class="content-wrapper">
         

          
            <div class="page-title">
              <div class="page-title-content">
                <div class="shell">
                  <p class="page-title-header">MY BOOKINGS</p>
                </div>
              </div>
            </div>
            <section class="section-xl bg-periglacial-blue">
              <div class="shell">
               
                  <table class="table-custom table-custom-primary">
                    <thead>
                      <tr>
                  <th>PRODUCT NAME</th>
                  <th>QUANTITY</th>
                  <th>COUNT</th>
                  <th>PRICE</th>
                  <th>SUBTOTAL</th>

                  <th>*</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                  <tr>
                  <td>{{ $row->productname}}</td>
                  <td>{{ $row->quantity}}g</td>
                  <td>{{ $row->count}}</td>
                  <td>{{ $row->price}} </td>
                  <td>{{ $row->price*$row->count}} </td>
                  </tr>
                  @endforeach
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>Total Amount</b></td>
                      <td><span style="color:gray"><b>{{$total}}<b></span></td>
                  </tr>
                  <tr>
                  <td></td>    
                  <td></td>  
                  <td></td>  
                      
                  <td>CURRENT STAUS:</td>  
                  <td>
               
                    @if($sta==2)
                    <span style="color:blue"> <b> BOOKED</b></span>
                    @elseif($sta==0)
                    <span style="color:red"><b> CANCELLED</b></span>
                    @elseif($sta==3)
                    <span style="color:brown"><b> SHIPPED</b></span>
                    @elseif($sta==4)
                      <span style="color:green"><b> DELIVERED </span>
                    @endif 
      
                  </td> 
                  </tr>
                  <tr>
                  @if($sta==2||$sta==3) 
                  <td></td>    
                  <td></td>  
                  <td></td>  
                  
                  <td></td>  
                  <td>
               
                 
                    <form action="{{ route('shippedproductcancel')}}" method="post">
                      @csrf
                      @foreach($data as $row)
                        <input hidden name="id" value="{{$row->cartid}}">
                        @endforeach
                        <button type="submit"  class="btn btn-primary" >CANCEL ORDER</button>
                    </form>
                   
                    @endif 
      
                  </td> 
                  
                  </tr>
                 
                    </tbody>
</table>
</div>
              </div>
</div>

              @endsection            







































