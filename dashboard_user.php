<?php

   $title['judul'] = "Dashboard User";
   include "function/koneksi.php"; 
   include "component/sidebar.php"; 
   
   if (!isset($_SESSION['id_user'])) {
      header("location: login.php?pesan=belum_login");
   }

   $id_user = $_SESSION['id_user'];

   $pendaftar = mysqli_query($koneksi, "SELECT * FROM tbl_daftar");
   $user = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='$id_user'");

   $row = mysqli_fetch_assoc($pendaftar);
   
?>

<div class="container-fluid" style="margin-bottom: 400px;">

<marquee behavior="scroll" srcollamount="2" class="alert alert-info mb-5">Halo, Selamat Datang <?= $_SESSION['nama']; ?> di Panel User <i class="fas fa-smile"></i></marquee>
   
</div>

<?php include "component/footer.php"; ?>