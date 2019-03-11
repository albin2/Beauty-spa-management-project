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

  <form class="login100-form validate-form" method="POST" action="{{ route('addEmpRole') }}">
  @csrf
      <h1>ADD EMPLOYEE ROLE</H1>
        <div class="form-group">
                  <label>Role</label>
                  <input type="text" class="form-control"  placeholder="Role" name="name">
        </div>
        <div >
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

@endsection