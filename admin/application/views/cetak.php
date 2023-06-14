
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

<table width="780" class="table1" border="1" align="center">
  <tr>
    <td>
	<center>

	
 <table width="100%" class="table1" border="1">
  <tr>
    <td align="right">
	<center>
	
	
	
	LAPORAN HASIL DIAGNOSA <?php $tgl=date('d-m-Y'); echo"TANGGAL $tgl"; ?>
	</center>
	</td>
    
  </tr>
</table>
<br>

</center>


		
<table width="100%" class="table1" border="0">
  <tr>
    <td width="25%" valign="top">Nama Pengguna</td>
    <td width="5" valign="top">:</td>
    <td width="466" valign="top"><?php echo $nama;?></td>
  </tr>
  
   <tr>
    <td valign="top">Email</td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $email;?></td>
  </tr>
 
</table>						
									

<br>
                    <h6>Rincian Gejala :</h6>
                        
                           <table width="50%" class="table1" border="0" style="font-size:14px;">
                                            <thead>
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
													<th scope="col">Gejala yang dialami</th>
													
                                                </tr>
                                            </thead>
								<tbody>
                                       
                                       
                                       <?php
									   $id_diagnosa=$_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbdetail_diagnosa,tbgejala where tbdetail_diagnosa.id_gejala=tbgejala.id_gejala and tbdetail_diagnosa.id_diagnosa='$id_diagnosa' order by tbdetail_diagnosa.id_detail asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
	<tr style='text-align:center'>
  <td colspan='2'>Tidak Ada Data Yang Tersedia</td>
 </tr>
	
	
";
    }else{

		
		$no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['nama_gejala']?></td>
  
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>			
											
								</table>
                                        
<br>
                    <h6>Rincian Faktor Lain :</h6>
                        
                           <table width="50%" class="table1" border="0" style="font-size:14px;">
                                            <thead>
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Faktor lain yang dialami</th>
                                                    
                                                </tr>
                                            </thead>
                                <tbody>
                                       
                                       
                                       <?php
                                       $id_diagnosa=$_GET['id'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbdetail_diagnosafaktor,tbfaktorlain where tbdetail_diagnosafaktor.id_faktorlain=tbfaktorlain.id_faktorlain and tbdetail_diagnosafaktor.id_diagnosafaktor='$id_diagnosa' order by tbdetail_diagnosafaktor.id_detail asc") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
    echo "
    <tr style='text-align:center'>
  <td colspan='2'>Tidak Ada Data Yang Tersedia</td>
 </tr>
    
    
";
    }else{

        
        $no=1;
      while($r = mysqli_fetch_array($query)):     ?>
   
 <tr class="odd gradeX">
  <td align="center"><?php echo $no."." ?></td>
  <td align="center"><?php echo $r['nama_faktorlain']?></td>
  
 </tr>
 <?php
 $no++;
  endwhile;
  }
 ?>
                                     
                                    </tbody>            
                                            
                                </table>

 <h6>Hasil Diagnosa :</h6>
 <?php
 $id_diagnosa=$_GET['id'];
  $query1 = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa, tbpenyakit where tbdiagnosa.id_penyakit=tbpenyakit.id_penyakit and tbdiagnosa.id_diagnosa='$id_diagnosa'") or die (mysqli_error());
   if(mysqli_num_rows($query1) == 0){}
   else{
   $r1 = mysqli_fetch_array($query1);
   $nama_penyakit=$r1['nama_penyakit'];
   $id_penyakit=$r1['id_penyakit'];
   $hasil_diagnosa=$r1['hasil_diagnosa'];
  $hasil_diagnosa=$hasil_diagnosa*100;
//   $hasil_diagnosa=0.2*100;

   }
    //cek jml pilihan gejala
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
            echo"Anda Terindikasi Penyakit: $nama_penyakit<br>
            Tingkat Kepercayaan : $hasil_diagnosa % <br>
            "; 
        }
    }
 }
 ?>
 <!-- Anda dinyatakan Terindikasi penyakit <?php echo $nama_penyakit; ?> <br>
 Tingkat Kepercayaan : <?php echo $hasil_diagnosa; ?> %. -->
 
 
                  

  </tr>
</table>
<script>
		window.print();
	</script>
