<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Simaum | Control Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/Profile.css">
  <!-- Profile style -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/skins/_all-skins.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">



<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets'); ?>/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<!-- Morris.js charts -->

<!-- Sparkline -->
<script src="<?= base_url('assets'); ?>/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url('assets'); ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets'); ?>/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets'); ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets'); ?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets'); ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <?php $get_image = base_url('assets/dist/img/logo_stikom-1.png'); 
       $imageData = base64_encode(file_get_contents($get_image)); 
     echo '<span class="logo-mini"><img src="data:image/jpeg;base64,'.$imageData.'"></span>'; ?>
      <!-- logo for regular state and mobile devices -->
      <?php $get_image = base_url('assets/dist/img/logo_stikom-1.png'); 
       $imageData = base64_encode(file_get_contents($get_image));
      echo '<span class="logo-lg"><img src="data:image/jpeg;base64,'.$imageData.'"></span>'; ?>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('assets/profile/'.$this->session->userdata('path_img')); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('admin_nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('assets/profile/'.$this->session->userdata('path_img')); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('admin_nama'); ?>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php cetak (base_url('update-profile')); ?> " class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('index.php/login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('assets/profile/'.$this->session->userdata('path_img')); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('admin_nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php if ($this->session->userdata('level_admin') == 'S') { echo 'Super User'; } else { echo 'Administrator'; }  ?></a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?= base_url('home'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

          <li>
          <a href="<?= base_url('lihat-penduduk'); ?>">
          <i class="fa fa-user"></i><span> Penduduk </span></a>
          </li>


            <li>
            <a href="<?= base_url('lihat-agenda'); ?>">
            <i class="fa fa-compass"></i><span> Agenda</span>
            </a>
            </li>

            <li>
            <a href="<?= base_url('lihat-berita'); ?>">
            <i class="fa fa-compass"></i><span> Berita</span>
            </a>
            </li>

            <li>
            <a href="<?= base_url('lihat-laporan'); ?>">
            <i class="fa fa-compass"></i><span> Laporan</span>
            </a>
            </li>


            <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span> Data Penduduk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?= base_url('lihat-kematian'); ?>"><i class="fa fa-barcode"></i><span> Kematian</span></a></li>
          <li><a href="<?= base_url('lihat-kesehatan'); ?>"><i class="fa fa-barcode"></i><span> Kesehatan</span></a></li>
          <li><a href="<?= base_url('lihat-pendidikan'); ?>"><i class="fa fa-barcode"></i><span> Pendidikan</span></a></li>
          <li><a href="<?= base_url('lihat-umkm'); ?>"><i class="fa fa-barcode"></i><span> UMKM</span></a></li>
          <li><a href="<?= base_url('lihat-putus-sekolah'); ?>"><i class="fa fa-barcode"></i><span> Anak Putus Sekolah</span></a></li>

          </ul>
        </li>
        
<?php if ($this->session->userdata('level_admin') == 'S'){ ?>
      <li><a href="<?= base_url('data-pengguna'); ?>"><i class="fa fa-user"></i><span> Pengguna</span></a></li>';
 <?php } else {
                              echo ''; ?>
                            <?php } ?> 
      

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
   <?php echo $contents ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?= base_url(''); ?>">Mulia University</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script>  
 $(document).ready(function(){  
      $('#table_penduduk').DataTable();  
 }); 

 $(document).ready(function(){  
      $('#table_agenda').DataTable();  
 }); 

 
    </script>


</body>
</html>

