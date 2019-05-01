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
                  <label><h4><b>EMAIL ADDRESS</b></h4></label>
                  <input type="email" class="form-control  av-email" av-message="Invalid email address" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label><h4><b>FIRST NAME</b></h4></label>
                  <input type="text" class="av-name form-control" av-message= "space and . is not allowed" name="fname" placeholder="Fname" required>
                </div>
                <div class="form-group">
                  <label><h4><b>LAST NAME</b></h4></label>
                  <input type="text" class="av-name form-control" av-message= "space and . is not allowed" name="lname" placeholder="Lname">
                </div>
                
                <div class="form-group">
            <label><h4><b>GENDER</b></h4></label>
						<select name="gender" class="form-control">
                        <option value="volvo">MALE</option>
                        <option value="saab">FEMALE</option>
                        </select>
          </div>
                <div class="form-group">
                  <label><h4><b>CITY</b></h4></label>
                  <input type="text" class="form-control av-required" av-message="please Enter city name" name="city"  placeholder="city">
                </div>
                <div class="form-group">
                  <label><h4><b>QUALIFICATION</b></h4></label>
                  <input type="text" class="form-control av-required" av-message="please Enter Qualification" name="qualification" placeholder="Qualification">
                </div>
                
                <div class="form-group">
                  <label><h4><b>BIOGRAPHY</b></h4></label>
                  <textarea class="form-control av-required" av-message="required" name="bio" placeholder="Biography"></textarea>
                </div>
    
                <div><label><h4><b>EXPERIENCE</b></h4></label>
						<select name="experience" class="form-control ">
                        <option value="0">0-1</option>
                        <option value="1">1-2</option>
                        <option value="2">2-3</option>
                        <option value="3">3-4</option>
                        <option value="4">4-5</option>
                        <option value="5">5-6</option>
                        <option value="6">6-7</option>
                        <option value="7">7-8</option> 
                        <option value="8">8-9</option>
                        <option value="9">9-10</option>
                        <option value="10">10+</option>
                        </select>
          </div>
          <div class="form-group">
            <label><h4><b>EMPLOYEE SERVICE</b></h4></label>
						<select name="Role" class="form-control">
                @foreach($service1 as $emp)
                  <option value="{{ $emp['id'] }}">{{ $emp['servname'] }}</option> 
                @endforeach
     
              
              </select>
          </div>
          <div class="form-group">
                  <label><h4><b>CONTACT NUMBER</b></h4></label>
                  <input type="tel" class="form-control av-mobile" av-message="Invalid phone number" name="number" placeholder="contact number" required>
                </div>
                <div class="form-group">
                  <label><h4><b>IMAGE</b></h4></label>
                  <input type="file" class="form-control av-required" av-message="required"  name="image" accept=".jpg,.jpeg,.png,.jfif" required>
                </div>
                <div style="margin-left:400px;">
                <button type="submit" class="btn btn-primary" style="background-color: green;">ADD EMPLOYEE</button>
              </div>
                </div>
            <!-- /.box-body -->

            
            
            </form>
  </div>

  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->


@endsection