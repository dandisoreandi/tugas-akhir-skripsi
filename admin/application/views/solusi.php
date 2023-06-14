<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
              <div class="card-header">
                
				<a href="dashboard.php?module=solusi&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama Penyakit</th>
						  <th>Solusi</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbsolusi,tbpenyakit where tbsolusi.id_penyakit=tbpenyakit.id_penyakit order by tbsolusi.id_solusi asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='4' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['nama_penyakit'] ?></td>  
  <td><?php echo $r['nama_solusi'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=solusi&stt=edit&id=".$r['id_solusi'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=solusi&stt=hapus&id=".$r['id_solusi'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
                <h3 class="card-title">Form Tambah solusi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				<div class="form-group">
                    <label for="exampleInputEmail1">Nama Penyakit *</label>
                    <select class="form-control" name="id_penyakit" required>
<option value="">-- Pilih Penyakit --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit order by `id_penyakit` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_penyakit'] ?>"><?php echo $r['nama_penyakit'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Solusi *</label>
                   
					<textarea name="nama_solusi" id="exampleInputEmail1" rows="10" cols="70" required="required" class="form-control "></textarea>
                  </div>
				  
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
				<a href="dashboard.php?module=solusi"><button class="btn btn-primary" type="button">Batal</button></a>
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
  $id_solusi=$_POST['id_solusi'];
  $id_penyakit=$_POST['id_penyakit'];
  $nama_solusi=$_POST['nama_solusi'];
  $querytambah = mysqli_query($koneksi, "INSERT INTO tbsolusi VALUES('', '$nama_solusi', '$id_penyakit')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=solusi';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=solusi';</script>";

   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbsolusi WHERE `id_solusi` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=solusi';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=solusi';</script>";
 }

}
else if($stt=="edit"){
$id_solusi=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbsolusi where id_solusi='$id_solusi'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_solusi=$d["id_solusi"];
	$id_penyakit=$d["id_penyakit"];
	$nama_solusi=$d["nama_solusi"];
	
?>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Solusi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="form1" method="post" action="" enctype="multipart/form-data">
                <div class="card-body">
				 <div class="form-group">
                    <label for="exampleInputEmail1">Nama Penyakit *</label>
                    <select class="form-control" name="id_penyakit" required>
					<?php
  echo"<option value='$id_penyakit'>".PEN($tbpenyakit,$id_penyakit)."</option>";
?>
<option value="">-- Pilih Penyakit --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit order by `id_penyakit` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):     
 ?>
  <option value="<?php echo $r['id_penyakit'] ?>"><?php echo $r['nama_penyakit'] ?></option>
 <?php
 endwhile;
 
}	
		?>
        
  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Solusi *</label>
                    
					<textarea name="nama_solusi" id="exampleInputEmail1" rows="10" cols="70" required="required" class="form-control "><?php echo $nama_solusi;?></textarea>
                  </div>
				  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
				<a href="dashboard.php?module=solusi"><button class="btn btn-primary" type="button">Batal</button></a>
				<input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                <input type="hidden" name="id_solusi" value="<?php echo"$id_solusi";?>">
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
  $id_solusi=$_POST['id_solusi'];
  $id_penyakit=$_POST['id_penyakit'];
  $nama_solusi=$_POST['nama_solusi'];

$queryupdate = mysqli_query($koneksi, "UPDATE tbsolusi SET 
                           nama_solusi='$nama_solusi',
						   id_penyakit='$id_penyakit'
						   WHERE id_solusi = '$id_solusi'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=solusi';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=solusi&stt=edit&id=$id_solusi';</script>";

   }
  }
 ?>	

<?php
}
?>
