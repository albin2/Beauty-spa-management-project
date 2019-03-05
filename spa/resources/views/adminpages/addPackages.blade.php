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
  <form  method="POST" class="oh-autoval-form" enctype="multipart/form-data" action="{{ route('savePackages') }}" onsubmit="return">
  @csrf
   <class="box-body" >
              <center><h2><B>ADD PACKAGES</B></h2></center>
              <div style="margin-left:100px;margin-right:100px;margin-top:20px;background-color: #e7e4e7;">

  <label><h4><b>Services Name</b></h4></label>
						<select name="servename" class="av-required">
                @foreach($services1 as $ser)
                  <option value="{{ $ser['id'] }}">{{ $ser['servname'] }}</option> 
                @endforeach
     
              
              </select>
   <div class="form-group">
    <label><h4><b>Package Name</b></h4></label>
    <input type="text" class="form-control av-required" av-message="Required"name="packname"  placeholder="package Name">
 </div>
 <div class="form-group">
    <label><h4><b>Package Description</b></h4></label>
    <input type="text" class="form-control av-required" av-message="required"  name="packdecr"  placeholder="Description">
 </div>
 <div class="form-group">
    <label><h4><b>Time Duration</b></h4></label>
    <input type="number" class="form-control av-posnumber" av-message="positive number" name="timed"  placeholder="Time in minutes">
 </div>
 <div class="form-group">
    <label><h4><b>Price</b></h4></label>
    <input type="number" class="form-control av-price" av-message="invalid pricing format" name="price"  placeholder="peice">
 </div>
 <div class="form-group">
    <label><h4><b>picture</b></h4></label>
    <input type="file" class="form-control av-required"name="image"  placeholder="image" accept=".jpg,.jpeg,.png,.jfif">
 </div>
 <div style="margin-left:400px;" >
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</div>

 </form>

   
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

@endsection