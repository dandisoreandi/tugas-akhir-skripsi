<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
              <div class="card-header">
                
				<a href="dashboard.php?module=pengetahuan&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama Penyakit</th>
						  <th>Nama Gejala</th>
						  <th>Nama Faktor Lain</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
   $query = mysqli_query($koneksi, "SELECT a.id_pengetahuan, b.nama_penyakit, c.nama_gejala, d.nama_faktorlain FROM tbpengetahuan a LEFT JOIN tbpenyakit b on a.id_penyakit=b.id_penyakit LEFT JOIN tbgejala c on a.id_gejala=c.id_gejala LEFT JOIN tbfaktorlain d on a.id_faktorlain=d.id_faktorlain order by a.id_pengetahuan asc") or die (mysqli_error());
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
  <td><?php echo $r['nama_penyakit'] ?></td>  
  <td><?php echo $r['nama_gejala'] ?></td>  
  <td><?php echo $r['nama_faktorlain'] ?></td>  
  <td align="center">
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengetahuan&stt=edit&id=".$r['id_pengetahuan'] ?>"><i class="fa fa-edit"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengetahuan&stt=hapus&id=".$r['id_pengetahuan'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
                <h3 class="card-title">Form Pengetahuan</h3>
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
                    <label for="exampleInputEmail1">Nama Gejala</label>
                    <select class="form-control" name="id_gejala">
<option value="">-- Pilih Gejala --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbgejala order by `id_gejala` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):   
$id_gejala=$r['id_gejala']; 


 ?>
  <option value="<?php echo $r['id_gejala'] ?>"><?php echo $r['nama_gejala'] ?></option>
 <?php

 endwhile;
 
}	
		?>
        
  </select>
                  </div>
                  
                  
                  			<div class="form-group">
                    <label for="exampleInputEmail1">Nama Faktor Lain</label>
                    <select class="form-control" name="id_faktorlain">
<option value="">-- Pilih Faktor Lain --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbfaktorlain order by `id_faktorlain` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):   
$id_faktorlain=$r['id_faktorlain']; 


 ?>
  <option value="<?php echo $r['id_faktorlain'] ?>"><?php echo $r['nama_faktorlain'] ?></option>
 <?php

 endwhile;
 
}	
		?>
        
  </select>
                  </div>
                  
				  
                
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
				<a href="dashboard.php?module=pengetahuan"><button class="btn btn-primary" type="button">Batal</button></a>
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
  $id_penyakit=$_POST['id_penyakit'];
  $id_gejala=$_POST['id_gejala'];
  $id_faktorlain=$_POST['id_faktorlain'];

  $querytambah = mysqli_query($koneksi, "INSERT INTO tbpengetahuan VALUES('', '$id_penyakit', '$id_gejala', '$id_faktorlain')") or die(mysqli_error());
  if($querytambah) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Input');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Input');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";

   }
  }
 ?>					
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbpengetahuan WHERE `id_pengetahuan` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
 }

}
else if($stt=="edit"){
$id_pengetahuan=$_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM tbpengetahuan where id_pengetahuan='$id_pengetahuan'") or die (mysqli_error());
    $d=mysqli_fetch_array($query);
    $id_pengetahuan=$d["id_pengetahuan"];
	$id_penyakit=$d["id_penyakit"];
	$id_gejala=$d["id_gejala"];
	$id_faktorlain=$d["id_faktorlain"];
	
?>

<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">

<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Pengetahuan</h3>
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
                    <label for="exampleInputEmail1">Nama Gejala</label>
                    <select class="form-control" name="id_gejala">
                        <?php
  echo"<option value='$id_gejala'>".GEJ($tbgejala,$id_gejala)."</option>";
?>
<option value="">-- Pilih Gejala --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbgejala order by `id_gejala` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):   
$id_gejala=$r['id_gejala']; 


 ?>
  <option value="<?php echo $r['id_gejala'] ?>"><?php echo $r['nama_gejala'] ?></option>
 <?php

 endwhile;
 
}	
		?>
        
  </select>
                  </div>
                  
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Faktor Lain</label>
                    <select class="form-control" name="id_faktorlain">
                        <?php
  echo"<option value='$id_faktorlain'>".FAK($tbfaktorlain,$id_faktorlain)."</option>";
?>
<option value="">-- Pilih Faktor Lain --</option>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM tbfaktorlain order by `id_faktorlain` asc") or die (mysqli_error());
if(mysqli_num_rows($query) == 0){ 
	  echo "";
   }
else {
	$no=1;
 while($r = mysqli_fetch_array($query)):   
$id_faktorlain=$r['id_faktorlain']; 


 ?>
  <option value="<?php echo $r['id_faktorlain'] ?>"><?php echo $r['nama_faktorlain'] ?></option>
 <?php

 endwhile;
 
}	
		?>
        
  </select>
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="Update" class="btn btn-primary">Update</button>
				<a href="dashboard.php?module=pengetahuan"><button class="btn btn-primary" type="button">Batal</button></a>
				<input type="hidden" name="gambar0" value="<?php echo"$gambar0";?>">
                <input type="hidden" name="id_pengetahuan" value="<?php echo"$id_pengetahuan";?>">
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
  $id_pengetahuan=$_POST['id_pengetahuan'];
  $id_penyakit=$_POST['id_penyakit'];
  $id_gejala=$_POST['id_gejala'];
  $id_faktorlain=$_POST['id_faktorlain'];

$queryupdate = mysqli_query($koneksi, "UPDATE tbpengetahuan SET 
                           id_penyakit='$id_penyakit',
						   id_gejala='$id_gejala',
						   id_faktorlain='$id_faktorlain'
						   WHERE id_pengetahuan = '$id_pengetahuan'");

  if($queryupdate) {
   // header('location: menu.php');   
   echo"<script>alert('Data Berhasil di Update');location.href='$_SERVER[PHP_SELF]?module=pengetahuan';</script>";
   
   
   } else{
   echo"<script>alert('Data Gagal di Update');location.href='$_SERVER[PHP_SELF]?module=pengetahuan&stt=edit&id=$id_pengetahuan';</script>";

   }
  }
 ?>	

<?php
}
?>

