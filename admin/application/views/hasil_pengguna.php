<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>

<div class="card">
             <!--
			  <div class="card-header">
                
				<a href="dashboard.php?module=diagnosa_admin&stt=tambah" class="menu"><button type="button" class="btn btn-primary mb-3">Tambah Data</button></a>
              </div>
			 -->
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
				  $id_pengguna=$_SESSION['id_masuk'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpengguna,tbpenyakit where tbdiagnosa.id_pengguna=tbpengguna.id_pengguna and tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbpengguna.id_pengguna='$id_pengguna' order by tbdiagnosa.id_diagnosa asc") or die (mysqli_error());
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
<!--   <td align="center"><?php echo $r['nama_penyakit'] ?></td>  --> 
  <td align="center"><?php
  
 //cek jml pilihan gejala
 $id_diagnosa =   $r['id_diagnosa'];
 $q31          = mysqli_query($koneksi, "SELECT count(*) as jmlGjlPilih FROM tbdetail_diagnosa WHERE id_diagnosa='$id_diagnosa'") or die (mysqli_error());
 $r31          = mysqli_fetch_array($q31);  
 $jmlGjlPilih  = $r31['jmlGjlPilih'];
 
  //cek jml pilihan faktorlain
 $q32          = mysqli_query($koneksi, "SELECT count(*) as jmlFktrPilih FROM tbdetail_diagnosafaktor WHERE id_diagnosafaktor='$id_diagnosa'") or die (mysqli_error());
 $r32          = mysqli_fetch_array($q32);  
 $jmlFktrPilih  = $r32['jmlFktrPilih'];
 $hslPilih  = $jmlGjlPilih + $jmlFktrPilih;
 
 if($hslPilih <= 2){
    echo" Tidak dapat terindikasi, silahkan masukkan ulang pilihan <br><br><br><br>"; 
 }else {

    if($hasil_diagnosa<=0.09){
        echo" Tidak dapat terindikasi, silahkan masukkan ulang pilihan <br><br><br><br>"; 
    }else {
        //cek selisih
        //cek jml pilihan gejala
        //  $q31          = mysqli_query($koneksi, "SELECT hasil_diagnosa FROM tbdiagnosa WHERE id_diagnosa='$id_diagnosa'") or die (mysqli_error());
        //  $r31          = mysqli_fetch_array($q31);  
        //  $hasgejala    = $r31['hasil_diagnosa'];
         
        //   //cek jml pilihan faktorlain
        //  $q32          = mysqli_query($koneksi, "SELECT hasil_diagnosa FROM tbdiagnosafaktor WHERE id_diagnosafaktor='$id_diagnosa'") or die (mysqli_error());
        //  $r32          = mysqli_fetch_array($q32);  
        //  $has          = $r32['hasil_diagnosa'];
        
         $q3          = mysqli_query($koneksi, "SELECT * FROM tbhasil WHERE id_diagnosa='$id_diagnosa' AND id_penyakit='1' order by hasil desc") or die (mysqli_error());
         $r3          = mysqli_fetch_array($q3);  
         $hasgejala   = $r3['hasil'];
         $q3          = mysqli_query($koneksi, "SELECT * FROM tbhasil WHERE id_diagnosa='$id_diagnosa' AND id_penyakit='2' order by hasil desc") or die (mysqli_error());
         $r3          = mysqli_fetch_array($q3);  
         $has         = $r3['hasil'];
        
 
        if($hasgejala>$has){
            $krng = $hasgejala - $has; 
        }else {
            $krng = $has - $hasgejala;
        }
        
        $_SESSION['hasgejala']= $hasgejala;
        $_SESSION['has']= $has;
        
        if(($hasgejala == $has) || ($krng < 0.04)){
            echo" Tidak dapat terindikasi<br><br><br><br>"; 
        }else {
              echo $r['nama_penyakit'] ;
        }
    }
 }
 ?>

  <?php
     $hasil_diagnosa=$r['hasil_diagnosa'];
   $hasil_diagnosa=$hasil_diagnosa*100;
  echo $hasil_diagnosa." %";
  ?>
  
  </td>  
  
  <td align="center">
    <a href="<?php echo "application/views/cetak.php?id=".$r['id_diagnosa'] ?>" target="_blank"><i class="fa fa-print"></i></a> 
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
