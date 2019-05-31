
@extends('layouts.admin')
@section('content')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 @component('adminpages.navbar')
 @endcomponent
  <!-- Left side column. contains the logo and sidebar -->
 
@component('adminpages.sidebar')
 @endcomponent
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<center><h3><b><class="box-title">BLOCKED USERS DATA LIST</b></h3><center>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for USERS.." title="Type in a name">

<table id="myTable">
@isset($info)
                <div class="alert-info alert">
                 {{ $info }}
                </div>
              @endisset
  <tr class="header"> 
    <th >EMAIL</th>
    <th >FIRST NAME</th>
    <th>LAST NAME</th>
    <th>CONTACT NUMBER</th>
        <th>*</th>
     <th>*</th>
  </tr>
  @foreach($data as $row)
  <tr><td>{{$row ->email}}</td>
  <td>{{$row ->fname}}</td>
                  <td>{{$row ->lname}}</td>
                  <td>{{$row ->contact}}</td>
                  
                  
                  <td>
                    <form action="{{ route('delUser')}}" method="post">
                      @csrf
                        <input hidden name="uid" value="{{$row ->user_id}}">
                        <button type="submit" name="delUser" class="btn btn-primary" >REMOVE</button>
                    </form>
                  </td>

                  <td>
                    <form action="{{ route('unblockUser')}}" method="post">
                      @csrf
                        <input hidden name="uid" value="{{$row ->user_id}}">
                        <button type="submit" name="ublockUser" class="btn btn-primary" >UNBLOCK</button>
                    </form>
                  </td>
                  </tr>
                  @endforeach
    

</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>



    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  @endsection















    