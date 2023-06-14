<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

$module="module";
?>

<div class="row">
				<div class="col-md-6">
					
					
<center> <hr />
                                <form role="form" method="POST">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="email" class="form-control" name="username"  placeholder="Email" required />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  required  name="password" placeholder="Password" />
                                        </div>
                                    <div class="form-group">
                                            
                                        </div>
                                     
                                     <button class="btn btn-primary" name="login">Login</button>
									 <button type="reset" class="btn btn-primary">Batal</button>
                                    <hr />
                                    
                                    </form>
                                 
  </center> 					
					
				</div>
				<div class="col-md-6">
                  <img src="images/hepatitis.png" alt="header image"  class="templatemo-header-img img-responsive cleaner">
				</div>
			</div>



                                 
                            

<?php
if(isset($_POST['login'])){

$email=$_POST['username'];
$password=$_POST['password'];



$query = mysqli_query($koneksi, "SELECT * FROM tbpengguna where email='$email' and password='$password'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){

   
echo"<script>alert('Email atau Password anda salah, silahkan ulangi kembali.');location.href='index.php?module=login';</script>";  
   }
   else{
	   
	   
	 $data = mysqli_fetch_array($query);
 	$id_pengguna = $data['id_pengguna'];
	$email = $data['email'];
	$nama = $data['nama'];

	
	$_SESSION['nama_masuk']=$nama;
	$_SESSION['level_masuk']="Pengguna";
	$_SESSION['email_masuk']=$email;
	$_SESSION['gambar_masuk']="avatar.jpg";
	$_SESSION['id_masuk']=$id_pengguna;
	
	echo "<script>location.href='admin/dashboard.php?module=home';</script>";    
	   
	   
	   
   }


	  
 
}
?>
