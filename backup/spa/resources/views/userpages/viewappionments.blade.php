@extends('layouts.service')
 @section('content')

 
    
        <div class="content-wrapper">
         

          
            <div class="page-title">
              <div class="page-title-content">
                <div class="shell">
                  <p class="page-title-header">APPOINTMENTS</p>
                </div>
              </div>
            </div>
            <section class="section-xl bg-periglacial-blue">
              <div class="shell">
               
                  <table class="table-custom table-custom-primary">
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
                  @if ($row->bdate > $cudate)
                    <form action="{{ route('canappo')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row->id }}">
                        <button type="submit" name="del" class="btn btn-primary" >CANCEL</button>
                    </form>
                    @else
                 </label></label>
                   @endif
                  </td>
                  </tr>
                  @endforeach
                     
                    </tbody>
</table>
</div>
              </div>
</div>

              @endsection            







































