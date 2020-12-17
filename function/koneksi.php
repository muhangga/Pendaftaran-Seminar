<?php 

$koneksi = mysqli_connect("localhost", "root", "", "praktek_lapang");

if ($koneksi);
else {
    echo "Database tidak terhubung";
}

?>