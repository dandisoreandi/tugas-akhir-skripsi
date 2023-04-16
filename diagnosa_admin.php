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
						  <th>Id Diagnosa</th>
						  <th>Nama Pengguna</th>
						  <th>Tanggal</th>
						  <th>Hasil Diagnsoa</th>
						  <th style="text-align: center;">Akurasi</th>
						  <th style="text-align: center;">Action</th>
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
  $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpengguna,tbpenyakit where tbdiagnosa.id_pengguna=tbpengguna.id_pengguna and tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit order by tbdiagnosa.id_diagnosa asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='7' align='center'>Tidak Ada Data Yang Tersedia</td>
 </tr>
";
    }else{

		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>					  
		 <tr>
  <td><?php echo $no."." ?></td>
  <td><?php echo $r['id_diagnosa'] ?></td>  
  <td><?php echo $r['nama'] ?></td>  
<td align="center"><?php 
  $tanggal=$r['tanggal'];
  
   $pisah=explode("-",$tanggal);
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  
  echo $tgl1 ; ?></td>  
  <td align="center"><?php echo $r['nama_penyakit'] ?></td>  
  <td align="center">
  <?php
     $hasil_diagnosa=$r['hasil_diagnosa'];
   $hasil_diagnosa=$hasil_diagnosa*100;
  echo $hasil_diagnosa." %";
  ?>
  
  </td>  
  
  <td align="center">
    <a href="<?php echo "application/views/cetak.php?id=".$r['id_diagnosa'] ?>" target="_blank"><i class="fa fa-print"></i></a> 
   <a href="<?php echo "$_SERVER[PHP_SELF]?module=diagnosa_admin&stt=hapus&id=".$r['id_pengguna'] ?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><i class="fa fa-trash"></i></a>
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
   echo"<script>alert('Data Berhasil di Hapus');location.href='$_SERVER[PHP_SELF]?module=diagnosa_admin';</script>";
 }else{
 # echo "Upss Something wrong..";
  echo"<script>alert('Data Gagal di Hapus');location.href='$_SERVER[PHP_SELF]?module=diagnosa_admin';</script>";
 }

}
else if($stt=="edit"){

?>


<?php
}
?>
