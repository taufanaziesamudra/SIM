<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";
  include "../../config/db-fungsi.php";

  $halamane = $_GET['halamane'];
  $act    = $_GET['act'];

  // Input sparepart
  if ($halamane=='sparepart' AND $act=='input'){
    $id_sparepart   = trim(htmlspecialchars($_POST['id_sparepart']));
    $nama_sparepart = trim(htmlspecialchars($_POST['nama_sparepart']));
    $input = "INSERT INTO sparepart VALUES('$id_sparepart', '$nama_sparepart')";
    dbm_exec($input);
    header("location:../../site.php?halamane=".$halamane);
  }

  // Update sparepart
  elseif ($halamane=='sparepart' AND $act=='update'){
    $id_sparepart   = trim(htmlspecialchars($_POST['id_sparepart']));
    $nama_sparepart = trim(htmlspecialchars($_POST['nama_sparepart']));
    dbm_exec("UPDATE sparepart SET nm_sparepart = '$nama_sparepart' WHERE id_sparepart = '$id_sparepart'");
    header("location:../../site.php?halamane=".$halamane);
  }

  elseif ($halamane=='sparepart' AND $act=='hapus'){
    mysqli_query($konek, "DELETE FROM sparepart WHERE id_sparepart='$_GET[id]'"); 
    header("location:../../site.php?halamane=".$halamane);
  }
}
?>
