<?php
session_start();
include "../../config/koneksi.php";
include "../../config/library.php";

// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{

  ?>
  <html>
  <head>
    <title> :: LAPORAN DATA PERBAIKAN</title>
    <link href="styles_cetak.css" rel="stylesheet" type="text/css">
    <style>
      @media print{
        .not-showing{
          display: none;
        }
      }
    </style>
  </head>
  <body>
    <center>
      <h2> LAPORAN DATA PERBAIKAN </h2>
      <p><?php echo"Range Date : $_POST[dari] s/d $_POST[sampai]";?></p>
    </center>
    <?php
    $q = "SELECT * FROM perbaikan a inner join user b using(id_user) inner join mesin c using(id_mesin) inner join sparepart d using(id_sparepart) inner join vendor e using(id_vendor)";
    if($_POST['dari'] !=='' && $_POST['sampai'] !==''){
      $q .= " WHERE tgl_buat BETWEEN  '$_POST[dari]' AND '$_POST[sampai]'";
    }
    $tampil = mysqli_query($konek, $q.' ORDER BY id_perbaikan');
    echo"<table class='table-list' width='100%' border='0' cellspacing='1' cellpadding='2'>
    <thead>
    <tr>
    <td bgcolor='#F5F5F5'>No</td>
    <td bgcolor='#F5F5F5'>ID perbaikan</td>
    <td bgcolor='#F5F5F5'>Tanggal</td>
    <td bgcolor='#F5F5F5'>Nama user</td>
    <td bgcolor='#F5F5F5'>Nama Mesin</td>
    <td bgcolor='#F5F5F5'>Judul</td>
    <td bgcolor='#F5F5F5'>Keterangan</td>
   <td bgcolor='#F5F5F5'>Vendor</td>
   <td bgcolor='#F5F5F5'>Sparepart</td>
   <td bgcolor='#F5F5F5'>Waktu</td>
   <td bgcolor='#F5F5F5'>Kuantiti</td>
    <td bgcolor='#F5F5F5'>Status</td>
    </tr>
    </thead>
    <tbody>"; 

    $no = 1;
    while ($r=mysqli_fetch_array($tampil)){
      echo "
      <tr>
      <td class='center'>$no</td>
      <td>$r[id_perbaikan]</td>
      <td>$r[tgl_buat]</td>
      <td>$r[nama_user]</td>
      <td>$r[nama_mesin]</td>
      <td>$r[judul]</td>
      <td>$r[keterangan]</td>
    <td>$r[nm_vendor]</td>
    <td>$r[nm_sparepart]</td>
    <td>$r[time_start] - $r[time_finish]</td>
    <td>$r[quantity]</td>
      <td>$r[status]</td>

      </tr>";
      $no++;
    }
    echo "</tbody>
    </table>";
    ?>
    <img class="not-showing" src="btn_print.png" width="20" onClick="javascript:window.print()" />
  </body>
  </html>
  <?php
  
}
?>