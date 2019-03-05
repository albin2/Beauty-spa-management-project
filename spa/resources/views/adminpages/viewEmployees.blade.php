
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
            <center><h3><b> <class="box-title">EMPLOYEE DATA LIST</b></h3></center>
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
                  <th>NAME</th>
                  <th>DOB</th>
                  <th>CITY</th>
                  <th>CONTACT NUMBER</th>
                  <th>*</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                  <td>{{ $row['fname'] }}</td>
                  <td>{{ $row['dob'] }}</td>
                  <td>{{ $row['city'] }}</td>
                  <td>{{ $row['number'] }}</td>
                  <td>
                    <form action="{{ route('delEmployees')}}" method="post">
                      @csrf
                        <input hidden name="uid" value="{{ $row['id'] }}">
                        <button type="submit" name="delEmployees" class="btn btn-primary" >Remove</button>
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