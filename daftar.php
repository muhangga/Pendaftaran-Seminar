<?php

   session_start();
   include "function/koneksi.php";

   if (!isset($_SESSION['id_user'])) {
      header("location: login.php?pesan=belum_login");
   }

   $id_user = $_SESSION['id_user'];
   $query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='$id_user'");
   $row = mysqli_fetch_assoc($query);

   if (isset($_POST['daftar'])) {
      $id_users = $_POST['id_users'];
      $email = htmlspecialchars($_POST['email']);
      $nama = htmlspecialchars($_POST['nama']);
      $instansi = htmlspecialchars($_POST['instansi']);
      $alamat = htmlspecialchars($_POST['alamat']);
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $no_hp = htmlspecialchars($_POST['no_hp']);
      $tanggal = date("d/m/Y h:i:s");
      $status = "0";

      $query = mysqli_query($koneksi, "INSERT into tbl_daftar VALUES ('', '$id_users', '$email', '$nama', '$instansi', '$alamat', '$jenis_kelamin', '$no_hp', '$tanggal', '$status')");

      if (isset($query)) {
         echo "<script>alert('Pendaftaran Berhasil, Terimakasih sudah mendaftar!');
                     document.location.href='dashboard_user.php';
              </script>";
      } else {
         echo "<script>alert('Daftar gagal, silahkan coba kembali!');
                     document.location.href='dashboard_user.php';
              </script>";
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pendaftaran Seminar</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
        
    </head>
    <body id="page-top">
        
         <main>
            <div class="row justify-content-center">
               <div class="col-md-5 col-sm-12 col-xs-12">
                  <div class="kiri p-5" style="background-color:#DB694A; height:100vh;">
                     <div class="pendaftaran-seminar pt-5">
                        <div class="row justify-content-center">
                           <div class="col-md-6 col-sm-12">
                              <img src="assets/img/logo.png" alt="">
                           </div>
                        </div>
                        <h2 class="pt-3 text-white">Pendaftaran Seminar</h2>
                        <p>Silahkan daftar terlebih dahulu untuk mengikuti <br> Seminar di Dinas Pendidikan</p>
                     </div>
                  </div>
               </div>

               <div class="col-md-7 col-sm-12 col-xs-12">
                  <div class="kanan">
                     <h5 class="text-center mt-5">Pendaftaran</h5>
                     <div class="garis-bawah mb-4"></div>
                     <form action="#" method="POST">

                     <input type="hidden" name="id_users" value="<?= $row['id_user']; ?>">

                        <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" class="form-control form-control-sm" id="email" name="email" autofocus>
                        </div>

                        <div class="form-group">
                           <label for="nama">Nama</label>
                           <input type="text" class="form-control form-control-sm" id="nama" name="nama" required>
                        </div>

                        <div class="form-group">
                           <label for="instansi">Asal Instansi</label>
                           <input type="text" class="form-control form-control-sm" id="instansi" name="instansi" required>
                        </div>

                        <div class="form-group">
                           <label for="alamat">Alamat</label>
                           <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" required>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" class="custom-control-input" id="laki-laki" name="jenis_kelamin" value="Laki-laki" checked>
                           <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                        </div>
                        
                        <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" class="custom-control-input" id="perempuan" name="jenis_kelamin" value="Perempuan">
                           <label class="custom-control-label" for="perempuan">Perempuan</label>
                        </div>

                        <div class="form-group mt-3" id="only_number">
                           <label for="no_hp">No Telepon</label>
                           <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp" required>
                        </div>

                        <button type="submit" class="btn btn-daftar " name="daftar">Daftar</button>
                     </form>
                        <a href="dashboard_user.php" class="pt-2 ml-auto" style="font-size:12px; color:red; float: right;">< Kembali ke Dashboard</a>
                  </div>
               </div>
            </div>
      </main>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
    </body>
</html>

<script>
    $(function() {
      $('#only-number').on('keydown', '#number', function(e){
          -1!==$
          .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
          .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
          || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
          && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
      });
    })
</script>