<?php
$stt=$_GET["stt"];
?>

<?php
if($stt==""){
?>


<form name="form1" method="post" action="" enctype="multipart/form-data">
 <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                 <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="tgl1" class="form-control float-right" required id="reservation">
                  </div>
                </div>
                
              </div>
             
              <div class="col-md-6">
                
                <!-- /.form-group -->
                <div class="form-group">
                  
				  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="date" name="tgl2" class="form-control float-right" required id="reservation">
                  </div>
                </div>
               
              </div>
              <!-- /.col -->
                  <button type="submit" name="Simpan" class="btn btn-primary">Tampil</button></div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
        </div>

</form>

<div class="clearfix"></div>
				
<?php 
if(isset($_POST['Simpan'])){
  $tgl1=$_POST['tgl1'];
  $tgl2=$_POST['tgl2'];

   echo"<script>location.href='$_SERVER[PHP_SELF]?module=laporan&stt=tampil&T1=$tgl1&T2=$tgl2';</script>";
  }
 ?>				  
<?php
}
else if($stt=="tampil"){
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
						  <th>Hasil Diagnosa Penyakit</th>
						  <th style="text-align: center;">Akurasi</th>
						  
                        </tr>
                  </thead>
                  <tbody>
                  
                  <?php
				  $tgl1=$_GET['T1'];
				  $tgl2=$_GET['T2'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbdiagnosafaktor, tbpenyakit,tbpengguna where tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosafaktor.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosa.id_pengguna=tbpengguna.id_pengguna  and tbdiagnosa.tanggal BETWEEN '$tgl1' and '$tgl2' order by tbdiagnosa.id_diagnosa asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr>
  <td colspan='6' align='center'>Tidak Ada Data Yang Tersedia</td>
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
	   $tgl11=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  
  echo $tgl11 ; ?></td>  
  <td align="center"><?php echo $r['nama_penyakit'] ?></td>  
  <td align="center">
  <?php
     $hasil_diagnosa=$r['hasil_diagnosa'];
   $hasil_diagnosa=$hasil_diagnosa*100;
  echo $hasil_diagnosa." %";
  ?>
  
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
				
				<a href="<?php echo"application/views/cetak_admin.php?&T1=$tgl1&T2=$tgl2"; ?>" target="_blank" class="menu"><button type="button" class="btn btn-primary mb-3">Cetak</button></a>
              </div>
              <!-- /.card-body -->
            </div>


 
<div class="clearfix"></div>

  
<?php
}
else if($stt=="hapus"){



}
else if($stt=="edit"){

	
?>



<?php
}
?>
