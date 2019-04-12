@extends('layouts.checkouter')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="{{ asset('/invoice/invoice.css') }}">

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
           
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        @foreach($add as $row)
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{ $add[0]->fname}} {{ $add[0]->lname}}</h2>
                        <div class="address"><h4>{{ $add[0]->address}},{{ $add[0]->post }},{{ $add[0]->pincode }}</h4></div>
                        @endforeach
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 3-2-{{ $add[0]->cartid }}</h1>
                        <div class="date">Date of Invoice: {{ $add[0]->updated_at }}</div>
                        
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="total" ></th>
                            <th class="text-left">PRODUCT NAME</th>
                            <th class="text-right">PRICE</th>
                            <th class="text-right">UNIT</th>
                            <th class="text-right">SUB TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @php $value = 0 @endphp
                        @foreach($data as $row)
                            <td class="no"></td>
                            <td class="text-left"><h3>
                            {{ $row->productname }}
                            </td>
                            <td class="unit">{{ $row->price }}</td>
                            <td class="qty">{{ $row->count }}</td>
                            <td class="total">{{ $row->count * $row->price }}</td>
                            @php $value = $value + $row->count * $row->price
                            @endphp
                        </tr>
                        @endforeach
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td ><b>{{ $value}}</b></td>
                        </tr>
                     
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">You can cancel your products Before you delivered.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
    <script src="{{ asset('/invoice/invoice.js') }}"></script>
</div>
@endsection