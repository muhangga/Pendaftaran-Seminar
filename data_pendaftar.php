<?php 
   $title['judul'] = "Data Pendaftar"; 
   include("component/sidebar.php");
   include("function/koneksi.php");

   $id_admin = $_SESSION['id_admin'];

   if (!isset($_SESSION['id_admin'])) {
      header("location: login.php?pesan=belum_login");
   }

   if (isset($_POST['tambah_data'])) {
      $email = htmlspecialchars($_POST['email']);
      $nama = htmlspecialchars($_POST['nama']);
      $instansi = htmlspecialchars($_POST['instansi']);
      $alamat = htmlspecialchars($_POST['alamat']);
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $no_hp = htmlspecialchars($_POST['no_hp']);
      $tanggal = date("d/m/Y h:i:s");
      $status = "1";

      $query = mysqli_query($koneksi, "INSERT into tbl_daftar VALUES ('', '$id_user', '$email', '$nama', '$instansi', '$alamat', '$jenis_kelamin', '$no_hp', '$tanggal', '$status')");

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

   <div class="mb-2 d-flex justify-content-end mt-2">
         <a href="export_excel.php" class="btn-sm btn-success mr-2"><i class="fas fa-plus mx-1 my-1">&nbsp Export to Excel</i></a>
      </div>

          <div class="card shadow mb-4" style="font-size:12px;">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead style="font-size:14px">
                    <tr>
                      <th>No</th>
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
                  <?php $no = 1;
                  foreach($query as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $row['instansi'] ?></td>
                      <td><?= $row['alamat'] ?></td>
                      <td><?= $row['jenis_kelamin'] ?></td>
                      <td><?= $row['no_hp'] ?></td>
                      <td><?= $row['tanggal'] ?></td>
                      <td width="10%">
                        <a href="hapus.php?id_daftar=<?= $row['id_daftar'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?');" class="btn btn-danger btn-sm align-items-center d-inline" title="Hapus"><i class="fas fa-trash" style="font-size:12px;"></i></a>
                        <a href="edit.php?id_daftar=<?= $row['id_daftar'] ?>" class="btn btn-success btn-sm align-items-center" title="Edit"><i class="fas fa-edit" style="font-size:12px;"></i></a>
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