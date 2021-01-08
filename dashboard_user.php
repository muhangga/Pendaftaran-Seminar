<?php

   $title['judul'] = "Dashboard User";
   include "function/koneksi.php"; 
   include "component/sidebar_user.php"; 
   
   if (!isset($_SESSION['id_user'])) {
      header("location: login_user.php?pesan=belum_login");
   }

   $id_user = $_SESSION['id_user'];

   $pendaftar = mysqli_query($koneksi, "SELECT * FROM tbl_daftar");
   $user = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='$id_user'");

   $row = mysqli_fetch_assoc($pendaftar);
   
?>

<div class="container-fluid" style="margin-bottom: 400px;">

<marquee behavior="scroll" srcollamount="2" class="alert alert-success mb-5">Halo, Selamat Datang <?= $_SESSION['nama']; ?> di Panel User <i class="fas fa-smile"></i></marquee>
   
   <div class="container text-center">
      <div class="row justify-content-center">
         <img src="assets/img/logo.png" height="200px;" class="img-responsive mb-4">
         <div class="visi mb-4">
            <h4 class="mb-3 text-success font-weight-bold">Visi Pusatdiklat SDM LHK</h4>
            <p>Terwujudnya SDM Kehutanan yang kompeten dan berakhlak mulia dalam mendukung pengurusan hutan lestari untuk
               kesejahteraan masyarakat yang berkeadilan.</p>
         </div>

         <div class="misi">
            <h4 class="mb-3 text-success font-weight-bold">Misi Pusatdiklat SDM LHK Bogor</h4>
            <p>
               1. Meningkatkan mutu dan jumlah penyelengaraan diklat kehutanan bagi aparatur dan non-aparatur.<br>
               2. Meningkatkan mutu pengurusan pendidikan menengah kejuruan dan pendidikan tinggi.<br>
               3. Memantapkan kelembagaan diklat kehutanan.<br>
               4. Meningkatkan pengelolaan hutan diklat dan sarana prasarana diklat lainnya.<br>
            </p>
         </div>
      </div>
   </div>

</div>

<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
         <!-- heading modal -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Visi</h4>
         </div>
         <!-- body modal -->
         <div class="modal-body">
            <p>bagian body modal.</p>
         </div>
         <!-- footer modal -->
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
         </div>
      </div>
   </div>
</div>

<?php include "component/footer.php"; ?>