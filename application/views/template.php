
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pendataan RT</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets//bower_components/bootstrap/dist/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?=base_url()?>assets//bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets//bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets//bower_components/Ionicons/css/ionicons.min.css">  
  <link rel="stylesheet" href="<?=base_url()?>assets//dist/css/AdminLTE.min.css"> 
  <link rel="stylesheet" href="<?=base_url()?>assets//dist/css/skins/_all-skins.min.css">


</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?=base_url('dashboard')?>" class="logo">
        <span class="logo-mini"><b>P</b>P</span>
        <span class="logo-lg"><b>Pendataan</b>Penduduk</span>
      </a>    
      <nav class="navbar navbar-static-top">      
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown tasks-menu">
              <ul class="dropdown-menu">
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url()?>assets//dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=ucfirst($this->fungsi->user_login()->username)?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>assets//dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=ucfirst($this->fungsi->user_login()->name)?>
                  <small><?=ucfirst($this->fungsi->user_login()->address)?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?=site_url('auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets//dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=ucfirst($this->fungsi->user_login()->username)?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li <?=$this->uri->segment(1) == 'profil' ? 'class="active"' : '' ?>>
          <a href="<?=site_url('profil')?>"><i class="fa fa-home"></i> <span>Profil</span></a>
        </li>
        <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2 ) { ?>
        <li class="treeview <?=$this->uri->segment(1) == 'warga' ||
        $this->uri->segment(1) == 'kartu_keluarga' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-book"></i><span>Data</span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'warga' ? 'class="active"' : '' ?>><a href="<?=site_url('warga')?>"><i class="fa fa-circle-o"></i> Warga</a></li>
            <li <?=$this->uri->segment(1) == 'kartu_keluarga' ? 'class="active"' : '' ?>><a href="<?=site_url('kartu_keluarga')?>"><i class="fa fa-circle-o"></i> Kartu Keluarga</a></li>
          </ul>
        </li>
        <?php } ?>
        <?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2 ) { ?>
        <li class="treeview <?=$this->uri->segment(1) == 'daftar_kegiatan' ||
        $this->uri->segment(1) == 'kepanitiaan' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-folder"></i><span>Kegiatan</span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'daftar_kegiatan' ? 'class="active"' : '' ?>><a href="<?=site_url('daftar_kegiatan')?>"><i class="fa fa-circle-o"></i> Daftar Kegiatan</a></li>
            <li <?=$this->uri->segment(1) == 'kepanitiaan' ? 'class="active"' : '' ?>><a href="<?=site_url('kepanitiaan')?>"><i class="fa fa-circle-o"></i> Panitia Kegiatan</a></li>
          </ul>
        </li>
        <?php } ?>
        <li class="treeview <?=$this->uri->segment(1) == 'kas_masuk' ||
        $this->uri->segment(1) == 'kas_keluar' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-dollar"></i><span>Keuangan</span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'kas_masuk' ? 'class="active"' : '' ?>><a href="<?=site_url('kas_masuk')?>"><i class="fa fa-circle-o"></i> Kas Masuk</a></li>
            <li <?=$this->uri->segment(1) == 'kas_keluar' ? 'class="active"' : '' ?>><a href="<?=site_url('kas_keluar')?>"><i class="fa fa-circle-o"></i> Kas Keluar</a></li>
          </ul>
        </li>
        <li class="treeview <?=$this->uri->segment(1) == 'lap_kas_masuk' ||
        $this->uri->segment(1) == 'lap_kas_keluar' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i><span>Laporan</span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'lap_kas_masuk' ? 'class="active"' : '' ?>><a href="<?=site_url('lap_kas_masuk')?>"><i class="fa fa-circle-o"></i> Kas Masuk</a></li>
            <li <?=$this->uri->segment(1) == 'lap_kas_keluar' ? 'class="active"' : '' ?>><a href="<?=site_url('lap_kas_keluar')?>"><i class="fa fa-circle-o"></i> Kas Keluar</a></li>
          </ul>
        </li>
        <?php if($this->fungsi->user_login()->level == 1) { ?>
         <li class="header">SETTINGS</li>
         <li><a href="<?=site_url('user')?>"><i class="fa fa-user"></i> <span>Users</span></li>
         <?php } ?>
       </ul>
     </section>
     <!-- /.sidebar -->
   </aside>

   <!-- =============================================== -->

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <?php echo $contents ?>

    
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Control Sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?=base_url()?>assets//bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets//bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets//bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets//bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets//dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets//dist/js/demo.js"></script>

<script src="<?=base_url()?>assets//bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets//bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function(){
    $('#table1').DataTable()
  })
  
</script>
</body>
</html>