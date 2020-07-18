<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";

  $halamane = $_GET['halamane'];
  $act    = $_GET['act'];

  // Input perbaikan
  if ($halamane=='perbaikan' AND $act=='input'){
    $id_perbaikan   = trim(htmlspecialchars($_POST['id_perbaikan']));
    $tgl_buat = trim(htmlspecialchars($_POST['tgl_buat']));
    //$id_user = trim(htmlspecialchars($_POST['id_user']));
    $id_mesin = trim(htmlspecialchars($_POST['id_mesin']));
    $judul = trim(htmlspecialchars($_POST['judul']));
    $keterangan = trim(htmlspecialchars($_POST['keterangan']));
    $quantity = trim(htmlspecialchars($_POST['quantity']));
    $time_start = trim(htmlspecialchars($_POST['time_start']));
    $time_finish = trim(htmlspecialchars($_POST['time_finish']));
    $id_vendor = trim(htmlspecialchars($_POST['id_vendor']));
    $id_sparepart = trim(htmlspecialchars($_POST['id_sparepart']));

    $input = "INSERT INTO perbaikan(id_perbaikan, id_mesin, id_user, tgl_buat, judul, keterangan, id_vendor, id_sparepart, quantity, time_finish, time_start) VALUES('$id_perbaikan', '$id_mesin', '$_SESSION[username]', '$tgl_buat', '$judul', '$keterangan', '$id_vendor', '$id_sparepart', '$quantity', '$time_finish', '$time_start')";
    mysqli_query($konek, $input);
    header("location:../../site.php?halamane=".$halamane);
  }

  // Update perbaikan
  elseif ($halamane=='perbaikan' AND $act=='update'){
    $id_perbaikan   = trim(htmlspecialchars($_POST['id_perbaikan']));
    $tgl_buat = trim(htmlspecialchars($_POST['tgl_buat']));
    //$id_user = trim(htmlspecialchars($_POST['id_user']));
    $id_mesin = trim(htmlspecialchars($_POST['id_mesin']));
    $judul = trim(htmlspecialchars($_POST['judul']));
    $keterangan = trim(htmlspecialchars($_POST['keterangan']));
    $quantity = trim(htmlspecialchars($_POST['quantity']));
    $time_start = trim(htmlspecialchars($_POST['time_start']));
    $time_finish = trim(htmlspecialchars($_POST['time_finish']));
    $id_vendor = trim(htmlspecialchars($_POST['id_vendor']));
    $id_sparepart = trim(htmlspecialchars($_POST['id_sparepart']));

    $update = "UPDATE perbaikan SET tgl_buat = '$tgl_buat',
    id_mesin = '$id_mesin',
    id_user = '$_SESSION[username]',
    judul = '$judul',
    keterangan = '$keterangan',
    quantity = '$quantity',
    time_finish = '$time_finish',
    time_start = '$time_start',
    id_vendor = '$id_vendor',
    id_sparepart = '$id_sparepart'
    WHERE id_perbaikan = '$id_perbaikan'";
    mysqli_query($konek, $update);
    header("location:../../site.php?halamane=".$halamane);
  }

   // hapus perbaikan
  elseif ($halamane=='perbaikan' AND $act=='hapus'){
    mysqli_query($konek, "DELETE FROM perbaikan WHERE id_perbaikan='$_GET[id]'"); 
    header("location:../../site.php?halamane=".$halamane);
  }
  //update status
  elseif ($halamane=='perbaikan' AND $act=='updatestatus') {
    mysqli_query($konek, "UPDATE perbaikan SET id_teknisi='$_SESSION[username]',status = '$_GET[s]' WHERE id_perbaikan ='$_GET[id]'");
    header("location:../../site.php?halamane=".$halamane);
  }
}
?>
