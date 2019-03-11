
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
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">SERVICE DATA</h3>
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
                  <th>SERVICE NAME</th>
                  <th>DISCRIPTION</th>
                  <th>*</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                  <td>{{ $row['servname'] }}</td>
                  <td>{{ $row['serDisc'] }}</td>
                  
                  <td>
                    <form action="{{ route('delServices')}}" method="post">
                      @csrf
                        <input hidden name="uid" value="{{ $row['id'] }}">
                        <button type="submit" name="delServices" class="btn btn-primary" >Remove</button>
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