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
                        <th>APPOINTMENT DATE</th>
                        <th>APPOINTMENT TIME</th>
                        <th>PACKAGE NAME</th>
                        <th>EMPLOYEE NAME</th>
                        <th>AMOUNT</th>

                        <th>*</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $apm[0]->bdate }}</td>
                        <td>{{ $apm[0]->time }}</td>
                        <td>{{ $apm[0]->servid }}</td>
                        <td>{{ $apm[0]->duration }}</td>
                        <td>{{ $apm[0]->amount }}</td>
                    </tr>

                    <tr>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>CURRENT STATUS:</td>
                        <td>

                            @if( $apm[0]->bdate < $cudate & $apm[0]->status==1)
                                <span style="color:blue"><b>APPOINMENT EXPIRED OR USED</b></span>
                                @elseif($apm[0]->status==1)
                                <span style="color:green"> <b> BOOKED</b></span>
                                @elseif($apm[0]->status==8)
                                <span style="color:brown"><b> PLEASE RESHEDULE YOUR APPOINTMENT</b></span>
                                @endif

                        </td>
                    </tr>
                    <tr>

                        <td></td>
                        <td></td>
                        <td></td>

                        <td>       @if ($apm[0]->status==8)
                            <form action="{{ route('reSheduleDate')}}" method="post">
                                @csrf
                                <input hidden name="eid" value="{{ $apm[0]->emplid}}">
                                <input hidden name="pid" value="{{ $apm[0]->packid}}">
                                <input hidden name="rid" value="{{ $apm[0]->id }}">
                                <button type="submit" name="del" class="btn btn-primary">RESHEDULE </button>
                            </form>

                            @endif</td>
                        <td>
                            @if($apm[0]->status==1 || $apm[0]->status==8 )
                            @if ($apm[0]->bdate > $cudate)
                            <a class="btn btn-primary" data-toggle="modal" data-target="#mymodal">CANCEL APPOINTMENT</a>      

                            @endif
                            @endif


                        </td>
                       
                    </tr>

                </tbody>
            </table>
        </div>
</div>
</div>

@endsection
<div class="modal fade" id="mymodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close " type="button" data-dismiss="modal"><span style="color:red"> X</span></button>

            </div>
            <div class="modal-body">
                <label>Do you want to cancel appointment...</label>
            </div>
            <div class="modal-footer">
            <form action="{{ route('canappo')}}" method="post">
                                @csrf
                                <input hidden name="id" value="{{ $apm[0]->id }}">
                                <button type="submit" name="del" class="btn btn-primary">CONFIRM</button>
                            </form>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $(function() {

        var unsaved = false;
        $(":input").change(function() {
            unsaved = true;
        });

        $('#btnCancel').click(function() {
            if (unsaved) {
                var flag = confirm(
                    "Job Function Not Saved. Are you Sure you want to leave with out saving the data?"
                );
                if (flag)
                    $('#mymodal').modal('hide');

            } else
                $('#mymodal').modal('hide');

        });

    });
</script>