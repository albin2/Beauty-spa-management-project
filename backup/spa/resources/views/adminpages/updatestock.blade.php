
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

<center><h3><b><class="box-title">PRODUCT STOCK</b></h3></center>


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search product......." title="Type in a name">

<table id="myTable">
@isset($info)
                <div class="alert-info alert">
                 {{ $info }}
                </div>
              @endisset
  <tr class="header"> 
      
                 <th>PRODUCT NAME</th>
                  <th>STOCK</th>
                  <th>*</th>
                </tr>

                  @foreach($data as $row)
                  <tr>
                      
                  @if($row['stock']<=10)
                  <td><span style="color:red"><b>{{ $row['productname'] }}</b></span></td>
                  <td><span style="color:red"><b>{{ $row['stock'] }}</b></span></td>
                  @else
                  <td>{{ $row['productname'] }}</td>
                  <td>{{ $row['stock'] }}</td>
                  @endif
                  <td>
                    <form action="{{ route('productupdates')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row['id'] }}">
                        <button type="submit" name="delServices" class="btn btn-primary" >UPDATE STOCK</button>
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











   









