@extends('layouts.admin')
@section('content')

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @component('adminpages.navbar')
        @endcomponent
        <!-- Left side column. contains the logo and sidebar -->

        @component('adminpages.sidebar')
        @endcomponent
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <form method="POST" class="oh-autoval-form" enctype="multipart/form-data" action="{{ route('updateproduct') }}" onsubmit="return">
                @csrf
                @isset($info)
                <div class="alert-info alert">
                 {{ $info }}
                </div>
              @endisset
                <class="box-body">

                    <center>
                        <h2><B>UPDATE PRODUCT STOCK</B></h2>
                    </center>
                    <div style="margin-left:100px;margin-right:100px;margin-top:20px;background-color: #e7e4e7;">

                        
                            
                            <label>
                                <h4><b>PRODUCT NAME : {{ $datas[0]->productname}} </b></h4>
                            </label>
                        
                            <div class="form-group">
                                <label>
                                    <h4><b>CURRENT STOCK : {{ $datas[0]->stock }} </b></h4>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <h4><b>NEW STOCK</b></h4>
                                </label>
                                <input type="text" class="form-control av-posnumber" av-message="positive number" name="stock" placeholder="stock details">
                            </div>
                             <div style="margin-left:400px;">
                             <input hidden name="id" value="{{ $datas[0]->id }}">
                             <input hidden name="cstock" value="{{ $datas[0]->stock }}">
                                <button type="submit" name="submit" class="btn btn-primary">UPDATE STOCK</button>
                    </div>
                   </div>
               </div>

          </form>


    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    @endsection 