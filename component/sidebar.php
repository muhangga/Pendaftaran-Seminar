<?php 
   session_start();
   include ("function/koneksi.php");
   $id_user = $_SESSION['id_user'];
   $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='$id_user'");
   $row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?= $title['judul'] ?></title>

<!-- Custom fonts for this template-->
<link href="assets/templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="assets/templates/css/sb-admin-2.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet" />

<!-- Custom styles for this page -->
  <link href="assets/templates/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav background-dashboard sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
   <div class="sidebar-brand-icon">
      <i class="fas fa-university"></i>
   </div>
   <div class="sidebar-brand-text ml-1" style="font-size: 13px">Seminar Lapangan</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<?php if($_SESSION['akses'] === "admin") : ?>
<!-- Nav Item - Dashboard -->
<li class="nav-item">
   <a class="nav-link mt-3" href="dashboard.php">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span>
   </a>
</li>

<li class="nav-item">
   <a class="nav-link" href="data_pendaftar.php">
      <i class="fas fa-fw fa-list-alt"></i>
      <span>Data Pendaftar</span>
   </a>
</li>

<li class="nav-item">
   <a class="nav-link mb-3" href="data_absen.php">
      <i class="fas fa-fw fa-check"></i>
      <span>Data Absen</span>
   </a>
</li>
<?php endif; ?>

<?php if($_SESSION['akses'] === "user") : ?>
<!-- Nav Item - Dashboard -->
<li class="nav-item">
   <a class="nav-link mt-3" href="dashboard_user.php">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span>
   </a>
</li>

<li class="nav-item">
   <a class="nav-link" href="daftar.php">
      <i class="fas fa-fw fa-list"></i>
      <span>Daftar Seminar</span>
   </a>
</li>
<?php 
   
   $q = mysqli_query($koneksi, "SELECT * FROM tbl_daftar WHERE id_user='$id_user'");
   $rows = mysqli_fetch_array($q);
   $cek = mysqli_num_rows($q);

   if($cek > 0) {?>
   <li class="nav-item">
      <a class="nav-link mb-3" href="absensi.php?id_user=<?= $row['id_user'] ?>">
         <i class="fas fa-fw fa-check"></i>
         <span>Absensi Sertifikat</span>
      </a>
   </li>
   <?php } ?>

   <!-- <?php if($cek === 0) { ?>
      <li class="nav-item">
      <a class="nav-link mb-3" href="dummy_absen.php?id_user=<?= $row['id_user'] ?>">
         <i class="fas fa-fw fa-check"></i>
         <span>Absensi Sertifikat</span>
      </a>
   </li>
   <?php } ?> -->

<?php endif; ?>

<hr class="sidebar-divider mb-4">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
   <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

   <!-- Topbar -->
   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button> 

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama'] ?></span>
            <img class="img-profile rounded-circle" src="assets/img/user.png">
         </a>
         <!-- Dropdown - User Information -->
         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
            </a>
         </div>
      </li>
   </ul>
</nav>
<!-- End of Topbar -->
