@extends('layouts.dependenciesUsed')
@section('title','Dashboard')
@section('content')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
      </div>
    
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
         
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <!--
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout" role="button">
                <i class="fas fa-power-off"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
    
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/dashboard" class="brand-link">
          <img src="{{asset('img/sswpps_white.png')}}" alt="SSWPPS" class="brand-image img-circle elevation-1" style="opacity: .8">
          <span class="brand-text font-weight-light">SSWPPS

          </span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{Session::get('full_name')}}</a>
            </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="/dashboard" class="nav-link {{$page == 'dashboard'? 'active': '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
                @if(Auth::guard('techGuard')->check())
                <li class="nav-item {{$page == 'task'? 'menu-is-opening menu-open': '' }}">
                    <a href="/distributedTask" class="nav-link">
                      <i class="nav-icon fas fa-clipboard"></i>
                      <p>
                        Task
                      </p>
                    </a>
                  </li>
                  @endif
                  @if(Auth::guard('adminGuard')->check())
                  <li class="nav-item {{$page == 'task'? 'menu-is-opening menu-open': '' }}">
                    <a href="" class="nav-link {{$page == 'task'? 'active': '' }}">
                      <i class="nav-icon fas fa-clipboard"></i>
                      <p>
                        Task
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="/createTask" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create new task</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="/manageTask" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Task</p>
                          </a>
                        </li>
                       
                      </ul>
                  </li>
                  <li class="nav-item {{$page == 'technician'? 'menu-is-opening menu-open': '' }}">
                    <a href="" class="nav-link {{$page == 'technician'? 'active': '' }}">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        Technician
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/createTech" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Register new technician</p>
                            </a>
                          </li>
                        <li class="nav-item">
                          <a href="/manageTech" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Manage Technician</p>
                          </a>
                        </li>
                      </ul>
                  </li>
                  <li class="nav-item {{$page == 'sswpps-iot-net'? 'menu-is-opening menu-open': '' }}">
                    <a href="" class="nav-link {{$page == 'sswpps-iot-net'? 'active': '' }}">
                        <i class="nav-icon ion ion-hammer"></i>
                        <p>
                          SSWPPS-IoT Net
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="/createIotNet" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Create SSWPPS IoT Net</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/manageIotNet" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Manage SSWPPS IoT Net</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/liveStatus" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>SSWPPS IOT Live Status</p>
                        </a>
                      </li>
                  
                    </ul>
                   
                  </li>
                  @endif
            </ul>   
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">@yield('pageTitle')</h1>
              </div><!-- /.col -->
              <!--<div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>--><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
       @yield('contentDashboard')
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Made by fakhruddin with ❤.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
@endsection