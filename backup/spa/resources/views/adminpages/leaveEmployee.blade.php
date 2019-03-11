
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
             <center> <h3> <b><class="box-title">EMPLOYEE LEAVE INFORMATION</b></h3></center>
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
                <tr><th>EMPLOYEE NAME</th>
                  <th>LEAVE DATE</th>
                  <th>RESON FOR LEAVE</th>
                  <th>APPROVE</th>
                  <th>REJECT</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($leaves as $leave)
                  <tr>
                  <td>{{ $leave->fname }}</td>
                  <td>{{ $leave->leavedate }}</td>
                  <td>{{ $leave->reson}}</td>
                  <td> @if($leave->status==0)
                  <form action="{{ route('aprleave')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $leave->id }}">
                        <button type="submit" name="aprleave" class="btn btn-primary" >APPROVE</button>
                    </form>
                    @elseif($leave->status==1)
                        Approved
                    @endif 
                  </td>
                  
                  <td> @if($leave->status==0)
                  <form action="{{ route('rejleave')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $leave->id}}">
                        <button type="submit" name="rejleave" class="btn btn-primary" >REJECT</button>
                    </form>
                    @elseif($leave->status==2)
                        Rejected
                    @endif 
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