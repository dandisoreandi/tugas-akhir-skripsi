<?php
 $query = mysqli_query($koneksi, "SELECT * FROM tbuser") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_user="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_user=$r;   }

   $id_pengguna=$_SESSION['id_masuk'];
 $query = mysqli_query($koneksi, "SELECT * FROM tbdiagnosa where id_pengguna='$id_pengguna'") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_mk="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_mk=$r;   }

   $query = mysqli_query($koneksi, "SELECT * FROM tbpenyakit") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_jab="0";
   }
   else{  $r = mysqli_num_rows($query); $rekap_jab=$r;   }
   
   $query = mysqli_query($koneksi, "SELECT * FROM tbgejala") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_peg="0";
   }
	   
   else{  $r = mysqli_num_rows($query); $rekap_peg=$r;   }
   
   $query = mysqli_query($koneksi, "SELECT * FROM tbfaktorlain") or die (mysqli_error());
   if(mysqli_num_rows($query) == 0){
	   $rekap_fak="0";
   }
	   
   else{  $r = mysqli_num_rows($query); $rekap_fak=$r;   }
   
   ?>

 <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
          <!-- /.col -->
         
		  
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-desktop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Penyakit</span>
                <span class="info-box-number"><?php echo $rekap_jab;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-desktop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Gejala</span>
                <span class="info-box-number"><?php echo $rekap_peg;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-desktop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Faktor Lain</span>
                <span class="info-box-number"><?php echo $rekap_fak;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
		  <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-desktop"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Diagnsoa</span>
                <span class="info-box-number"><?php echo $rekap_mk;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          
          <!-- /.col -->
          
		  
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          
          <!-- /.col -->
         
          <!-- /.col -->
        </div>

        
        <!-- /.row -->
      </div><!--/. container-fluid -->