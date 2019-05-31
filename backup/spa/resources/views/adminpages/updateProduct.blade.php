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

            @isset($info)
            <div class="alert-info alert">
                {{ $info }}
            </div>
            @endisset
            
            <form method="POST" class="oh-autoval-form" enctype="multipart/form-data" action="{{ route('updatesProductdetails') }}" onsubmit="return">
                @csrf
                <class="box-body">
                    <center>
                        <h2><B>UPDATE PRODUCT DETAILS</B></h2>
                    </center>
                    <div style="margin-left:100px;margin-right:100px;margin-top:20px;background-color: #e7e4e7;">



                        </select>
                        <div class="form-group">
                            <label>
                                <h4><b>PRODUCT NAME</b></h4>
                            </label>
                            <input type="text" class="form-control av-required" av-message="Enter Product name" name="productname" value="{{ $data[0]->productname }}">
                        </div>
                        <div class="form-group">
                            <label>
                                <h4><b>PRODUCT DESCRIPTION</b></h4>
                            </label>
                            <textarea class="form-control av-required" av-message="Enter Product description" name="proddecr">{{$data[0]->proddecr}}</textarea>
                        </div>
                        
    
 
                 <div class="form-group">
                     <br><label><h4><b>APPLICATION AREA</b></h4></label>
                      <input type="text" class="form-control av-required" av-message="Required"name="aplarea"  value="{{ $data[0]->aplarea }}" placeholder=" Application Area">
                       </div>
                       <div class="form-group">
                  <label><h4><b>QUANTITY</b></h4></label>
                  <input type="number" class="form-control av-posnumber" av-message="invalid format" name="quantity"  value="{{ $data[0]->quantity }}" placeholder="Quantity (in grammes)">
                      </div>
                        <div class="form-group">
                            <label>
                                <h4><b>PRICE</b></h4>
                            </label>
                            <input type="number" class="form-control av-price" av-message="invalid pricing format" name="price" value={{$data[0]->price}}>
                        </div>
                   
                       
                        <div class="form-group">
                            <label>
                                <h4><b>PICTURE</b></h4>
                            </label>
                            <input type="file" class="form-control " name="image" accept=".jpg,.jpeg,.png,.jfif" value={{$data[0]->image}}>
                        </div>
                        <div style="margin-left:400px;">
                        <input hidden name="id" value="{{$data[0] ->id}}">

                            <button type="submit"  class="btn btn-primary">UPDATE</button>
                        </div>
                    </div>
        </div>
        </form>


    </div>
    <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    @endsection 