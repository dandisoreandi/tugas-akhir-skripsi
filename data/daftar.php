<p>
Buat akun untuk melakukan diagnosa Penyakit Hepatitis.<br>
<?php


  $q = mysqli_query($koneksi, "SELECT * FROM tbpengguna order by `id_pengguna` desc") or die (mysqli_error());
  $bl=date("m");
  
  
  $jum=mysqli_num_rows($q);
  $kd="P".date("y").$bl;
       if(mysqli_num_rows($q) == 0){
            $id_pengguna="$kd"."001";
            }
        else{
			$d=mysqli_fetch_array($q);
            $id_pengguna=$d["id_pengguna"];
            if(substr($id_pengguna,3,2)==$bl){
                $urut=substr($id_pengguna,5,4)+1;
                    if($urut<10){$id_pengguna="$kd"."00".$urut;}
                    else if($urut<100){$id_pengguna="$kd"."0".$urut;}
                    else{$id_pengguna="$kd".$urut;}
                }
            else{$id_pengguna="$kd"."001";}
			}
?>


<div class="row">
				<div class="col-md-6">
					<form role="form" name="form1" method="post" action="" enctype="multipart/form-data">
                                        <hr /> 
                                        
	                                   
									  
										
									   <div class="form-group">
                                            <label>Nama </label>
                                            <input class="form-control"  type="text" name="nama" required />
                                        </div>
										
										<div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"  type="email" name="email" />
                                        </div>

									   <div class="form-group">
                                            <label>Password</label>
											<input class="form-control"  type="password" name="password" />
                                        </div>
									   
									   
                                        
										
                                        <button type="submit" class="btn btn-primary" name="Simpan">Daftar</button>
										 <input type="hidden" name="id_pengguna" value="<?php echo"$id_pengguna";?>">
										<button type="reset" class="btn btn-primary">Batal</button>
                                         <hr />
                                    </form>
					
				</div>
				<div class="col-md-6">
                  <img src="images/hepatitis.png" alt="header image"  class="templatemo-header-img img-responsive cleaner">
				</div>
			</div>

<?php 
if(isset($_POST['Simpan'])){
  $id_pengguna=$_POST['id_pengguna'];
  $nama=$_POST['nama'];
  $email=$_POST['email'];
  $password=$_POST['password'];
 
  $q = mysqli_query($koneksi, "SELECT * FROM tbpengguna where email='$email'") or die (mysqli_error());
       if(mysqli_num_rows($q) == 0){

$querytambah = mysqli_query($koneksi, "INSERT INTO tbpengguna VALUES('', '$nama', '$email', '$password')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Akun anda berhasil dibuat.');location.href='$_SERVER[PHP_SELF]?module=login';</script>";
   
   
   } else{
   echo"<script>alert('Akun gagal dibuat');location.href='$_SERVER[PHP_SELF]?module=daftar';</script>";
   }

	   }
        else{
		 echo"<script>alert('Akun Pengguna Sudah Ada.');location.href='$_SERVER[PHP_SELF]?module=daftar';</script>";	
		}
  } 

 ?>
</p>
