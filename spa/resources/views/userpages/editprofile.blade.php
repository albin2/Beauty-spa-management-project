@extends('layouts.service')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/oh-autoval-style.css') }}">
<!-- Adding jQuery script. It must be before other script files -->
<script src="{{ asset('js/jquery.min.js') }}"> </script>
<!-- Adding oh-autoVal script file -->
<script src="{{ asset('js/oh-autoval-script.js') }}"></script>

@foreach($data as $row)
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <span style="color:#e8eddf">
                <h5>.</h5>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-center">
                <img class="avatar img-circle img-thumbnail" alt="avatar" src="{{ url('').'/storage/'.$row->proimg }}">
                <h6>{{$row ->fname}} {{$row ->lname}}</h6>

            </div>
            </hr><br>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li><a href="{{ route('viewUserprofile')}}">Profile</a></li>
                <li class="active"><a href="{{ route('viewUsereditprofile')}}">Edit Profile</a></li>
                <li><a href="{{ route('viewUserChangePassword')}}">Change Password </a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form oh-autoval-form" action="{{ route('Userproedit') }}" method="post" id="registrationForm">
                        @csrf
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4>
                                </label>
                                <input type="text" class="form-control av-name" av-message="space and . is not allowed" name="fname" value={{$row ->fname}}>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4>
                                </label>
                                <input type="label" class="form-control av-name" av-message="space and . is not allowed" name="lname" value={{$row ->lname}}>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Phone</h4>
                                </label>
                                <input type="text" class="form-control av-mobile" av-message="enter a valid phone number" name="contact" value={{$row ->contact}}>
                            </div>
                        </div>


                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Height</h4>
                                </label>
                                <input type="text" class="form-control av-posnumber" av-message="invalid format" name="height" value={{$row ->height}}>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Weight</h4>
                                </label>
                                <input type="text" class="form-control av-posnumber" av-message="invalid format" name="weight" value={{$row ->weight}}>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">

                                <h4>Gender</h4>

                                <h4>
                                    @if($row->gender=="")
                                    <label class="radio-inline"><input type="radio" name="gender" value='Male'>Male</label>
                                    <label class="radio-inline"><input type="radio" name="gender" value='Female'>Female</label>
                                    @endif
                                    @if($row->gender=="Male")
                                    <label class="radio-inline"><input type="radio" name="gender" value='Male' checked>Male</label>
                                    <label class="radio-inline"><input type="radio" name="gender" value='Female'>Female</label>
                                    @endif
                                    @if($row->gender=="Female")
                                    <label class="radio-inline"><input type="radio" name="gender" value='Male'>Male</label>
                                    <label class="radio-inline"><input type="radio" name="gender" value='Female' checked>Female</label>
                                    @endif
                            </div>
                            </h4>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <input hidden name="id" value="{{ $row->user_id}}">
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