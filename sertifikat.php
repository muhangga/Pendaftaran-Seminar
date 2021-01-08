<?php 

session_start();
include("function/koneksi.php");

if (!isset($_SESSION['id_admin'])) {
   header("location: login.php?pesan=belum_login");
}

if(isset($_SESSION['id_admin']) > 0) {
   header("location: dashboard.php");
}

$id_sertifikat = $_GET['id_sertifikat'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_sertifikat WHERE id_sertifikat='$id_sertifikat'");
$row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cetak Sertifikat - <?= $row['nama'] ?></title>

    <link href="css/styles.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />


</head>
<body>

   <div class="background">
      <img src="assets/img/background.jpg" style="background-size: cover; width: 100%; height: 100%;">
   </div>
   
   <main class="text-center" style="margin-top:-130%;">
      <div class="row justify-content-center">
         <img src="assets/img/logo.png" class="mt-5" width="150px" alt="">
      </div>
      <div class="title-instansi mt-3">
         <h5 style="font-size: 26px;">KEMENTERIAN LINGKUNGAN HIDUP DAN KEHUTANAN</h5>
         <h4 style="font-size: 30px;">BADAN PENYULUHAN DAN PENGEMBANGAN SDM</h4>
         <h2 style="font-size: 38px;">PUSAT PENDIDIKAN DAN PELATIHAN SDM LHK</h2>
      </div>
   
      <div class="sertifikat" style="margin-top: 80px;">
         <h1><b>SERTIFIKAT</b></h1>
      </div>
   
      <div class="reward mt-4">
         <h2 class="mb-3">Diberikan kepada :</h2>
         <h3 class="nama"><b><?= $row['nama']?></b></h3>
         <h3 class="balai mb-3"><b><?= $row['instansi']?></b></h3>
         <span class="peserta mt-3" style="font-size:26px;">sebagai <br> <b>PESERTA</b></span>
      </div>
   
      <div class="webinar mt-5">
         <h2 style="font-weight: 400;">“ SARASEHAN WEBINAR PENGGUNAAN <br> DRONE DI BIDANG KEHUTANAN “</h2>
      </div>
   
      <div class="penyelenggara" style="font-size:24px; font-weight: 500;">
         <p>yang diselenggarakan oleh :</p>
         <h4>Pusat Diklat SDM Lingkungan Hidup Dan Kehutanan</h4>
         <span>pada tgl. 15 Juli 2020</span>
      </div>
      </div>

      <div class="container mt-5 w-25">

         <div class="cap" style="margin-right: 160px;">
            <img src="assets/img/cap.png" width="180px">
         </div>
         <div class="ttd" style="margin-top: -150px;">
            <span style="padding-top: 400px; font-weight: 400;" class="mt-4"><b>Bogor, 15 Juli 2020</b></span>
            <div class="kepala-diklat"><b>Plt. Kepala PUSAT DIKLAT SDM LHK,</b></div>
            <img src="assets/img/ttd.png" width="240px">
            <div class="nama">
               <h3>Ir. MARIANA LUBIS, M.M. <br>NIP. 19621112 199101 2 001</h3>
            </div>
         </div>
      </div>
   </main>
</body>
</html>

<script type="text/javascript">
   window.print();
</script>