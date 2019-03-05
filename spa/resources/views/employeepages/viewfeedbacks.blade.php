@extends('layouts.employee') @section('content')
<div class="container">
<center><h2><b>USERS FEEDBACKS</b></h2></center>
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div style="margin-left:160px;" class="root row">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>USER NAME</th>
                  <th>FEEDBACK</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($feeds as $row)
                  <tr>
                  <td>{{ $row->fname }}</td>
                  <td>{{ $row->feed }}</td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection