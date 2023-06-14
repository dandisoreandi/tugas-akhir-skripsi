<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"application/config/koneksi.php";
#$module="module";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrator Sistem Pakar Penyakit Hepatitis</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>ADMINISTRATOR</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" value="admin" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" value="admin" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!--

		  <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
		  
		  /.col -->
          <div class="col-4">
            <button type="submit" name="Simpan" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- 
	  <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
	  
	   <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
	  
	  /.social-auth-links -->

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php 
if(isset($_POST['Simpan'])){
  
  $username=$_POST['username'];
  $password=$_POST['password'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbuser where username='$username' and password='$password'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   
echo"<script>alert('Anda Tidak Terdaftar di Sistem Kami.');location.href='index.php';</script>";  
	   }
   
   else {
	   
	  
	$no=1;
 $data = mysqli_fetch_array($query);
 	$id_user = $data['id_user'];
	$username = $data['username'];
	$nama = $data['nama'];
	$level = $data['level'];
	
	$_SESSION['nama_masuk']=$nama;
	$_SESSION['level_masuk']=$level;
	$_SESSION['username_masuk']=$username;
	$_SESSION['alamat_masuk']=$alamat;
	$_SESSION['id_masuk']=$id_user;
	$id_masuk=$_SESSION['id_masuk'];
	

	
		echo "<script>alert('Anda Berhasil Login');location.href='dashboard.php?module=home';</script>";
	

	#alert('Selamat Datang $nama Berhasil Login Sebagai $akses ');
   
 } 
  }
 ?>	
