 <?php
 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=data_pendaftar" . date('Y-m-d') . ".xls");
 
    include("function/koneksi.php");
 
    $result = mysqli_query($koneksi, "SELECT * FROM tbl_daftar");

               echo "<table border='1'>";
               echo "<tr>";
               echo "<th>Email</th>";
               echo "<th>Nama</th>";
               echo "<th>Asal Instansi</th>";
               echo "<th>Jenis Kelamin</th>";
               echo "<th>No Telepon</th>";
               echo "<th>Tanggal</th>";
               echo "</tr>";
            if ($result->num_rows > 0) {
               while ($row = $result->fetch_array()) {
                  echo "<tr>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['nama'] . "</td>";
                  echo "<td>" . $row['instansi'] . "</td>";
                  echo "<td>" . $row['jenis_kelamin'] . "</td>";
                  echo "<td>" . $row['no_hp'] . "</td>";
                  echo "<td>" . $row['tanggal'] . "</td>";
                  echo "</tr>";
               }
            echo "</table>";
        } else {
            echo "Data Pendaftar tidak tersedia.";
        }


