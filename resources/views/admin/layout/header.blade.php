<body class="hold-transition sidebar-mini layout-fixed pace-primary">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link text-success" href="{{ asset('admin/akun') }}">
          <i class="fa fa-lock"></i> <?php echo Session()->get('nama'); ?> (<?php echo Session()->get('akses_level'); ?>)
        </a>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link text-danger" href="{{ asset('login/logout') }}">
          <i class="fas fa-sign-out-alt"></i> KELUAR
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->