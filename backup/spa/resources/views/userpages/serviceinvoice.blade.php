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
                    @foreach($det as $row)
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{ $row->usname}}</h2>
                        <div class="address"> </h4></div>
                      
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 3-2-{{ $row->id }}</h1>
                        <div class="date">Date of Invoice: {{ $row->updated_at }}</div>
                        
                    </div>
                </div>
               
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="total" ></th>
                            <th class="text-left">PACKAGE NAME</th>
                            <th class="text-left">BOOKING DATE</th>
                            <th class="text-left">BOOKING TIME</th>
                            <th class="text-right">PRICE</th>
                            <th class="text-right">EMPLOEE NAME</th>
                            <th class="text-right">SUB TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                       
                            <td class="no"></td>
                            <td class="qty"><h3>
                            {{ $row->servid}}
                            </td>
                            <td class="unit">{{ $row->bdate }}</td>
                            <td class="qty">{{ $row->time}}</td>
                            <td class="qty">{{ $row->amount}}</td>
                            <td class="qty">{{ $row->duration}}</td>
                            <td class="total">{{ $row->amount}}</td>

                            
                        </tr>
                        
                       
                    </tbody>
                    <tfoot>
                        <tr><td></td>
                            <td></td>
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
                       <td></td>
                            <td></td>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td ><b>{{ $row->amount}}</b></td>
                        </tr>
                    
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">You can cancel selected package ............</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        @endforeach
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
    <script src="{{ asset('/invoice/invoice.js') }}"></script>
</div>
@endsection