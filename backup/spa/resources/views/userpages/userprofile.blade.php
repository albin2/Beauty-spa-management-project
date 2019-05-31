@extends('layouts.service')

@section('content')

@foreach($data as $row)

<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h5>.</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-center">
                <img  class="avatar img-circle img-thumbnail" alt="avatar" src="{{ url('').'/storage/'.$row->proimg }}">
                <h6>{{$row ->fname}} {{$row ->lname}}</h6>
                
            </div>
            </hr><br>
            
        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
                <li><a  href="{{ route('viewUsereditprofile')}}">Edit Profile</a></li>
                <li><a  href="{{ route('viewUserChangePassword')}}">Change Password </a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4>
                                </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value={{$row ->fname}}  >
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4>
                                </label>
                                <input type="label" class="form-control" name="last_name" id="last_name" value={{$row ->lname}}>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Phone</h4>
                                </label>
                                <input type="text" class="form-control" name="phone" id="phone" value={{$row ->contact}}>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="mobile" id="mobile" value={{$row ->email}}>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Height</h4>
                                </label>
                                <input type="text" class="form-control" name="email" value={{$row ->height}}>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Weight</h4>
                                </label>
                                <input type="email" class="form-control" id="location" value={{$row ->weight}}>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password">
                                    <h4>Gender</h4>
                                </label>
                                <input type="text" class="form-control" name="password" value={{$row ->gender}}>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2">
                                    <h4>color</h4>
                                </label>
                                <input type="text" class="form-control" name="password2" id="password2" placeholder="color" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                
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