<?php 
   $title['judul'] = "Data Pendaftar"; 
   include("component/sidebar.php");
   include("function/koneksi.php");

   if (!isset($_SESSION['id_user'])) {
      header("location: login.php?pesan=belum_login");
   }

   if (isset($_POST['tambah_data'])) {
      $email = htmlspecialchars($_POST['email']);
      $nama = htmlspecialchars($_POST['nama']);
      $instansi = htmlspecialchars($_POST['instansi']);
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $no_hp = htmlspecialchars($_POST['no_hp']);
      $tanggal = date("d/m/Y h:i:s");

      $query = mysqli_query($koneksi, "INSERT into tbl_daftar VALUES ('', '$email', '$nama', '$instansi', '$jenis_kelamin', '$no_hp', '$tanggal')");

      if (isset($query)) {
         echo "<script>alert('Data berhasil ditambahkan!');
                     document.location.href='data_pendaftar.php';
              </script>";
      } else {
         echo "<script>alert('Data gagal ditambahkan, silahkan coba kembali!');
                     document.location.href='data_pendaftar.php';
              </script>";
      }
   }
?>

<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h4 mb-0 text-gray-800">Data Pendaftar</h1>
   </div>

   <form action="" method="POST" style="font-size:12px;">
   
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control form-control-sm" id="email" name="email" autofocus required>
          </div>
      </div>

      <div class="col-md-6 mb-2">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control form-control-sm" id="nama" name="nama" autofocus required>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
            <label for="instansi">Instansi</label>
            <input type="text" class="form-control form-control-sm" id="instansi" name="instansi" autofocus required>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
            <label for="no_hp">No Telepon</label>
            <input type="text" class="form-control form-control-sm" id="no_hp" name="no_hp" autofocus required>
          </div>
      </div>
        
        <div class="col-md-2">
          <label for="jk" style="font-size:14px;">Jenis Kelamin : </label>
        </div>

        <div class="col-md-2">
          <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="laki-laki" name="jenis_kelamin" value="Laki-laki" checked>
              <label class="custom-control-label" for="laki-laki">Laki-laki</label>
          </div>
        </div>

        <div class="col-md-2">
          <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="perempuan" name="jenis_kelamin" value="Perempuan">
              <label class="custom-control-label" for="perempuan">Perempuan</label>
          </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary btn-block text-center mt-4" name="tambah_data">Tambah Data</button>
   </form>

   <div class="mb-2 d-flex justify-content-end mt-5">
         <a href="export_excel.php" class="btn-sm btn-success mr-2"><i class="fas fa-plus mx-1 my-1">&nbsp Export to Excel</i></a>
      </div>

          <div class="card shadow mb-4" style="font-size:12px;">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead style="font-size:14px">
                    <tr>
                      <th>Email</th>
                      <th>Nama</th>
                      <th>Asal Instansi</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <th>No Telepon</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

               <?php 
               $query = mysqli_query($koneksi, "SELECT * FROM tbl_daftar"); ?>

                <tbody style="font-size:13px">
                  <?php foreach($query as $row) : ?>
                    <tr>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $row['instansi'] ?></td>
                      <td><?= $row['alamat'] ?></td>
                      <td><?= $row['jenis_kelamin'] ?></td>
                      <td><?= $row['no_hp'] ?></td>
                      <td><?= $row['tanggal'] ?></td>
                      <td width="15%">
                        <a href="hapus.php?id_daftar=<?= $row['id_daftar'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');" class="btn btn-danger btn-sm align-items-center" title="Hapus"><i class="fas fa-trash" style="font-size:12px;"></i></a>
                        <a href="edit.php?id_daftar=<?= $row['id_daftar'] ?>" class="btn btn-success btn-sm align-items-center" title="Edit"><i class="fas fa-edit" style="font-size:12px;"></i></a>
                        <a href="sertifikat.php?id_daftar=<?= $row['id_daftar'] ?>" class="btn btn-info btn-sm align-items-center" title="Cetak Sertifikat <?= $row['nama'] ?>" target="_blank"><i class="fas fa-file-import" style="font-size:12px;"></i></a>
                      </td>
                   </tr>
                   <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
</div>

<?php include("component/footer.php"); ?>