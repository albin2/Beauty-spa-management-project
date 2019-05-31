@extends('layouts.employee') @section('content')

<div class="container">
    <div style="margin-top:40px;">
        <center><span style="color:#aa9144"> <u>
                    <h3> <b>
                            LEAVE INFORMATION
                </u> </b></h3></span></center>
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-md-10">
            <div class="root row">

            </div>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>LEAVE DATE</th>
                        <th>RESON FOR LEAVE</th>
                        <th>CURRENT STATUS</th>
                        <th>*</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaves as $leave)
                    <tr>
                        <td>{{ $leave['leavedate'] }}</td>
                        <td>{{ $leave['reson'] }}</td>
                        <td>@if($leave['status']==0)
                            <span style="color:blue"> <b>PENDING REQUEST</b><span>
                                    @elseif($leave['status']==2)
                                    <span style="color:green"> <b> APPROVED</b></span>
                                    @else
                                    <span style="color:red"> </b> REJECTED</b></span>
                                    @endif
                        </td>

                        <td>
                            @if($leave['status']==0)

                            <form action="{{ route('cancelLeave')}}" method="post">
                                @csrf
                                <input hidden name="id" value="{{ $leave['leaveid'] }}">
                                <button type="submit" name="cancelLeave" class="btn btn-primary">CANCEL</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

@endsection