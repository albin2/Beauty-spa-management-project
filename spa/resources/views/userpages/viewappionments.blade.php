@extends('layouts.service')
@section('content')


<div class="content-wrapper">



  <div class="page-title">
    <div class="page-title-content">
      <div class="shell">
        <p class="page-title-header">MY APPOINTMENTS</p>
      </div>
    </div>
  </div>
  <section class="section-xl bg-periglacial-blue">
    <div class="shell">

      <table class="table-custom table-custom-primary">
        <thead>
          <tr>

            <th>APPOINTMENT ID</th>
            <th>APPOINTMENT DATE</th>
            <th>APPOINTMENT TIME</th>
            <th>STATUS</th>
            <th>*</th>


            <th>*</th>
          </tr>
        </thead>
        <tbody>
          @foreach($apm as $row)
          <tr>


            <td>APPO{{$row->id}}PAPAYA</td>
            <td>{{ $row->bdate}}</td>
            <td>{{$row->time}}</td>

            <td> @if( $row->bdate < $cudate & $row->status==1)
              <span style="color:blue"><b>APPOINMENT EXPIRED OR USED</b></span>
              @elseif($row->status==1)
              <span style="color:green"> <b> BOOKED</b></span>
              @elseif($row->status==8)
              <span style="color:brown"><b> PLEASE RESHEDULE YOUR APPOINTMENT</b></span>
              @endif
            </td>

            <td>

              <form action="{{ route('viewuserdetailappointment')}}" method="post">
                @csrf
                <input hidden name="id" value="{{$row->id}}">
                <button type="submit" class="btn btn-primary">VIEW DETAILS</button>
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






