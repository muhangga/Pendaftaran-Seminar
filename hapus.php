<?php 

   error_reporting(0);

   include("function/koneksi.php");
   $id_daftar = $_GET['id_daftar'];
   $id_sertifikat = $_GET['id_sertifikat'];
   $sertifikat = mysqli_query($koneksi, "DELETE FROM tbl_sertifikat WHERE id_sertifikat='$id_sertifikat'");
   $query = mysqli_query($koneksi, "DELETE FROM tbl_daftar WHERE id_daftar='$id_daftar'");

   if (isset($sertifikat)) :
      echo "<script>alert('Data berhasil dihapus'); 
      document.location.href='data_absen.php'</script>";
   endif;

   if(isset($query)) : 
      echo "<script>alert('Data berhasil dihapus'); 
      document.location.href='data_pendaftar.php'</script>"; 
   endif;