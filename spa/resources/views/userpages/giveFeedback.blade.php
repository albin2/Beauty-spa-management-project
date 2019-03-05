@extends('layouts.user') @section('content')
<div class="container">
<div class="box-title" ><center><h3><b>Write your feedbacks....</b></h3></center>
            </div>
    <div class="row justify-content-center my-5">
    <div class="container">
    <form class="login100-form validate-form" method="POST" action="{{ route('addfeedback') }}">
    @csrf
      <div class="form-group">
        <textarea class="form-control status-box" rows="3" name='feed' placeholder="Enter your feedbacks here..."></textarea>
      </div>
   
    <div  style="margin-left:500px;">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
  </div>
</div>
</div>
@endsection