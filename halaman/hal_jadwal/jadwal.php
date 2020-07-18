<script type="text/javascript" src="halaman/hal_perbaikan/jquery.js"></script>
<script language="javascript">
  $(document).ready(function() {
    $('#id_divisi').change(function() { 
      var category = $(this).val();
      $.ajax({
        type: 'GET',
        url: 'halaman/hal_perbaikan/select-for-ajax.php',
      data: 'KoDe_TIPE=' + category, // Untuk data di MySQL dengan menggunakan kata kunci tsb
      dataType: 'html',
      beforeSend: function() {
        $('#id_mesin').html('<tr><td colspan=2>Loading ....</td></tr>');  
      },
      success: function(response) {
        $('#id_mesin').html(response);
      }
    });
    });
  });

</script>
<?php
// Apabila jadwal belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila jadwal sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "halaman/hal_jadwal/aksi_jadwal.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    // Tampil jadwal
    default:
    require_once('view.php');
    break;
    case "tambahjadwal":
    require_once('tambah.php');
    break;
    case "editjadwal":
    require_once('edit.php');
    break;  
    case 'detail' : 
    require_once('detail.php');
    break;
  }
}    
?>
