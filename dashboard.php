<?php

   $title['judul'] = "Dashboard";
   include "function/koneksi.php"; 
   include "component/sidebar.php"; 

   if (isset($_SESSION['akses']) === "user") {
    header("location: login.php");
  }
   
   if (!isset($_SESSION['id_user'])) {
      header("location: login.php?pesan=belum_login");
   }
      
   $pendaftar = mysqli_query($koneksi, "SELECT * FROM tbl_daftar");
   $user = mysqli_query($koneksi, "SELECT * FROM tbl_user");
   
?>

<div class="container-fluid">

<marquee behavior="scroll" srcollamount="2" class="alert alert-info mb-4">Halo, Selamat Datang <?= $_SESSION['nama']; ?> di Panel Admin <i class="fas fa-smile"></i></marquee>

   <div class="row">
      <div class="col-xl-6 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Admin</div>
                  <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                     <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= mysqli_num_rows($user); ?></div>
                  </div>

                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
               </div>
            </div>
            </div>
         </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Pendaftar</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows($pendaftar); ?></div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
               </div>
            </div>
            </div>
         </div>
      </div>
      </div>
   </div>

   
</div>

<?php include "component/footer.php"; ?>