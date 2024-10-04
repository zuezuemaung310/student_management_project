<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Management</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">

  <style>
    ul{
        list-style-type:none;
        margin: 0;
        padding: 0;
    }
    li{
        padding-bottom: 10px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

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
        <li class="nav-item">
            <a class="btn btn-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user9.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      {{-- <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(Auth::check() && Auth::user()->role !== 'student')
          <li class="nav-item">
            <a href="{{ route('home')}}" class="nav-link">
                <i class="nav-icon fas fa-house"></i>
                <p>
                 Home
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                All User Lists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.index')}}" class="nav-link">
              <i class="nav-icon fas fa-circle-user"></i>
              <p>
                Admin Lists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('teacher.index')}}" class="nav-link">
              <i class="nav-icon fas fa-circle-user"></i>
              <p>
                Teacher Lists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('student.index')}}" class="nav-link">
              <i class="nav-icon fas fa-circle-user"></i>
              <p>
                Student Lists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('event.index')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-days"></i>
              <p>
                Event Lists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tutorial.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Tutorial Lists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('year.index')}}" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Year Lists
              </p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="{{ route('home')}}" class="nav-link">
                <i class="nav-icon fas fa-house"></i>
                <p>
                 Home
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('event.index')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-days"></i>
              <p>
                Event Lists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('thesisbook.index')}}" class="nav-link">
              <i class="nav-icon fas fa-paperclip"></i>
              <p>
                Thesis Lists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tutorial.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Tutorial Lists
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav> --}}

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(Auth::check())
                <!-- Common Home Link for All Roles -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-house"></i>
                        <p>Home</p>
                    </a>
                </li>

                @if(Auth::user()->role === 'admin')
                    <!-- Admin Specific Links -->
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>All User Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle-user"></i>
                            <p>Admin Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle-user"></i>
                            <p>Teacher Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('student.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle-user"></i>
                            <p>Student Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('event.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-days"></i>
                            <p>Event Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('thesisbook.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-paperclip"></i>
                            <p>Thesis Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tutorial.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Tutorial Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('year.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>Year Lists</p>
                        </a>
                    </li>

                @elseif(Auth::user()->role === 'student')
                    <!-- Student Specific Links -->
                    <li class="nav-item">
                        <a href="{{ route('event.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-days"></i>
                            <p>Event Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('thesisbook.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-paperclip"></i>
                            <p>Thesis Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tutorial.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Tutorial Lists</p>
                        </a>
                    </li>

                @elseif(Auth::user()->role === 'teacher')
                    <!-- Teacher Specific Links -->
                    <li class="nav-item">
                        <a href="{{ route('student.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-circle-user"></i>
                            <p>Student Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('thesisbook.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-paperclip"></i>
                            <p>Thesis Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tutorial.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Tutorial Lists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('year.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>Year Lists</p>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </nav>


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid ">
          @yield('content')
      </div><!-- /.container-fluid -->
    </section>
     <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->


<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this item?');
    }
</script>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
</body>
</html>
