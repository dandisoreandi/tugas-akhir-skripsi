<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
              <div class="card-header">
                
				<a href="dashboard.php?module=user&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama</th>
						  <th>Username</th>
						  <th style="text-align: center;">Foto</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbuser order by id_user asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='5' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama'] ?></td>  
  <td><?php echo $r['username'] ?></td>  
  <td align="center"><img src="<?php echo"dist/img/".$r['gambar'];?>" width="40" height="35"/></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=user&stt=edit&id=".$r['id_user'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=user&stt=hapus&id=".$r['id_user'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
  </td>
 </tr>
<?php
 $no++;
  endwhile;
  }
 ?>
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


 
<div class="clearfix"></div>			  
<?php
}
else if($stt=="tambah"){
  ?>		
	<div class="clearfix"></div>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama *</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Username *</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password *</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar">
                        
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
				<a href="dashboard.php?module=user"><button class="btn btn-primary" type="button">Batal</button></a>
                </div>
              </form>
            </div>
			
			</div>
									
              </div>
              <!-- /.card-body -->
            </div>	
	
	
	

	<div class="clearfix"></div>				
<?php 
if(isset($_POST['Simpan'])){
  $id_user=$_POST['id_user'];
  $nama=$_POST['nama'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $gambar=$_POST['gambar'];

  
  
  	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"dist/img/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar="noimages.jpg";}
    if(strlen($gambar)<1){$gambar="noimages.jpg";}
  
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbuser VALUES('', '$nama', '$username', '$password', '$gambar', 'Admin')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=user';</script>";

   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbuser WHERE `id_user` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
 }

}
else if($stt=="edit"){
$id_user=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbuser where id_user='$id_user'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_user=$d["id_user"];
	$nama=$d["nama"];
    $username=$d["username"];
	$gambar=$d["gambar"];
	$gambar0=$d["gambar"];
	
?>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama *</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="<?php echo $nama;?>">
                  </div>
				  <div class="form-group">
                    <label for="exampleInputEmail1">Username *</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" value="<?php echo $username;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password *</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $password;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Gambar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar">
                        
						<br><br>
						<a href="<?php echo"dist/img/$gambar";?>" title="Klik Untuk Perbesar Gambar" target="_blank"><?php echo"<img src='dist/img/$gambar' height='100' width='100'>";?></a>
						
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
				<a href="dashboard.php?module=user"><button class="btn btn-primary" type="button">Batal</button></a>
				<input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                <input type="hidden" name="id_user" value="<?php echo"$id_user";?>">
                </div>
              </form>
            </div>
			
			</div>
									
              </div>
              <!-- /.card-body -->
            </div>	


	<div class="clearfix"></div>				
<?php 
if(isset($_POST['Update'])){
  $id_user=$_POST['id_user'];
  $nama=$_POST['nama'];
  $username=$_POST['username'];
  $gambar=$_POST['gambar'];
  $gambar0=$_POST['gambar0'];
  
  
    	if ($_FILES["gambar"] != "") {
        @copy($_FILES["gambar"]["tmp_name"],"dist/img/".$_FILES["gambar"]["name"]);
        $gambar=$_FILES["gambar"]["name"];
        }
    else
    {$gambar=$gambar0;}
    if(strlen($gambar)<1){$gambar=$gambar0;}

$queryupdate = mysqli_query($koneksi, "UPDATE tbuser SET 
                           nama='$nama',
						   username='$username',
						   gambar='$gambar'
						   WHERE id_user = '$id_user'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=user';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=user&stt=edit&id=$id_user';</script>";

   }
  }
 ?>	

<?php
}
?>
