
<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
include"../config/koneksi.php";
$module="module";
?>
<style>
	/*design table 1*/
.table1 {
    font-family: sans-serif;
    color: #232323;
    border-collapse: collapse;
}
 
.table1, th, td {
    border: 1px solid #999;
    padding: 8px 20px;
}
	</style>
<?php
$tgl1=$_GET['T1'];
$tgl2=$_GET['T2'];
  
$pisah=explode("-",$tgl1);
$A=$pisah[2]."-".$pisah[1]."-".$pisah[0];
   
$pisah=explode("-",$tgl2);
$B=$pisah[2]."-".$pisah[1]."-".$pisah[0];
   
   

?>	
<table width="980" class="table1" border="1" align="center">
  <tr>
    <td>
	<center>

	
 <table width="100%" class="table1" border="1">
  <tr>
    <td align="right">
	<center>
	
	
	
	<b>LAPORAN HASIL DIAGNOSA DARI TGL <?php echo"$A SAMPAI TGL  $B"; ?></b>
	</center>
	</td>
    
  </tr>
</table>
<br>

</center>


		
					
									

<table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
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
  $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa,tbpenyakit,tbpengguna where tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosa.id_pengguna=tbpengguna.id_pengguna  and tbdiagnosa.tanggal BETWEEN '$tgl1' and '$tgl2' order by tbdiagnosa.id_diagnosa asc") or die (mysqli_error());
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
	   $tgl1=$pisah[2]."-".$pisah[1]."-".$pisah[0];
  
  echo $tgl1 ; ?></td>  
<!--   <td align="center"><?php echo $r['nama_penyakit'] ?></td>   -->
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
   
 </tr>
<?php
 $no++;
  endwhile;
  }
 ?>

		
                        
                       
                      </tbody>
                    </table>
                                        
	



    </td>
  </tr>
</table>

<script>
		window.print();
	</script>
