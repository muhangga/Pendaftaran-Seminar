<?php 

session_start();
$title['judul'] = "Edit Data Pendaftar"; 
include("function/koneksi.php");
include("component/sidebar.php");

$id_daftar = $_GET['id_daftar'];

if (!isset($_SESSION['id_user'])) {
   header("location: login.php?pesan=belum_login");
}

$query = mysqli_query($koneksi, "SELECT * FROM tbl_daftar WHERE id_daftar='$id_daftar'");
$row = mysqli_fetch_array($query);

if (isset($_POST['edit'])) {
   $email = htmlspecialchars($_POST['email']);
   $nama = htmlspecialchars($_POST['nama']);
   $instansi = htmlspecialchars($_POST['instansi']);
   $jenis_kelamin = $_POST['jenis_kelamin'];
   $no_hp = htmlspecialchars($_POST['no_hp']);
   $tanggal = date("d/m/Y h:i:s");

   $query = mysqli_query($koneksi, "UPDATE tbl_daftar SET email='$email', nama='$nama', instansi='$instansi', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', tanggal='$tanggal' WHERE id_daftar='$id_daftar'");

   if (isset($query)) {
      echo "<script>alert('Data berhasil di edit!');
                  document.location.href='data_pendaftar.php';
            </script>";
   } else {
      echo "<script>alert('Data gagal di edit, silahkan coba kembali!');
                  document.location.href='data_pendaftar.php';
            </script>";
   }
}

?>

<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h5 mb-0 text-gray-800">Edit Data Pendaftar</h1>
   </div>


    <div class="row">
      <div class="col-md-7">
         <form action="#" method="POST" style="font-size:12px;">
         
            <div class="form-group">
               <label for="email">Email</label>
               <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?= $row['email']?>" autofocus>
            </div>

            <div class="form-group">
               <label for="nama">Nama</label>
               <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= $row['nama']?>" required>
            </div>

            <div class="form-group">
               <label for="instansi">Asal Instansi</label>
               <input type="text" class="form-control form-control-sm" id="instansi" name="instansi" value="<?= $row['instansi']?>" required>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
               <input type="radio" class="custom-control-input" id="laki-laki" name="jenis_kelamin" value="Laki-laki" checked>
               <label class="custom-control-label" for="laki-laki">Laki-laki</label>
            </div>
            
            <div class="custom-control custom-radio custom-control-inline">
               <input type="radio" class="custom-control-input" id="perempuan" name="jenis_kelamin" value="Perempuan">
               <label class="custom-control-label" for="perempuan">Perempuan</label>
            </div>

            <div class="form-group mt-3">
               <label for="no_hp">No Telepon</label>
               <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp" value="<?= $row['no_hp']?>" required>
            </div>

            <button type="submit" class="btn btn-primary px-4 py-2 mb-5" name="edit" style="font-size:12px;">Edit</button>
         </form>
      </div>
    </div>
</div>


<?php include("component/footer.php"); ?>