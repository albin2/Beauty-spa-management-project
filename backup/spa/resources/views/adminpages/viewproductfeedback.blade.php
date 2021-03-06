
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
            <center><h3><b><class="box-title">PRODUCT FEEDBACKS</b></h3></center>
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
                  <th>USER NAME</th>
                  <th>FEEDBACK</th>
                  <th> DATE </th>
                  <th>*</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($feeds as $row)
                  <tr>
                  <td>{{ $row->productname }}</td>
                  <td>{{ $row->fname }} {{ $row->lname }}</td>
                  <td>{{ $row->productfeed }}</td>
                  <td>{{ $row->feeddate}}</td>
                  
                  <td>
                    <form action="{{ route('deletefeedback')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row->feedid }}">
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