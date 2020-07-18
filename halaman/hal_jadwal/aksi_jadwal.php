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

  // Input jadwal
  if ($halamane=='jadwal' AND $act=='input'){
    $id_jadwal   = trim(htmlspecialchars($_POST['id_jadwal']));
    $tgl = trim(htmlspecialchars($_POST['tgl']));
    $id_divisi = trim(htmlspecialchars($_POST['id_divisi']));
    $id_mesin = trim(htmlspecialchars($_POST['id_mesin']));
    $point_chek = trim(htmlspecialchars($_POST['point_chek']));
    $tgl_jadwal = trim(htmlspecialchars($_POST['tgl_jadwal']));
    $quantity = trim(htmlspecialchars($_POST['quantity']));
    $time_start = trim(htmlspecialchars($_POST['time_start']));
    $time_finish = trim(htmlspecialchars($_POST['time_finish']));
    $id_vendor = trim(htmlspecialchars($_POST['id_vendor']));
    $id_sparepart = trim(htmlspecialchars($_POST['id_sparepart']));

    $input = "INSERT INTO perawatan(id_jadwal, tgl, id_divisi, id_mesin, point_chek, tgl_jadwal, id_vendor, id_sparepart, quantity, time_finish, time_start) VALUES('$id_jadwal', '$tgl', '$id_divisi', '$id_mesin', '$point_chek', '$tgl_jadwal', '$id_vendor', '$id_sparepart', '$quantity', '$time_finish', '$time_start')";
    mysqli_query($konek, $input);
    header("location:../../site.php?halamane=".$halamane);
  }

  // Update jadwal
  elseif ($halamane=='jadwal' AND $act=='update'){
    $id_jadwal   = trim(htmlspecialchars($_POST['id_jadwal']));
    $tgl = trim(htmlspecialchars($_POST['tgl']));
    $id_divisi = trim(htmlspecialchars($_POST['id_divisi']));
    $id_mesin = trim(htmlspecialchars($_POST['id_mesin']));
    $point_chek = trim(htmlspecialchars($_POST['point_chek']));
    $tgl_jadwal = trim(htmlspecialchars($_POST['tgl_jadwal']));
    $quantity = trim(htmlspecialchars($_POST['quantity']));
    $time_start = trim(htmlspecialchars($_POST['time_start']));
    $time_finish = trim(htmlspecialchars($_POST['time_finish']));
    $id_vendor = trim(htmlspecialchars($_POST['id_vendor']));
    $id_sparepart = trim(htmlspecialchars($_POST['id_sparepart']));

    $update = "UPDATE perawatan SET tgl = '$tgl',
    id_divisi = '$id_divisi',
    id_mesin = '$id_mesin',
    point_chek = '$point_chek',
    tgl_jadwal = '$tgl_jadwal',
    quantity = '$quantity',
    time_finish = '$time_finish',
    time_start = '$time_start',
    id_vendor = '$id_vendor',
    id_sparepart = '$id_sparepart'
    WHERE id_jadwal = '$id_jadwal'";
    mysqli_query($konek, $update);
    header("location:../../site.php?halamane=".$halamane);
  }

   // hapus jadwal
  elseif ($halamane=='jadwal' AND $act=='hapus'){
    mysqli_query($konek, "DELETE FROM perawatan WHERE id_jadwal='$_GET[id]'"); 
    header("location:../../site.php?halamane=".$halamane);
  }

   //update status
  elseif ($halamane=='jadwal' AND $act=='updatestatus') {
    mysqli_query($konek, "UPDATE perawatan SET id_teknisi='$_SESSION[username]', status = '$_GET[s]' WHERE id_jadwal ='$_GET[id]'");
    header("location:../../site.php?halamane=".$halamane);
  }
}
?>
