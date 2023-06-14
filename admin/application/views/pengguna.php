<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
            
              <!-- /.card-header -->
              <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                        <tr>
                          <th>No</th>
						  <th>Nama Pengguna</th>
						  <th>Email</th>
						  <th>Password</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbpengguna order by id_pengguna asc") or die (mysqli_error());
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
  <td><?php echo $r['email'] ?></td>  
  <td><?php echo $r['password'] ?></td>  
  
  <td align="center">
   
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=pengguna&stt=hapus&id=".$r['id_pengguna'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
				
<?php
}
else if($stt=="hapus"){

$id = $_GET['id'];
  $queryhapus = mysqli_query($koneksi, "DELETE FROM tbpengguna WHERE `id_pengguna` ='$id'");

  if($queryhapus){
 # header('location: menu.php');
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengguna';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=pengguna';</script>";
 }

}
else if($stt=="edit"){

?>


<?php
}
?>
