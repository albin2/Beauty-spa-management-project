
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
            <center><h3><b><class="box-title">PRODUCT DETAILS</b></h3></center>
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
                  <th>PRODUCT NAME</th>
                  <th>CATEGEORY</th>
                  <th>PRICE</th>
                  <th>STOCK</th>
                  <th>*</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                  <td>{{$row ->productname}}</td>
                  <td>{{$row ->categeory}}</td>
                  <td>{{$row ->price}}</td>
                  <td>{{$row ->stock}}</td>
                 <td>
                    <form action="{{ route('delProducts')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row->id }}">
                        <button type="submit" name="delProducts" class="btn btn-primary" >Remove</button>
                    </form>
                  </td>
                  <td>
                    <form action="{{ route('listproductsDetail')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row->id }}">
                        <button type="submit" name="listproductsDetail" class="btn btn-primary" >View More</button>
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