
<?php

  use App\Models\User;

  $session = session()->get('user');
  
  // if ($session == ''){
  //   header('Location: /login');
  //   exit();
  // }
?>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='{{ asset("template/plugins/fontawesome-free/css/all.min.css") }}'>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    footer {
      text-align: center;
      background-color: black;
      color: white;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <div style="margin: 0 0 0 80%;">
      <a href="/login"><button type="button" class="btn btn-outline-success" style="margin-right: 10px;">Login</button></a>
      <a href="/register"><button type="button" class="btn btn-outline-danger">Register</button></a>
    </div>
    

    <!-- Right navbar links -->
  </nav>
  <hr>
</div>
  <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <h1 style="margin: 10% 0 0 25%; font:80pt Arial; font-weight:600;">RECRUITMEN<sup>&reg;</sup></h1>
            <h1 style="margin-left:50%">Executive Search</h1>
            <!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
        <footer class="footer-distributed">
          
          <div class="footer-left">
            <hr>
    
            <p class="footer-links">
              <a href="#">Home</a>
              |
              <a href="#">Blog</a>
              |
              <a href="#">About</a>
              |
              <a href="#">Contact</a>
            </p>
    
            <p class="footer-company-name">© 2023 Education20SI Ltd.</p>
          </div>
    
          <div class="footer-center">
            <div>
              <i class="fas fa-location-arrow"></i> <span>UPH Medan</span>
                <p><span>Jln. Imam Bonjol No. 5 Medan Petisah, Petisah Tengah, 20112</span></p>
            </div>
    
            <div>
              <i class="fa fa-phone"></i> <span>Carlos</span>
              <p>+62 852-6155-7426</p>
            </div>
            <div>
              <i class="fa fa-envelope"></i> <span>Email</span>
              <p><a href="https://carloskhu19@gmail.com">carloskhu19@gmail.com</a></p>
            </div>
          </div>
          <div class="footer-right">
            <p class="footer-company-about">
              <span>About the company</span>
              We offer training and skill building courses across Technology, Design, Management, Science and Humanities.</p>
            <div class="footer-icons">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </footer>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src='{{ asset("template/plugins/jquery/jquery.min.js") }}'></script>
<!-- jQuery UI 1.11.4 -->
<script src='{{ asset("template/plugins/jquery-ui/jquery-ui.min.js") }}'></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src='{{ asset("template/plugins/bootstrap/js/bootstrap.bundle.min.js") }}'></script>
<!-- ChartJS -->
<script src='{{ asset("template/plugins/chart.js/Chart.min.js") }}'></script>
<!-- Sparkline -->
<script src='{{ asset("template/plugins/sparklines/sparkline.js") }}'></script>
<!-- JQVMap -->
<script src='{{ asset("template/plugins/jqvmap/jquery.vmap.min.js") }}'></script>
<script src='{{ asset("template/plugins/jqvmap/maps/jquery.vmap.usa.js") }}'></script>
<!-- jQuery Knob Chart -->
<script src='{{ asset("template/plugins/jquery-knob/jquery.knob.min.js") }}'></script>
<!-- daterangepicker -->
<script src='{{ asset("template/plugins/moment/moment.min.js") }}'></script>
<script src='{{ asset("template/plugins/daterangepicker/daterangepicker.js") }}'></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src='{{ asset("template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}'></script>
<!-- Summernote -->
<script src='{{ asset("template/plugins/summernote/summernote-bs4.min.js") }}'></script>
<!-- overlayScrollbars -->
<script src='{{ asset("template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}'></script>
<!-- AdminLTE App -->
<script src='{{ asset("template/dist/js/adminlte.js") }}'></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src='{{ asset("template/dist/js/pages/dashboard.js") }}'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html> --}}

<!DOCTYPE html>
<html>
  <head>
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Martel+Sans&display=swap" rel="stylesheet" />
  <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
  {{-- !-- Google Font: Source Sans Pro --> --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='{{ asset("template/plugins/fontawesome-free/css/all.min.css") }}'>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <title>Home
  </title>
</head>
<body>
  <div class="v1_2">
  <span class="v1_3">Home
  </span>
  <span class="v1_4">About
  </span>
  <span class="v1_5">Company
  </span>
  <span class="v1_6">Jobs
  </span>
  <span class="v1_7">Clients
  </span>
  <span class="v1_8">Blog
  </span>
  <span class="v1_9">News
  </span>
  {{-- <div class="v1_11">
  </div> --}}
  <div class ="v1_10">
    <a href="/login"><button type="button" class="btn btn-outline-success" style="margin-right: 10px;">Login</button></a>
  </div>
  <div class="v1_11">
    <a href="/register"><button type="button" class="btn btn-outline-danger">Register</button></a>
  </div>
  </div>

  {{-- <div class="v1_13">
  </div> --}}
  <span class="v1_14">RECRUITMEN
  </span>
  <span class="v1_15">Executive Search
  </span>
  <div class="v1_16">
  </div>
  <div class="v1_17">
  </div>
  <div class="v1_18">
  </div>
  {{-- <div class="name">
  </div> --}}
  {{-- <div class="name">
  </div> --}}
</div>
</body>
</html>