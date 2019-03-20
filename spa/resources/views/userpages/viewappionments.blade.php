@extends('layouts.service') @section('content')
<div class="container">
    <div class="row justify-content-center my-5">
 <div class="box-header">
            <div class="box-title" ><center><h3><b>BOOKING DETAILS</b></h3></center>
            </div>
    
        <div class="col-md-8">
        
            <div class="root row">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>BOOOKING DATE</th>
                  <th>BOOKING TIME</th>
                  <th>PACKAGE NAME</th>
                  <th>EMPLOYEE NAME</th>
                  <th>AMOUNT</th>


                  <th>*</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($apm as $row)
                  <tr>
                  <td>{{ $row->bdate }}</td>
                  <td>{{ $row->time }}</td>
                  <td>{{ $row->servid }}</td>
                  <td>{{ $row->duration }}</td>
                  <td>{{ $row->amount }}</td>
                  
                  <td>
                    <form action="{{ route('canappo')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row->id }}">
                        <button type="submit" name="del" class="btn btn-primary" >CANCEL</button>
                    </form>
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
</div>
</div>
@endsection