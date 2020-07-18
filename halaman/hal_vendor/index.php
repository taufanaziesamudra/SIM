<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "halaman/hal_vendor/aksi_vendor.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    // Tampil vendor
    default:
    require_once('view.php');
    break;
    
    case "tambahvendor":
    require_once('tambah.php');
    break;
    
    case "editvendor":
    require_once('ubah.php');
    break;  
  }
}    
?>
