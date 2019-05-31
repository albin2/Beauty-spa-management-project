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
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            
            <div class="text-center">
                <img  class="avatar img-circle img-thumbnail" alt="avatar" src="{{ url('').'/storage/'.$row->image }}">
                <h6>{{$row ->fname}} {{$row ->lname}}</h6>
                
            </div>
            </hr><br>

        </div>
      
           
          @endforeach
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
           
            </ul>


            <div class="tab-content">
                
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form oh-autoval-form" action="{{ route('changepassword') }}" method="post" id="registrationForm">
                     @csrf
                     @isset($info)
            <div class="alert-info alert">
                {{ $info }}
            </div>
            @endisset
                        <div class="form-group">

                        <div class="cell-xs-12">
                                <label for="first_name">
                                <b><h6>Current Password</h6></b>
                                </label>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                <input type="password" class="form-control" id="current-password" name="current-password" placeholder="current-password" >
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                <b><h6>New Password</h6></b>
                                </label>
                                <input type="password" class="form-control av-password" av-message="Password must contain uppercase,lowercase,special chars,digits and minimum 6 chars " id="password" name="password" placeholder="New Password">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                   <b> <h6>Re-enter Password</h6></b>
                                </label>
                                <input type="password" class="form-control av-password" av-message="Password must contain uppercase,lowercase,special chars,digits and minimum 6 chars" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                            </div>
                        </div>

                        
                      
                     
                        <div class="form-group">
                            <div class="col-xs-12">
                            <span style="color:#e8eddf">   <h5>.</h5></span>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit">change password</button>
                                </div>
                      </div>
                    </form>

                    <hr>

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

@endsection 

























