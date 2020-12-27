<?php
   error_reporting(0);

   include "function/koneksi.php";

   if(isset($_SESSION['id_user']) > 0) {
      header("location: dashboard.php");
   }

   if (isset($_POST['register'])) {
      $nama = htmlspecialchars($_POST['nama']);
      $username = htmlspecialchars($_POST['username']);
      $password = md5(htmlspecialchars($_POST['password']));
      $akses = "user";

      $query = mysqli_query($koneksi, "INSERT into tbl_user VALUES ('', '$nama', '$username', '$password', '$akses')");
      $result = mysqli_fetch_assoc($query);

      if (isset($query)) {
         echo "<script>alert('Akun anda sudah terdaftar, silahkan login untuk daftar seminar!');
                     document.location.href='login_user.php';
              </script>";
      } else {
         echo "<script>alert('Daftar akun gagal, silahkan coba lagi');
                     document.location.href='register_user.php';
              </script>";
      }
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="assets/templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/templates/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet" />

</head>

<body class="background">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-2 col-md-2">

        <div class="card border-0 shadow-lg my-5">
          <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900">Register</h1>
                    <div class="garis-bawah mb-4"></div>
                  </div>
                  <form  action="#" method="POST" class="user">
                     <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukan nama" required>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan username" required>
                    </div>
                    
                    <div class="form-group pb-2">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                    </div>
                  
                    <button class="btn btn-daftar btn-user btn-block mt-3" type="submit" name="register">Register</button>
                    <hr>
                  </form>
                  <div class="text-center">
                    <a class="small" href="login_user.php">Sudah punya akun?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/templates/vendor/jquery/jquery.min.js"></script>
  <script src="assets/templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/templates/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/templates/js/sb-admin-2.min.js"></script>

</body>

</html>
