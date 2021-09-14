<?php 
session_start();
include "../../assets/koneksi.php";
if ($_SESSION['login']!=true) {
  header("location:../../");
}else{
$iduser = $_SESSION['id_user'];
$level = $_SESSION['level'];




if ($level=='Penduduk') {
  $quser = mysqli_query($conn, "SELECT * from penduduk where id_penduduk='$iduser'")or die(mysqli_error());
  $duser = mysqli_fetch_array($quser);
  $namauser=$duser['nama'];
  $foto = $duser['foto'];
}
elseif ($level=='Mitra') {
  $quser = mysqli_query($conn, "SELECT * from mitra where id_mitra='$iduser'")or die(mysqli_error());
  $duser = mysqli_fetch_array($quser);
  $namauser=$duser['nama_toko'];
  $foto = $duser['foto'];
}
else{
  $quser = mysqli_query($conn, "SELECT * from user u  left join perangkat_nagari pn on u.id_pn=pn.id_pn where u.id_user='$iduser'")or die(mysqli_error());
  $duser = mysqli_fetch_array($quser);
  $namauser=$duser['nama'];
  $foto = $duser['foto'];
}




if ($foto=='') {
  $gambar = "../../assets/user.jpg";
  # code...
}else{
  $gambar = "form/dashboard/gambar/".$foto;
}


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">

    <!-- fullCalendar -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  
<script src="../../assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="../../assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/adminlte/dist/css/AdminLTE.min.css">

 <script type="text/javascript" src="../../assets/adminlte/js/jquery.js"></script>

 


 
 
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../assets/adminlte/dist/css/skins/_all-skins.min.css">






  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SI G</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI Galugua</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo  $gambar ?>" class="user-image" alt="<?php echo  $gambar ?>">
              <span class="hidden-xs"><?php echo $namauser; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- <?php echo   $gambar ?> -->
              <li class="user-header">
                <img src="<?php echo  $gambar ?>" class="img" alt="<?php echo   $gambar ?>">

                <p>
                  <?php echo $namauser; ?>  <br> <?php echo $level; ?> 
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?a=edit-akun" class="btn btn-default btn-flat">Edit Akun</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
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
      <div class="user-panel" style="height:60px">
        <div class="pull-left image">
          <img src="<?php echo  $gambar ?>" class="img" alt="<?php echo   $gambar ?>">
        </div>
        <div class="pull-left info">
          <p><?php echo $namauser; ?></p>
          <a href="#"><?php echo $level ?> </a>
        </div>
      </div>
      <!-- search form -->
     

      <ul class="sidebar-menu" data-widget="tree">
       
    
       <?php 
       if ($level=='Admin') { ?>
       <li class="header">Master Data</li>
        <li><a href="?a=struktur"><i class="fa fa-book"></i> <span  style="color:aqua">Struktur Organisasi (upload)</span></a></li>
        <li><a href="?a=profile"><i class="fa fa-book"></i> <span style="color:aqua">Profile Nagari</span></a></li>
        <li><a href="?a=berita"><i class="fa fa-book"></i> <span style="color:aqua">Data Berita</span></a></li>
        <li><a href="?a=penduduk"><i class="fa fa-book"></i> <span style="color:aqua">Data Penduduk</span></a></li>
        <li><a href="?a=perangkat_nagari"><i class="fa fa-book"></i> <span style="color:aqua">Data Perangkat Nagari</span></a></li>
            <li><a href="?a=jenis_bantuan"><i class="fa fa-book"></i> <span style="color:aqua">Data Jenis Bantuan</span></a></li>
            <li><a href="?a=mitra"><i class="fa fa-book"></i> <span style="color:aqua">Data Mitra</span></a></li>
            <li><a href="?a=user"><i class="fa fa-book"></i> <span style="color:aqua">Data User</span></a></li>
         <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>SPK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=kriteria"><i class="fa fa-book"></i> <span style="color:aqua">Kriteria</span></a></li>
            <li><a href="?a=spk"><i class="fa fa-book"></i> <span>Perhitungan </span></a></li>
          
          </ul>
        </li> -->
       <!-- <li class="header">SPK</li> -->
     
        
        <?php }
        elseif ($level=='Penduduk') {  ?> 
            <li><a href="?a=edit_penduduk&id=<?php echo $iduser ?>"><i class="fa fa-circle-o"></i><span style="color:aqua">Laporan Data Penduduk</span></a></li>
            <li><a href="?a=laporan_penerima_bantuan"><i class="fa fa-circle-o"></i><span style="color:aqua">Laporan Data Penerima Bantuan</span></a></li>
          
      
        <?php }
        elseif ($level=='Mitra') {  ?> 
        <li><a href="?a=edit_mitra&id=<?php echo $iduser ?>"><i class="fa fa-book"></i> <span>Edit Data Mitra</span></a></li>
        <li><a href="?a=produk"><i class="fa fa-book"></i> <span  style="color:aqua">Data Produk Nagari</span></a></li>
        <li><a href="?a=penjualan"><i class="fa fa-book"></i> <span>Penjualan Produk Nagari</span></a></li>
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i></a></li> -->
      
        <?php }
        else{  ?> 
            <li class="header">Menu Pimpinan</li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?a=laporan_penduduk"><i class="fa fa-circle-o"></i><span style="color:aqua">Laporan Data Penduduk</span></a></li>
            <li><a href="?a=laporan_penerima_bantuan"><i class="fa fa-circle-o"></i> Laporan Data Penerima Bantuan</a></li>
            <li><a href="?a=laporan_perangkat_nagari"><i class="fa fa-circle-o"></i><span>Laporan Data Perangkat Nagari</span></a></li>
          </ul>
        </li>
            <!-- <li><a href="#"><i class="fa fa-circle-o"></i>Zonk</a></li> -->
      
        <?php } ?>
       
      <!--  <li class="header">Admin Gudang</li>
        <li><a href="?a=bahan_baku"><i class="fa fa-book"></i> <span>Data Bahan Baku</span></a></li>
        
        <li><a href="?a=management_bahan_baku"><i class="fa fa-book"></i> <span>Management Bahan Baku (2/3)</span></a></li> -->
        
        


      






      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title" id="judul_konten">Wellcome To Administrator Page</h3>
              <h3 class="box-title" id="btn_tambah" style="float:right;"></h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body" >
             <?php 
             include "konten.php" ;
             ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Debi Kifah Anggela</b> - 171100045
    </div>
    <strong>Sistem Informasi Nagari Galugua</strong>
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/adminlte/dist/js/demo.js"></script>
<!-- page script -->






<!-- fullCalendar -->
<script src="../../assets/adminlte/bower_components/moment/moment.js"></script>
<script src="../../assets/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>






<script>
  $(function () {
    $('#example1').DataTable();
    $('#example3').DataTable()
    $('#tabelscrol').DataTable( {
    "scrollX": true
    } );
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>

<?php } ?>