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
            <form method="POST" class="oh-autoval-form" enctype="multipart/form-data" onsubmit="return">
                @csrf

                <class="box-body">
                    <center>
                        <h2><B>UPDATE PRODUCT STOCK</B></h2>
                    </center>
                    <div style="margin-left:100px;margin-right:100px;margin-top:20px;background-color: #e7e4e7;">

                        <label>
                            <h4><b>SELECT PRODUCT</b></h4>
                        </label>
                        <li class="nav-item dropdown ">

                            <a class="nav-link dropdown-toggle form-control " href="{{ route('viewUserproduct')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select product
                            </a>
                            <div class="dropdown-menu form-control" aria-labelledby="navbarDropdown">
                                @foreach($data as $ser)
                                <a class="dropdown-item form-control" href="{{ route('productupdates',$ser['id'])}}">{{ $ser['productname'] }}</a><br>
                                @endforeach
                                
                        </div>

                           
            </form>


        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    @endsection 