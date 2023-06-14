<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
              <div class="card-header">
                
				<a href="dashboard.php?module=faktorlain&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama Faktor Lain</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbfaktorlain order by id_faktorlain asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='3' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama_faktorlain'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=faktorlain&stt=edit&id=".$r['id_faktorlain'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=faktorlain&stt=hapus&id=".$r['id_faktorlain'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
                <h3 class="card-title">Form Tambah gejala</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Faktor Lain *</label>
                    <input type="text" name="nama_faktorlain" class="form-control" id="exampleInputEmail1" required>
                  </div>
				  
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
				<a href="dashboard.php?module=faktorlain"><button class="btn btn-primary" type="button">Batal</button></a>
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
  $id_faktorlain=$_POST['id_faktorlain'];
  $nama_faktorlain=$_POST['nama_faktorlain'];
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbfaktorlain VALUES('', '$nama_faktorlain')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');    
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=faktorlain';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=faktorlain';</script>";

   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbfaktorlain WHERE `id_faktorlain` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=faktorlain';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=faktorlain';</script>";
 }

}
else if($stt=="edit"){
$id_gejala=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbfaktorlain where id_faktorlain='$id_gejala'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_faktorlain=$d["id_faktorlain"];
	$nama_faktorlain=$d["nama_faktorlain"];
	
?>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Faktor Lain</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Faktor Lain *</label>
                    <input type="text" name="nama_faktorlain" class="form-control" id="exampleInputEmail1" value="<?php echo $nama_faktorlain;?>">
                  </div>
				  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
				<a href="dashboard.php?module=faktorlain"><button class="btn btn-primary" type="button">Batal</button></a>
				<input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                <input type="hidden" name="id_faktorlain" value="<?php echo"$id_gejala";?>">
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
  $id_faktorlain=$_POST['id_faktorlain'];
  $nama_faktorlain=$_POST['nama_faktorlain'];

$queryupdate = mysqli_query($koneksi, "UPDATE tbfaktorlain SET 
                           nama_faktorlain='$nama_faktorlain'
						   WHERE id_faktorlain = '$id_faktorlain'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=faktorlain';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=faktorlain&stt=edit&id=$id_faktorlain';</script>";

   }
  }
 ?>	

<?php
}
?>
