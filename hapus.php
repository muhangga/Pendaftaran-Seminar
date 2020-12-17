<?php 

   include("function/koneksi.php");
   $id_daftar = $_GET['id_daftar'];
   $query = mysqli_query($koneksi, "DELETE FROM tbl_daftar WHERE id_daftar='$id_daftar'");

   if(isset($query)) : 
      echo "<script>alert('Data berhasil dihapus'); 
      document.location.href='data_pendaftar.php'</script>"; 
   endif;