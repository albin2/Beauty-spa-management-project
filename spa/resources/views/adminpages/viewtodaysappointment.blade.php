
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

<center><h3><b><class="box-title">APPOINTMENT DETAILS</b></h3></center>


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Appointment date wise......." title="Type in a name">

<table id="myTable">
@isset($info)
                <div class="alert-info alert">
                 {{ $info }}
                </div>
              @endisset
  <tr class="header"> 
                  <th>BOOOKING DATE</th>
                  <th>USER NAME</th>
                  <th>BOOKING TIME</th>
                  <th>PACKAGE NAME</th>
                  <th>EMPLOYEE NAME</th>
                  <th>AMOUNT</th>
                  <th>*</th>

  </tr>

                  @foreach($apm as $row)
                 
                  
                  <tr>
                  <td>{{ $row->bdate }}</td>
                  <td>{{ $row->usname }}</td>
                  <td>{{ $row->time }}</td>
                  <td>{{ $row->servid }}</td>
                  <td>{{ $row->duration }}</td>
                  <td>{{ $row->amount }}</td>
                  <td> @if($row->status==0)
                  <span style="color:red"> <b>  CANCELLED</b></span>
                    @elseif($row->status==1)
                    <span style="color:green"> <b> BOOCKED</b></span>
                    @endif 
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
