<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"admin/application/config/koneksi.php";
$module="module";
$module=$_GET["module"];
$id_masuk=$_SESSION['id_masuk'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>SISTEM PAKAR PENYAKIT HEPATITIS</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- Custom styles for this template -->
	<link href="css/justified-nav.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
<!-- 

Fantasy Template

http://www.templatemo.com/tm-393-fantasy

-->
	<!-- HTML 5 shim for IE backwards compatibility -->
		<!-- [if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
		</script>
		<![endif]-->
</head>
<body>
	<div id="main_container">
		<div class="container" id="home">
			<div class="header">
				
      			<!--
				<form  action="#" method="get" class="navbar-form pull-right" role="search">
      				<div class="form-group">
      					<input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword">
      				</div>
      				<button type="submit" class="btn btn-default" name="Search">Go</button>
      			</form>
				-->
			</div>
			<!--  -->
			<img src="images/bg_header.jpg" alt="header image" class="templatemo-header-img img-responsive cleaner">
			<div class="navbar templatemo-nav" id="navbar">
				<div class="navbar-header">		          	
		          	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
		        </div>
      			<div class="navbar-collapse collapse">
			        <ul class="nav nav-justified">
			          <li><a href="index.php?module=home">Home</a></li>
	                  <li><a href="index.php?module=informasi">Informasi</a></li>
			          <li><a href="index.php?module=daftar">Daftar</a></li>
			          <li><a href="index.php?module=login">Login</a></li>
			        </ul>
		      	</div> <!--  class="active" nav -->
	      	</div>
			<div class="row" id="thumbnails_container">            
				<div class="col-md-12">
				
				<?php
				$module=$_GET["module"];

if($module=="home"){ $judul_masuk="";}
	else if($module=="informasi"){$judul_masuk="Hepatitis";}
	else if($module=="daftar"){$judul_masuk="Daftar Pengguna";}
	else if($module=="login"){$judul_masuk="Login Sistem";}
	else{
		
		$judul_masuk="";
	}
				?>
				
				
					<h2><?php  echo $judul_masuk; ?></h2>
					
					<?php
			


	
	if($module=="home"){include"data/home.php";}
	else if($module=="informasi"){include"data/informasi.php";}
	
	else if($module=="daftar"){include"data/daftar.php";}
	else if($module=="login"){include"data/login.php";}
	else {
		include"data/home.php";
		
	}
					
					?>
				</div>
                
				
                
			</div> <!-- thumbnail area -->  
		</div>
		<footer class="container">
			<div class="credit row">
				<div class="col-md-6 col-md-offset-3">
					<div id="templatemo_footer">
						Copyright © 2022 Sistem Pakar Penyakit Hepatitis
					</div>
				</div>
				<div class="col-md-3">
					
				</div>				
			</div>
		</footer>
	</div>
    <!-- templatemo 393 fantasy -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>
</body>
</html>