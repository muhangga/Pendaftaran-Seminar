<?php 

session_start();
error_reporting(0);
$title['judul'] = "Absensi"; 
include("function/koneksi.php");
include("component/sidebar_user.php");

if (!isset($_SESSION['id_user'])) {
   header("location: login_user.php?pesan=belum_login");
}

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_daftar WHERE id_user='$id_user'");
$query_absen = mysqli_query($koneksi, "SELECT * FROM tbl_sertifikat WHERE id_user='$id_user'");
$cek = mysqli_num_rows($query);
$cek_absen = mysqli_num_rows($query_absen);
$row = mysqli_fetch_assoc($query);
$absen = mysqli_fetch_assoc($query_absen);

if (isset($_POST['absen'])) {
   $id_user = $_POST['id_user'];
   $nama = htmlspecialchars($_POST['nama']);
   $instansi = htmlspecialchars($_POST['instansi']);
   $status = "1";

   $query = mysqli_query($koneksi, "INSERT INTO tbl_sertifikat VALUES('', '$id_user', '$nama', '$instansi', '$status')");

   $delete = mysqli_query($koneksi, "DELETE FROM tbl_daftar WHERE id_user='$id_user'");

   if (isset($query) && isset($delete)) {
      echo "<script>alert('Absen berhasil, silahkan cetak sertifikat!');
                  document.location.href='absensi.php';
            </script>";
   } else {
      echo "<script>alert('Absen gagal, silahkan coba kembali!');
                  document.location.href='absensi.php';
            </script>";
   }
}

?>

<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h5 mb-0 text-gray-800">Absensi Sertifikat</h1>
   </div>

   <?php 
   if ($cek > 0) { ?>
      <div class="row">
         <div class="col-md-6">
            <form action="#" method="POST" style="font-size:12px;">

               <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">

               <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control form-control-sm" id="nama" name="nama" required value="<?= $row['nama'] ?>">
               </div>

               <div class="form-group">
                  <label for="instansi">Asal Instansi</label>
                  <input type="text" class="form-control form-control-sm" id="instansi" name="instansi" required value="<?= $row['instansi'] ?>">
               </div>

               <button type="submit" class="btn btn-primary px-4 py-2 mb-5" name="absen" style="font-size:12px;">Absen</button>
            </form>
         </div>
      </div>
   <?php } 
   else if($cek === 0) { ?>
      <div class="alert alert-success">Anda sudah Absen, sertifikat akan di kirim via email</div>
   <?php } ?>
 
</div>


<?php include("component/footer.php"); ?>