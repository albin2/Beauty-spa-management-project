
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


    <!-- Main content -->
    <section class="content">
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

<center><h3><b><class="box-title"> PRODUCT DETAILS</b></h3><center>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Products.." title="Type in a name">

<table id="myTable">
@isset($info)
                <div class="alert-info alert">
                 {{ $info }}
                </div>
              @endisset
  <tr class="header"> 
                  <th>PRODUCT NAME</th>
                  <th>CATEGEORY</th>
                  <th>PRICE</th>
                  <th>STOCK</th>
                  <th>*</th>
                  <th>*</th>
                  <th>*</th>
  </tr>
  @foreach($data as $row)
                  <tr>
                  <td>{{$row ->productname}}</td>
                  <td>{{$row ->categeory}}</td>
                  <td>{{$row ->price}}</td>
                  <td>{{$row ->stock}}</td>
                 <td>
                    <form action="{{ route('delProducts')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row->id }}">
                        <button type="submit" name="delProducts" class="btn btn-primary" >REMOVE</button>
                    </form>
                  </td>


                  <td>
                  @if ($row->status==1)
                    <form action="{{ route('blockProducts')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row->id }}">
                        <button type="submit" name="blockProducts" class="btn btn-primary" >BLOCK</button>
                    </form>
                    @else
                    <form action="{{ route('unblockProducts')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row->id }}">
                        <button type="submit" name="unblockProducts" class="btn btn-primary" >UN BLOCK</button>
                    </form>
                    @endif
                  </td>
                  
                  <td>
                    <form action="{{ route('listproductsDetail')}}" method="post">
                      @csrf
                        <input hidden name="id" value="{{ $row->id }}">
                        <button type="submit" name="listproductsDetail" class="btn btn-primary" >View More</button>
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

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


















 