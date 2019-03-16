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
            <form method="POST" class="oh-autoval-form" enctype="multipart/form-data" action="{{ route('ProductCategeory') }}" onsubmit="return">
                @csrf
                <div class="box-body">
                    <center>
                        <h2><b>ADD PRODUCT CATEGEORY</b></h2>
                    </center>
                    <div style="margin-left:100px;margin-right:100px;margin-top:40px;margin-bottom:100px;background-color: #e7e4e7;">
                        <div class="form-group">
                            <label>CATEGEORY NAME</label>
                            <input type="text" class="form-control av-required" av-message="Required" name="categeory" placeholder="Categeory Name">
                        </div>
                        <div style="margin-left:400px;">
                            <button type="submit" class="btn btn-primary">ADD CATEGEORY</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    @endsection 