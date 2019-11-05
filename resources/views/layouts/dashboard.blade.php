<?php
use App\Http\Controllers\UtilityController ;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MDL | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/bower_components/admin-lte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/bower_components/admin-lte/dist/css/skins/_all-skins.min.css')}}">
    <script src="{{asset('/bower_components/jquery/dist/jquery.js')}}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9] -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    
    <![endif]-->
    
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @yield('css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    
    <header class="main-header">
        <!-- Logo -->
        <a href="/home" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>MDL</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/bower_components/admin-lte/dist/img/user2-160x160.jpg" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                
                                <div class="pull-right">
                                    
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                  
                </ul>
            </div>
        </nav>
    </header>

@if (Route::has('login'))
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                
                
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    
                    @role('customer')
                    <li>
                        <a href="{{route('customer.cart')}}">
                            <i class="fa fa-cart-plus"></i><span>cart</span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{route('products.all')}}">
                            <i class="fa fa-shopping-bag"></i> <span>Store</span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{route('customer.orders')}}">
                            <i class="fa fa-th"></i><span>Orders</span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>
                    @endrole
                    
                    @role('admin|clerk')
                    <li>
                        <a href="{{route('products')}}">
                            <i class="fa fa-th"></i> <span>Products</span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Customers</span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{route('admin.orders')}}">
                            <i class="fa fa-th"></i> <span>Orders</span>
                            <span class="pull-right-container">
                        </span>
                        </a>
                    </li>
                    @endrole
                
                </ul>
            </div>
        </section>
        <!-- /.sidebar -->
    </aside>
 @endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
     
        
        <!-- Main content -->
        <section class="content">
        
        @role('admin')
        <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>150</h3>
                            
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{UtilityController::countProducts()}}</h3>
                            
                            <p>Total Products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{UtilityController::countCustomers()}}</h3>
                            
                            <p>Customers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
           
                <!-- ./col -->
            </div>
        @endrole
        
        <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                
                
                @yield('content')
            </div>
            <!-- /.row (main row) -->
        
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.18
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="/home">MDL</a>.</strong> All rights
        reserved.
    </footer>


</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>


<script src="dist/js/adminlte.min.js"></script>

<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @else
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    @endif
</script>
@yield('scripts')

</body>
</html>
