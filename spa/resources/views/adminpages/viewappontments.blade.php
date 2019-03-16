
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
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <center><h3><b><class="box-title">BOOKING DETAILS</b></h3></center>
            </div>
            <!-- /.box-header -->
            <table id="example2" class="table table-dark table-bordered table-hover ">
                <thead>
                <tr clsss="table-dark">
                  <th>USER NAME</th>
                  <th>BOOOKING DATE</th>
                  <th>BOOKING TIME</th>
                  <th>PACKAGE NAME</th>
                  <th>EMPLOYEE NAME</th>
                  <th>AMOUNT</th>


                  <th>*</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($apm as $row)
                  <tr>
                  <td>{{ $row->usname }}</td>
                  <td>{{ $row->bdate }}</td>
                  <td>{{ $row->time }}</td>
                  <td>{{ $row->servid }}</td>
                  <td>{{ $row->duration }}</td>
                  <td>{{ $row->amount }}</td>
                  <td> @if($row->status==0)
                        CANCELLED
                    @elseif($row->status==1)
                        BOOCKED
                    @endif 
                  </td>
                  
               
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
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