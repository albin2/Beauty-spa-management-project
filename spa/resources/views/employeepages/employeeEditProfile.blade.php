@extends('layouts.employee')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/oh-autoval-style.css') }}">
<!-- Adding jQuery script. It must be before other script files -->
<script src="{{ asset('js/jquery.min.js') }}"> </script>
<!-- Adding oh-autoVal script file -->
<script src="{{ asset('js/oh-autoval-script.js') }}"></script>


@foreach($datas as $row)
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
        <span style="color:#e8eddf">   <h5>.</h5></span>
        <span style="color:#e8eddf">   <h5>.</h5></span>
        <span style="color:#e8eddf">   <h5>.</h5></span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <!--left col-->

            
            <div class="text-center">
                <img  class="avatar img-circle img-thumbnail" alt="avatar" src="{{ url('').'/storage/'.$row->image }}">
                <h6>{{$row ->fname}} {{$row ->lname}}</h6>
                
            </div>
            </hr><br>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">
           
       

            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form oh-autoval-form"  action="{{ route('employeeEditProfile') }}" method="post" id="registrationForm">
                     @csrf
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h6><b>FIRST NAME</b></h6>
                                </label>
                                 <input type="text" class="form-control av-name" av-message= "space and . is not allowed" name="fname"  value={{$row ->fname}}  >
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h6><b>LAST NAME</b></h6>
                                </label>
                                <input type="label" class="form-control av-name" av-message= "space and . is not allowed" name="lname"  value={{$row ->lname}}>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                   <h6><b>PHONE</b><h6>
                                </label>
                                <input type="text" class="form-control av-mobile" av-message="Invalid phone number" name="number"  value={{$row ->number}}>
                            </div>
                        </div>

                        
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h6><b>CITY</b></h6>
                                </label>
                                <input type="text" class="form-control av-required" av-message="please Enter city name" name="city"  value={{$row ->city}}  >
                            </div>
                        </div>
                         <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h5><b>QUALIFICATION</b></h5>
                                </label>
                                <input type="text" class="form-control av-required" av-message="please Enter Qualification" name="qualification" value={{$row ->qualification}} >
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <div class="col-xs-12">
                            
                           <h6><b>BIOGRAPHY</b></h6>
                            <textarea class="form-control" name="bio" placeholder="Biography">{{$row ->bio}} </textarea>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                <h6><b>IMAGE</b></h6>
                            </label>
                            <input type="file" class="form-control " name="image" accept=".jpg,.jpeg,.png,.jfif" >
                        </div>
                        <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <input hidden name="id" value="{{ $row->id}}">
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->
                
                <script src="{{ asset('profile/profile.js') }}"></script>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->
</div>
@endforeach
@endsection 