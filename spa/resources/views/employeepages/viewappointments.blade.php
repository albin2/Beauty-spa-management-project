@extends('layouts.employee') @section('content')
<div class="container"><div style="margin-top:-200px;">
<center><h2><b>VIEW APPOINTMENTS</b></h2></center></div>
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="root row">
            
            </div>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>USER NAME</th>
                  <th>BOOOKING DATE</th>
                  <th>BOOKING TIME</th>
                  <th>PACKAGE NAME</th>
                  <th>AMOUNT</th>


                  <th>*</th>
                </tr>
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
                        CANCELLED
                    @elseif($row->status==1)
                        BOOCKED
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