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
  <form  method="POST"  class="oh-autoval-form" enctype="multipart/form-data" action="{{ route('addServices') }}" onsubmit="return" >
  @csrf
  <div class="box-body" >
              <center><h2><b>ADD SERVICES</b></h2></center>
              @isset($info)
                <div class="alert-info alert">
                 {{ $info }}
                </div>
              @endisset
              <div style="margin-left:100px;margin-right:100px;margin-top:40px;margin-bottom:100px;background-color: #e7e4e7;">
                <div class="form-group">
                  <label>SERVICE NAME</label>
                  <input type="text" class="form-control av-required" av-message="Enter service name" name="servname" placeholder="Service Name">
                </div>
                <div class="form-group">
                  <label>ABOUT SERVICE</label>
                  <textarea class="form-control av-required" av-message="Required" name="serDisc" placeholder="Discription"></textarea>
                </div>
                <div class="form-group">
              <label><h4><b>PICTURE</b></h4></label>
              <input type="file" class="form-control av-required"name="image"  placeholder="image" accept=".jpg,.jpeg,.png,.jfif">
              </div>
                <div style="margin-left:400px;" >
                <button type="submit" class="btn btn-primary">ADD SERVICE</button>
              </div>
              </div>
            </div>
              </form>
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

@endsection