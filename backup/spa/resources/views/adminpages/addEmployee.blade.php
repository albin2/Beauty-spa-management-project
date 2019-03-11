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
  
  <form  method="POST" class="oh-autoval-form" onsubmit="return" enctype="multipart/form-data" action="{{ route('saveEmployee') }}">
  @csrf
 
              <div class="box-body" >
              <center><h2><b>ADD EMPLOYEES</b></h2></center>
              <div class="row">
                  <div class="col-md-offset-2 col-md-8 text-center">
                      @isset($err)
                        <div class="alert alert-danger">
                          {{ $err }}
                          
                        </div>
                      @endisset
                  </div>
              </div>
              <div style="margin-left:100px;margin-right:100px;margin-top:40px;margin-bottom:100px;background-color: #e7e4e7;">
                <div class="form-group">
                  <label><h4><b>Email address</b></h4></label>
                  <input type="email" class="form-control  av-email" av-message="Invalid email address" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label><h4><b>First Name</b></h4></label>
                  <input type="text" class="av-name form-control" av-message= "space and . is not allowed" name="fname" placeholder="Fname" required>
                </div>
                <div class="form-group">
                  <label><h4><b>Last Name</b></h4></label>
                  <input type="text" class="av-name form-control" av-message= "space and . is not allowed" name="lname" placeholder="Lname">
                </div>
                <div class="form-group">
                  <label><h4><b>Date of Birth</b></h4></label>
                  <input type="date" class="form-control av-required" name="dob" placeholder="DOB">
                </div>

                <div class="form-group">
                  <label><h4><b>Qualification</b></h4></label>
                  <input type="text" class="form-control" av-message= "space and . is not allowed" name="qualification" placeholder="Qualification">
                </div>
                <div class="form-group">
                  <label><h4><b>Experience</b></h4></label>
                  <input type="number" class="form-control" av-message= "space and . is not allowed" name="experience" placeholder="Experience">
                </div>
                <div class="form-group">
                  <label><h4><b>Biogrphy</b></h4></label>
                  <textarea class="form-control" av-message= "space and . is not allowed" name="bio" placeholder="Biography"></textarea>
                </div>

                <div class="form-group">
                  <label><h4><b>city</b></h4></label>
                  <input type="text" class="form-control"name="city"  placeholder="city">
                </div>
            
            <div class="form-group">
            <label><h4><b>Gender</b></h4></label>
						<select name="gender"class=" av-required">
                        <option value="volvo">male</option>
                        <option value="saab">female</option>
                        </select>
          </div>
          <div class="form-group">
            <label><h4><b>Employee Service</b></h4></label>
						<select name="Role" class="av-required">
                @foreach($service1 as $emp)
                  <option value="{{ $emp['id'] }}">{{ $emp['servname'] }}</option> 
                @endforeach
     
              
              </select>
          </div>
          <div class="form-group">
                  <label><h4><b>Contact number</b></h4></label>
                  <input type="tel" class="form-control av-mobile" av-message="Invalid phone number" name="number" placeholder="contact number" required>
                </div>
                <div class="form-group">
                  <label><h4><b>Image</b></h4></label>
                  <input type="file" class="form-control "  name="image" accept=".jpg,.jpeg,.png,.jfif" required>
                </div>
                <div style="margin-left:400px;">
                <button type="submit" class="btn btn-primary" style="background-color: green;">Submit</button>
              </div>
                </div>
            <!-- /.box-body -->

            
            
            </form>
  </div>

  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->


@endsection