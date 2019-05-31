@extends('layouts.employee') @section('content')
<div class="container">
  <div style="margin-top:40px;">
    <center><span style="color:#aa9144"> <u>
          <h3> <b>
              VIEW APPOINTMENTS
        </u> </b></h3></span></center>
  </div>
  <div class="row justify-content-center my-5">
    <div class="col-md-12">
      <div class="root row">

      </div>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th><span style="color:#aa9144">USER NAME</span></th>
            <th><span style="color:#aa9144">BOOOKING DATE</span></th>
            <th><span style="color:#aa9144">BOOKING TIME</span></th>
            <th><span style="color:#aa9144">PACKAGE NAME</span></th>
            <th><span style="color:#aa9144">AMOUNT</span></th>


            <th><span style="color:#aa9144">*</span></th>
          </tr></span>
        </thead>
        <tbody>
          @foreach($apm as $row)
          <tr>
            <td>{{ $row->usname }}</td>
            <td>{{ $row->bdate }}</td>
            <td>{{ $row->time }}</td>
            <td>{{ $row->servid }}</td>
            <td>{{ $row->amount }}</td>
            <td> @if($row->status==0)
            <span style="color:red"> CANCELLED</span>
              @elseif($row->status==1)
              <span style="color:green"> BOOCKED</span>
              @endif
            </td>


          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
@endsection