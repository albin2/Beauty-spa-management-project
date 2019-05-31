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

                        <td>CURRENT STATUS:</td>
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
                                <a class="btn btn-primary" data-toggle="modal" data-target="#mymodal">CANCEL ORDER</a>

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
              <label>Do you want to cancel this order...</label>
            </div>
            <div class="modal-footer">
                <form action="{{ route('shippedproductcancel')}}" method="post">
                    @csrf
                    <input hidden name="id" value="{{$row->cartid}}">

                    <button class="btn btn-primary" id="btnSubmit">Confirm</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $(function () {

        var unsaved = false;
        $(":input").change(function () {
            unsaved = true;
        });

        $('#btnCancel').click(function () {
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
