<head>
<!-- Adding oh-autoVal css style -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/oh-autoval-style.css') }}">
<!-- Adding jQuery script. It must be before other script files -->
<script src="{{ asset('js/jquery.min.js') }}"> </script>
<!-- Adding oh-autoVal script file -->
<script src="{{ asset('js/oh-autoval-script.js') }}"></script>
</head>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admint/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>ADMIN BEAUTY AND SPA</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active treeview">
          <a href="#">
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="/adminhome"><i class="fa fa-circle-o"></i>HOME</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>MANAGE EMPLOYEE</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('viewEmployee') }}"><i class="fa fa-circle-o"></i> Add Employee</a></li>
            <!-- <li><a href="{{ route('viewEmpRole') }}"><i class="fa fa-circle-o"></i> Add Employee Role</a></li> -->
            <li><a href="{{ route('listemployees') }}"><i class="fa fa-circle-o"></i> view Employees</a></li>
            <li><a href="{{ route('listempleaves') }}"><i class="fa fa-circle-o"></i> view Employee leave</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>MANAGE USERS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          <li><a href="{{ route('listusers') }}"><i class="fa fa-circle-o"></i> view users</a></li>
          <li><a href="{{ route('listblockedusers') }}"><i class="fa fa-circle-o"></i> view Blocked users</a></li>


          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>MANAGE PACKAGES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          <li><a href="{{ route('viewPackage') }}"><i class="fa fa-circle-o"></i> Add Packages</a></li>
          <li><a href="{{ route('listpackages') }}"><i class="fa fa-circle-o"></i> view packages</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>MANAGE SERVICES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ route('viewServices') }}"><i class="fa fa-circle-o"></i> Add Services</a></li>
          <li><a href="{{ route('listservices') }}"><i class="fa fa-circle-o"></i> view services</a></li>
          
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>MANAGE PRODUCTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ route('addProductCategeory') }}"><i class="fa fa-circle-o"></i> Add Product Categeory</a></li>
          <li><a href="{{ route('viewProduct') }}"><i class="fa fa-circle-o"></i> Add Product Details</a></li>
          <li><a href="{{ route('listproducts') }}"><i class="fa fa-circle-o"></i> View Product Details</a></li>

          <li><a href="{{ route('updateproductss') }}"><i class="fa fa-circle-o"></i>Update product Stock</a></li>
          <li><a href="{{ route('viewproductbookings') }}"><i class="fa fa-circle-o"></i> View Product Bookings</a></li>


          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>MANAGE FEEDBACKS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ route('viewFeedback') }}"><i class="fa fa-circle-o"></i> view feedbacks</a></li>

          </ul>
        </li>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>MANAGE APPOINTMENTS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ route('viewappoi') }}"><i class="fa fa-circle-o"></i>  All appointments</a></li>
          <li><a href="{{ route('todayviewappointment') }}"><i class="fa fa-circle-o"></i> Today's appointments</a></li>
          

          </ul>
        </li>

       
    </section>
    <!-- /.sidebar -->
  </aside>