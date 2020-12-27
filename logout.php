<?php 

session_start();

if ($_SESSION['akses'] === "admin") {
   header("location: login.php?pesan=logout");
} else {
   header("location: login_user.php?pesan=logout");
}

session_unset();
session_destroy();

