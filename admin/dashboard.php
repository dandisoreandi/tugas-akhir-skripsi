<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"application/config/koneksi.php";
$module="module";
$module=$_GET["module"];
$id_masuk=$_SESSION['id_masuk'];
if($id_masuk==""){echo "<script>location.href='index.php';</script>";}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Sistem Pakar Penyakit Hepatitis</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  
   <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
  <script
src="https://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
      
      
      <li class="nav-item">
        <a href="dashboard.php?module=logout">
          Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<?php
$level=$_SESSION['level_masuk'];
$id=$_SESSION["id_masuk"];
if($level=="Admin"){
$query = mysqli_query($koneksi, "SELECT * FROM tbuser where id_user='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $nama_user=$d["nama"];
    $gambar_user=$d["gambar"];
	$t="Administrator";

}
else if($level=="Pengguna"){
$query = mysqli_query($koneksi, "SELECT * FROM tbpengguna where id_pengguna='$id'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $nama_user=$d["nama"];
      $gambar_user="user.png";
	$t="Pengguna";

}

?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php?module=home" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo"$t";?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo"dist/img/$gambar_user";?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="dashboard.php?module=home" class="d-block"><?php echo"$nama_user";?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!--
	  <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
	  -->

      <!-- Sidebar Menu -->
                  <?php include"application/views/menu.php"; ?>
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
<?php
$level_masuk=$_SESSION['level_masuk'];
$module=$_GET["module"];

if($module=="home"){
	
	
	if($level_masuk=="Admin") {	$judul_masuk="Selamat Datang Admin";}
else if($level_masuk=="Pengguna") {	$judul_masuk="Selamat Datang Pengguna";}
	}
	else if($module=="user"){$judul_masuk="Halaman Manage Admin";}
	else if($module=="profil"){$judul_masuk="Halaman Profil";}
	else if($module=="penyakit"){$judul_masuk="Halaman Penyakit";}
	else if($module=="gejala"){$judul_masuk="Halaman Gejala";}
	else if($module=="faktorlain"){$judul_masuk="Halaman Faktor Lain";}
	else if($module=="pengetahuan"){$judul_masuk="Halaman Pengetahuan";}
	// else if($module=="solusi"){$judul_masuk="Halaman solusi";}
	else if($module=="laporan"){$judul_masuk="Halaman Laporan";}
    
else if($module=="diagnosa"){$judul_masuk="Halaman Diagnosa";}
else if($module=="profil_pengguna"){$judul_masuk="Halaman Profil";}
else if($module=="konsultasi"){$judul_masuk="Halaman Diagnosa";}
else if($module=="pengguna"){$judul_masuk="Halaman Data Pengguna";}
else if($module=="hasil"){$judul_masuk="Halaman Hasil Diagnosa";}
else if($module=="jenis"){$judul_masuk="Halaman Jenis Penyakit";}



	else {$judul_masuk="Selamat Datang Admin";}
			  
?> 		  
            <h1 class="m-0 text-dark"><?php echo"$judul_masuk"; ?>  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php


	//-----------------------------------------
	if($module=="utama"){include"application/views/home.php";}
	else if($module=="profil"){include"application/views/profil.php";}
    else if($module=="user"){include"application/views/user.php";}
	else if($module=="penyakit"){include"application/views/penyakit.php";}
	else if($module=="gejala"){include"application/views/gejala.php";}
	else if($module=="faktorlain"){include"application/views/faktorlain.php";}
	else if($module=="pengetahuan"){include"application/views/pengetahuan.php";}
	// else if($module=="solusi"){include"application/views/solusi.php";}
	else if($module=="laporan"){include"application/views/laporan.php";}
	
	else if($module=="diagnosa_admin"){include"application/views/diagnosa_admin.php";}
	else if($module=="pengguna"){include"application/views/pengguna.php";}
	else if($module=="konsultasi"){include"application/views/konsultasi.php";}
    else if($module=="profil_pengguna"){include"application/views/profil_pengguna.php";}
	else if($module=="hasil"){include"application/views/hasil_pengguna.php";}
	else if($module=="jenis"){include"application/views/jenis.php";}

	
	


	
	
	else if($module=="logout"){
	$terakhir=date('d-m-Y h:i:s');
	$id_masuk=$_SESSION['id_masuk'];
	#$queryupdate = mysqli_query($koneksi, "UPDATE tbuser SET terakhir_login='$terakhir' WHERE id_user = '$id_masuk'");
	
	session_destroy();
	echo"<script>location.href='../index.php';</script>";  
	#alert('Akses anda Telah Berakhir.');

	}
	
	
	
	
	
	else {
		if($level_masuk=="Admin")
		{		include"application/views/home.php";}
		else{		include"application/views/home_pengguna.php";}
		
		
		
		}
	
	
	?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer" align="center">
    <strong>Copyright &copy; 2022 Sistem Pakar Penyakit Hepatitis
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="plugins/codemirror/codemirror.js"></script>
<script src="plugins/codemirror/mode/css/css.js"></script>
<script src="plugins/codemirror/mode/xml/xml.js"></script>
<script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<script>
	window.setTimeout("waktu()", 1000);
 
	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu.getHours();
		document.getElementById("menit").innerHTML = waktu.getMinutes();
		document.getElementById("detik").innerHTML = waktu.getSeconds();
	}
</script>
<style>
	h1,h2,p,a{
		font-family: sans-serif;
		font-weight: normal;
	}
 
	.jam-digital-malasngoding {
		overflow: hidden;
		width: 330px;
		margin: 20px auto;
		
	}
	.kotak{
		float: left;
		width: 106px;
		height: 100px;
		background-color: #189fff;
	}
	.jam-digital-malasngoding p {
		color: #fff;
		font-size: 36px;
		text-align: center;
		margin-top: 30px;
	}
 
 
</style>
</body>
</html>
<?php
}
?>