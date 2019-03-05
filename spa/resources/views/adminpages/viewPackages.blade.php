
@extends('layouts.admin')
@section('content')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 @component('adminpages.navbar')
 @endcomponent
  <!-- Left side column. contains the logo and sidebar -->
 
@component('adminpages.sidebar')
 @endcomponent
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <center><h3><b><class="box-title">PACKAGE DATA LIST</b></h3></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @isset($info)
                <div class="alert-info alert">
                 {{ $info }}
                </div>
              @endisset
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>PACKAGE NAME</th>
                  <th>PRICE</th>
                  <th>DURATION</th>
                  <th>DISCRIPTION(Minutes)</th>
                  <th>*</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                  <td>{{ $row['packname'] }}</td>
                  <td>{{ $row['price'] }}</td>
                  <td>{{ $row['timed'] }}</td>
                  <td>{{ $row['packdecr'] }}</td>
                  <td>
                    <form action="{{ route('delPackages')}}" method="post">
                      @csrf
                        <input hidden name="uid" value="{{ $row['id'] }}">
                        <button type="submit" name="delPackages" class="btn btn-primary" >Remove</button>
                    </form>
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