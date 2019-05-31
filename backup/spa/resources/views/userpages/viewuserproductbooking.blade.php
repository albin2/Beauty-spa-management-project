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
                 
                  <th>BOOKING ID</th>
                  <th>BOOOKING DATE</th>
                  <th>USER NAME</th>
                  <th>BILLING ADDRESS</th>
                  <th>STATUS</th>
                  <th>*</th>


                  <th>*</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($data as $row)
                  <tr>
                    
                 
                  <td>BKPAPAYA{{ $row->cartid}}</td>
                  <td>{{ $row->bookingdate}}</td>
                  <td>{{ $row->fname}} {{ $row->lname}}</td>
                  <td>{{ $row->firstname}} {{ $row->lastname}}<br>
                    {{ $row->address }}<br>
                      {{ $row->post }}<br>
                      {{ $row->pincode }}

                  </td>
                  
                  <td> @if($row->satus==0)
                  <span style="color:red"><b> CANCELLED</b></span>
                    @elseif($row->satus==2)
                    <span style="color:blue"> <b> BOOKED</b></span>
                    @elseif($row->satus==3)
                    <span style="color:brown"><b> SHIPPED</b></span>
                    @elseif($row->satus==4)
                    <span style="color:green"><b> DELIVERED </span>
                    @endif 
                  </td>
                  
                  <td>
                  
                    <form action="{{ route('viewuserdetailsproduct')}}" method="post">
                      @csrf
                      <input hidden name="status" value="{{$row->satus}}">
                      <input hidden name="tmnt" value="{{$row->totalamount}}">
                        <input hidden name="id" value="{{$row->cartid}}">
                        <button type="submit"  class="btn btn-primary" >VIEW DETAILS</button>
                    </form>
                   
                  </td>
                  </tr>
                  @endforeach
                     
                    </tbody>
</table>
</div>
              </div>
</div>

              @endsection            







































