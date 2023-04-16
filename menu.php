<?php
$level=$_SESSION['level_masuk'];
if($level=="Admin"){
?>
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
		 <li class="nav-item">
            <a href="dashboard.php?module=home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>	   
		  
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plug"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dashboard.php?module=user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="dashboard.php?module=penyakit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penyakit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dashboard.php?module=gejala" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gejala</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dashboard.php?module=faktorlain" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faktor Lain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dashboard.php?module=pengetahuan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengetahuan</p>
                </a>
              </li>
			  <!-- <li class="nav-item">
                <a href="dashboard.php?module=solusi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Solusi</p>
                </a>
              </li> -->
			  <li class="nav-item">
                <a href="dashboard.php?module=pengguna" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
             
            </ul>
          </li>
          
		  
		  <li class="nav-item">
            <a href="dashboard.php?module=diagnosa_admin" class="nav-link">
              <i class="nav-icon fas fa-fax"></i>
              <p>
                Diagnosa
                
              </p>
            </a>
          </li>	  
		  
		<li class="nav-item">
            <a href="dashboard.php?module=laporan" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                
              </p>
            </a>
          </li>	
		  
		    <!--
		  -->
          
          
          
          
        </ul>
      </nav>
<?php
}
else if($level=="Pengguna"){
?>			

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
		 <li class="nav-item">
            <a href="dashboard.php?module=home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>	   
		  
          <li class="nav-item">
            <a href="dashboard.php?module=jenis" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Jenis Penyakit
                
              </p>
            </a>
          </li>	  
          
           <li class="nav-item">
            <a href="dashboard.php?module=konsultasi" class="nav-link">
              <i class="nav-icon fas fa-fax"></i>
              <p>
                Diagnosa
                
              </p>
            </a>
          </li>	   
		  
		   <li class="nav-item">
            <a href="dashboard.php?module=hasil" class="nav-link">
                 <i class="nav-icon fas fa-book"></i>
              <p>
                Hasil Diagnosa
                
              </p>
            </a>
          </li>	  
         
		  
		 
		 
            
         
          
          
          
        </ul>
      </nav>


<?php
}
?>