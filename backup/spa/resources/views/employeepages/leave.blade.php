@extends('layouts.employee') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @isset($message)
            <div class="alert alert-info">
                {{ $message }}
            </div>

            @endisset
            <div class="card mt-5" style="margin-top:1000px;">
                <div class="content-wrapper">
                    <form class="login100-form validate-form text-center" method="POST" action="{{ route('empleave1') }}">
                        @csrf
                        <h1>APPLY LEAVE</H1>
                        <label></label>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="date" class="form-control" name="leavedate" placeholder="SELECT LEAVE DATE">
                            </div>

                            <input type="text" class="form-control" placeholder="Reson for Leave" name="reson">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">APPLY</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                
                <!-- @foreach($leaves as $leave)
                    @if($leave['status']==0)
                        Pending
                    @elseif($leave['status']==1)
                        Approved
                    @elseif($leave['status']==2)
                        Rejected
                    @endif
                @endforeach -->

            </div>

        </div>
        <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>LEAVE DATE</th>
                  <th>RESON FOR LEAVE</th>
                  <th>STATUS OF THE LEAVE</th>
                  <th>*</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($leaves as $leave)
                  <tr>
                  <td>{{ $leave['leavedate'] }}</td>
                  <td>{{ $leave['reson'] }}</td>
                  <td> @if($leave['status']==0)
                        Pending
                    @elseif($leave['status']==1)
                        Approved
                    @elseif($leave['status']==2)
                        Rejected
                    @endif 
                  </td>
                  <td>
                  @if($leave['status']==0)
    
                    <form action="{{ route('cancelLeave')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $leave['id'] }}">
                        <button type="submit" name="cancelLeave" class="btn btn-primary" >CANCEL</button>
                    </form>
                    @endif 
                  </td>
                  </tr>
                  </tbody>
                  @endforeach
        </table>
    </div>
</div>
@endsection