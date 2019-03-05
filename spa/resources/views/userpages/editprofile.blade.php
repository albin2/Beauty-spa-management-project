@extends('layouts.user') @section('content')
<div class="container">
    <div class="row justify-content-center my-5">
    <div class="container">
    <form class="login100-form validate-form" method="POST" enctype="multipart/form-data" action="{{ route('userupdate') }}">
                @csrf
					<span class="login100-form-title p-b-59">
						USER DETAILS
					</span>

					<div class="wrap-input100 validate-input" data-validate = "first name is required">
						<span class="label-input100">First Name</span>
						<input class="input100" type="text" name="fname" >
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "first name is required">
						<span class="label-input100">Last Name</span>
						<input class="input100" type="text" name="lname" >
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Date is required">
						<span class="label-input100">DOB</span>
						<input class="input100" type="date" name="DOB" >
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = " please enter the city">
						<span class="label-input100">City</span>
						<input class="input100" type="text" name="city" >
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "please select the gender">
						<span class="label-input100">Gender</span>
						<select name="gender">
                        <option value="volvo">male</option>
                        <option value="saab">female</option>
                        </select>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = " please enter the contact number">
						<span class="label-input100">Contact number</span>
						<input class="input100" type="tel" name="contact" >
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = " please select image">
						<span class="label-input100">Image</span>
						<input class="input100" type="file" name="proimg" placeholder="Image " accept=".jpg,.jpeg,.png">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								SUBMIT
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
  </div>
</div>
</div>
@endsection