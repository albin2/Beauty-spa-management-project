<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="{{ asset('css/spa.css') }}" rel="stylesheet">
<div class=" register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <!-- <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
                            </li>
                        </ul> -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Apply as a Hirer</h3>
                                <form class="row register-form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name *" value="" name="fname" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" value="" name="lname" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *" value=""  name="email"/>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" name="contact"/>
                                        </div>
                                        <div class="input-group mb-3">
                                                 <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">DOB</span>
  </div>
                                            <input type="date" maxlength="10" minlength="10" class="form-control" placeholder="Date of birth *" value="" name="DOB"/>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value="" name="password" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password *" value="" name="password_confirmation" />
                                        </div>
                                       
                                        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Gender</span>
  </div>
  <select class="form-control" name="gender" >
                                                <option class="hidden"  selected disabled></option>
                                                <option>male</option>
                                                <option>female</option>
                                            </select>
</div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City *" value="" name="city"/>
                                        </div>
                                        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">profile pic</span>
  </div>
                                            <input type="file" class="form-control" placeholder="image *" value="" name="proimg" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
            </div>