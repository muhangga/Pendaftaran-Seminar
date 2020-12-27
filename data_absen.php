<?php 
   $title['judul'] = "Data Pendaftar"; 
   include("component/sidebar.php");
   include("function/koneksi.php");

   if (!isset($_SESSION['id_user'])) {
      header("location: login.php?pesan=belum_login");
   }
?>

<div class="container-fluid">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h4 mb-0 text-gray-800">Data Absesn</h1>
   </div>
<!-- 
   <div class="mb-2 d-flex justify-content-end mt-5">
         <a href="export_excel.php" class="btn-sm btn-success mr-2"><i class="fas fa-plus mx-1 my-1">&nbsp Export to Excel</i></a>
      </div> -->

          <div class="card shadow mb-4" style="font-size:12px;">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead style="font-size:14px">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Instansi</th>
                      <th>Konfirmasi</th>
                    </tr>
                  </thead>

               <?php 
               $no = 1;
               $query = mysqli_query($koneksi, "SELECT * FROM tbl_sertifikat"); ?>

                <tbody style="font-size:13px">
                  <?php foreach($query as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['instansi'] ?></td>
                      <td width="10%">
                        <a href="sertifikat.php?id_sertifikat=<?= $row['id_sertifikat'] ?>" class="btn btn-info btn-sm align-items-center" title="Cetak Sertifikat <?= $row['nama'] ?>" target="_blank"><i class="fas fa-file-import" style="font-size:12px;"></i></a>
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