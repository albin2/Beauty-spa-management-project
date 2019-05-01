
@extends('layouts.admin')
@section('content')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@component('agentpages.navbar')
 @endcomponent
  <!-- Left side column. contains the logo and sidebar -->
 
  @component('agentpages.sidebar')
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

<center><h3><b><class="box-title">PRODUCT BOOKING DETAILS</b></h3></center>



<table id="myTable">
@isset($info)
                <div class="alert-info alert">
                 {{ $info }}
                </div>
              @endisset
           
  <tr class="header"> 
                 <th>PRODUCT NAME</th>
                 <th>QUANTITY</th>
                  <th>COUNT</th>
                  <th>PRICE</th>
                  <th>SUBTOTAL</th>
                  
                  
  </tr>
  

                  @foreach($data as $row)
                  <tr>
                  <td>{{ $row->productname}}</td>
                  <td>{{ $row->quantity}}g</td>
                  <td>{{ $row->count}}</td>
                  <td>{{ $row->price}} </td>
                  <td>{{ $row->price*$row->count}} </td>
                  </tr>
                  @endforeach
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>Total Amount</b></td>
                      <td><span style="color:gray"><b>{{$total}}<b></span></td>
                  </tr>
                  <tr>
                  <td></td>    
                  <td></td>  
                  <td></td>  
                      
                  <td>CURRENT STAUS:</td>  
                  <td>
               
                    @if($sta==2)
                    <span style="color:blue"> <b> BOOKED</b></span>
                    @elseif($sta==0)
                    <span style="color:red"><b> CANCELLED</b></span>
                    @elseif($sta==3)
                    <span style="color:brown"><b> SHIPPED</b></span>
                    @elseif($sta==4)
                      <span style="color:green"><b> DELIVERED </span>
                    @endif 
      
                  </td> 
                  </tr>
                  <tr>
                  @if($sta==3) 
                  <td></td>    
                  <td></td>  
                  <td></td>  
                  
                  <td>Change status:</td>  
                  <td>
               
                 
                    <form action="{{ route('Deliveredproduct')}}" method="post">
                      @csrf
                      @foreach($data as $row)
                        <input hidden name="id" value="{{$row->cartid}}">
                        @endforeach
                        <button type="submit"  class="btn btn-primary" >DELIVERED PRODUCT</button>
                    </form>
                   
                    @endif 
      
                  </td> 
                  </tr>
                 
                
                
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
 
 
 
 
 
 
 
 
 
 
 
 
 
 
