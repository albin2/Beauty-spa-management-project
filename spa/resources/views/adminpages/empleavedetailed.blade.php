
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
              @if(sizeof($leaveusers))

              EMPLOYEE NAME:<b>{{ $leaveusers[0]->fname }} {{ $leaveusers[0]->lname }}</b><br>
              LEAVE DATE:<b>{{ $leaveusers[0]->leavedate }}</b><br>
              RESON FOR LEAVE:<b>{{ $leaveusers[0]->reson }}</b><br>
              <br>
              <span style="color:blue"><b> BOOKING DEATAIS ON LEAVE DAY</b></span>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr><th>USER NAME</th>
                  <th>PACKAGE NAME</th>
                  <th>TIME</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($leaveusers as $leave)
                  <tr>
                  <td>{{ $leave->usname }}</td>
                  <td>{{ $leave->servid }}</td>
                  <td>{{ $leave->time}}</td>
                  </tr> 
                  @endforeach
                  <tr>
                    <td></td>
                    <td></td>
                  <td>
             
                  </td>
                  </tr>
                  <tr>
                    <td>@if($leaveusers[0]->lstatus==0)
                   STATUS:<span style="color:blue"> <b>PENDING REQUEST</b></span>

                    @elseif($leaveusers[0]->lstatus==2)
                    STATUS: <span style="color:green"> <b>  APPROVED</b></span>

                    @elseif($leaveusers[0]->lstatus==10)
                    STATUS: <span style="color:red"> <b>  REJECTED</b></span>

                    @endif </td>
                    <td>
                  
                    </td>
                  <td> 
                  
                  </td>
                  </tr>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-8">

                </div>
                <div class="col-md-1">
                @if($leaveusers[0]->lstatus==0)
                  <form action="{{ route('aprleave')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{$leaveusers[0]->leaveid}}">
                        <input hidden name="bdate" value="{{$leaveusers[0]->leavedate}}">

                        @foreach($leaveusers as $leave)
                        <input hidden name="bkid[]" value="{{$leave->bkdid}}">
                        <input hidden name="email[]" value="{{$leave->email}}">
                        
                        @endforeach 
                        <button type="submit" name="aprleave" class="btn btn-primary" >APPROVE</button>
                    </form>
                   
                    @endif 
                </div>
                <div class="col-md-1">
                @if($leaveusers[0]->lstatus==0)
                  <form action="{{ route('rejleave')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $leaveusers[0]->leaveid}}">

                        <button type="submit" name="rejleave" class="btn btn-primary" >REJECT</button>
                    </form>
                   
                    @endif 
                </div>
              @elseif(sizeof($leaves))
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>  EMPLOYEE NAME</th>
                  <th>LEAVE DATE</th>
                  <th>RESON FOR LEAVE</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                  <td>{{ $leaves[0]->fname }}</td>
                  <td>{{ $leaves[0]->leavedate }}</td>
                  <td>{{ $leaves[0]->reson}}</td>
                  </tr> 
                  <tr>
                    <td>
                   
                    </td>
                    <td></td>
                  <td> 
                  </td>
                 </tr>
                  <tr>
                    <td>
                    
                    @if($leaves[0]->status==0)
                   STATUS: <span style="color:blue"> <b>PENDING REQUEST</b></span>
                    @elseif($leaves[0]->status==2)
                    STATUS: <span style="color:green"> <b>  APPROVED</b></span>
                    @elseif($leaves[0]->status==10)
                    STATUS: <span style="color:red"> <b>  REJECTED</b></span>
                    @endif 
                    </td>
                   <td>
                  
                   </td>
                  <td> 
                    
                  </td>
                  </tr>
                 
                
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-8">

                </div>
                <div class="col-md-1">
                @if($leaves[0]->status==0)
                  <form action="{{ route('aprleaveno')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{$leaves[0]->leaveid}}">
                        <button type="submit" name="aprleave" class="btn btn-primary" >APPROVE</button>
                    </form>
                        @endif
                </div>
                <div class="col-md-1">
                @if($leaves[0]->status==0)
                  <form action="{{ route('rejleave')}}" method="post">
                      @csrf
                    
                        <input hidden name="id" value="{{ $leaves[0]->leaveid}}">
                        <button type="submit" name="rejleave" class="btn btn-primary" >REJECT</button>
                    </form>
                    @endif 
                </div>        
              @endif
                
              </div>
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