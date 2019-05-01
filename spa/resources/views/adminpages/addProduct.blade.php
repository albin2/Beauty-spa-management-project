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
  <form  method="POST" class="oh-autoval-form" enctype="multipart/form-data" action="{{ route('Product') }}" onsubmit="return">
  @csrf
   <class ="box-body" >
              <center><h2><B>ADD PRODUCT DETAILS</B></h2></center>
              <div style="margin-left:100px;margin-right:100px;margin-top:20px;background-color: #e7e4e7;">

  <label><h4><b>PRODUCT CATEGEORY NAME</b></h4></label>
						<select name="categeory" class="form-control">
                @foreach($products1 as $ser)
                  <option value="{{ $ser['id'] }}">{{ $ser['categeory'] }}</option> 
                @endforeach
     
              
              </select>
   <div class="form-group">
    <label><h4><b>PRODUCT NAME</b></h4></label>
    <input type="text" class="form-control av-required" av-message="Enter product name "name="productname"  placeholder="Product Name">
 </div>
 <div class="form-group">
    <label><h4><b>PRODUCT DESCRIPTION</b></h4></label>
    <textarea class="form-control av-required" av-message="Enter product description"  name="proddecr"  placeholder="Description"></textarea>
 </div>

 <div class="form-group">
 <label><h4><b>IDEAL FOR</b></h4></label><br>
 <select name="profor" class="form-control">
    
                        <option value="male">MALE</option>
                        <option value="female">FEMALE</option>
                        <option value="MALE AND FEMALE">MALE AND FEMALE</option>
                        </select>
</div>


<div class="form-group">
    <label><h4><b>APPLICATION AREA</b></h4></label>
    <input type="text" class="form-control av-required" av-message="Required"name="aplarea"  placeholder=" Application Area">
 </div>
 <div class="form-group">
    <label><h4><b>QUANTITY</b></h4></label>
    <input type="number" class="form-control av-posnumber" av-message="invalid format" name="quantity"  placeholder="Quantity (in grammes)">
 </div>
 <div class="form-group">
    <label><h4><b>PRICE</b></h4></label>
    <input type="number" class="form-control av-posnumber" av-message="invalid pricing format" name="price"  placeholder="price">
 </div>
 <div class="form-group">
    <label><h4><b>STOCK</b></h4></label>
    <input type="number" class="form-control av-posnumber" av-message="positive number" name="stock"  placeholder="stock details">
 </div>
 <div class="form-group">
    <label><h4><b>PICTURE</b></h4></label>
    <input type="file" class="form-control av-required"av-message="please insert product Image" name="image"  placeholder="image" accept=".jpg,.jpeg,.png,.jfif">
 </div>
 <div style="margin-left:400px;" >
            <button type="submit" name="submit" class="btn btn-primary">ADD PRODUCT</button>
</div>
</div>
</div>

 </form>

   
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

@endsection