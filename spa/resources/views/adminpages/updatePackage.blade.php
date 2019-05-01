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
  <form  method="POST" class="oh-autoval-form" enctype="multipart/form-data" action="{{ route('updatesPackages') }}" onsubmit="return">
  @csrf
   <class = "box-body" >
              <center><h2><B>UPDATE PACKAGES</B></h2></center>
              <div style="margin-left:100px;margin-right:100px;margin-top:20px;background-color: #e7e4e7;">

   <div class="form-group">
    <label><h4><b>Package Name</b></h4></label>
    <input type="text" class="form-control av-required" av-message="Enter package Name"name="packname"  value="{{ $data[0]->packname }}">
 </div>
 <div class="form-group">
    <label><h4><b>Package Description</b></h4></label>
    <textarea class="form-control av-required" av-message="Enter package Description"  name="packdecr" >{{ $data[0]->packdecr }}</textarea>
 </div>

 <div class="form-group">
    <label><h4><b>Package Benefits</b></h4></label>
    <textarea name="benafits" av-message="Enter package benefits" class="form-control av-required" >{{ $data[0]->benafits }}</textarea>
    <!-- <input type="text" class="form-control av-required" av-message="required"  name="benafits"  placeholder="Benefits"> -->
 </div>

 <div class="form-group">


 <div class="form-group">
   <br> <label><h4><b>Time Duration</b></h4></label>
    <input type="number" class="form-control av-posnumber" av-message="positive number" name="timed"  value="{{ $data[0]->timed}}">
 </div>
 <div class="form-group">
    <label><h4><b>Price</b></h4></label>
    <input type="number" class="form-control av-price" av-message="invalid pricing format" name="price" value="{{ $data[0]->price }}">
 </div>
 <div class="form-group">
    <label><h4><b>picture</b></h4></label>
    <input type="file" class="form-control " name="image"  value="{{ $data[0]->image}}" accept=".jpg,.jpeg,.png,.jfif">
 </div>
 <div style="margin-left:400px;" >
 <input hidden name="id" value="{{$data[0] ->id}}">
            <button type="submit"  class="btn btn-primary">UPDATE </button>
</div>
</div>
</div>

 </form>

   
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

@endsection