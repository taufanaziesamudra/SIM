<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{

?>

               <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                 <div class="row">
				 <div class="width-30 label label-info label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
															
															<span class="white">             <script language=JavaScript>var d = new Date();
            var h = d.getHours();
            if (h < 11) { document.write('Selamat pagi, <?php echo $_SESSION['namauser']; ?>...'); }
            else { if (h < 15) { document.write('Selamat siang, <?php echo $_SESSION['namauser']; ?>...'); }
            else { if (h < 19) { document.write('Selamat sore, <?php echo $_SESSION['namauser']; ?>...'); }
            else { if (h <= 23) { document.write('Selamat malam, <?php echo $_SESSION['namauser']; ?>...'); }
            }}}</script></span>
														</a>

														
													</div>
												</div>
                  <div class="space-6"></div>
				<?php
				$user=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM user"));
				$user1=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM user WHERE level='admin'"));
				$user2=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM user WHERE level='teknisi'"));
				$mesin=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM mesin"));
				$divisi=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM divisi"));
				$perbaikan=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM perbaikan"));
				$perawatan=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM perawatan"));
				?>
                  <div class="col-sm-12 infobox-container">
                    <div class="infobox infobox-green">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-users"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php echo"$user";?></span>
                        <div class="infobox-content"><?php echo"$user1 Admin";?> + <?php echo"$user2 Teknisi";?></div>
                      </div>

                    </div>

                    <div class="infobox infobox-blue">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-cogs"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php echo"$mesin";?></span>
                        <div class="infobox-content">Data Mesin</div>
                      </div>

                    </div>

                    <div class="infobox infobox-pink">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-exchange"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php echo"$divisi";?></span>
                        <div class="infobox-content">Data Divisi</div>
                      </div>
                    </div>

                    <div class="infobox infobox-red">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-gavel"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php echo"$perbaikan";?></span>
                        <div class="infobox-content">Transaksi Perbaikan</div>
                      </div>
                    </div>
					
					 <div class="infobox infobox-orange2">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-check-square-o"></i>
                      </div>

                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php echo"$perawatan";?></span>
                        <div class="infobox-content">Transaksi Perawatan</div>
                      </div>
                    </div>

                   

                  </div>

                 
                </div><!-- /.row -->

                <div class="hr hr32 hr-dotted"></div>
<div class="row">
									<div class="col-sm-12">
										<h3 class="row header smaller lighter blue">
											<span class="col-xs-6">  <!-- Jam Digital -->
                                 <div id="clockDisplay" class="clockStyle"></div>
<script type="text/javascript" language="javascript">
function renderTime(){
 var currentTime = new Date();
 var h = currentTime.getHours();
 var m = currentTime.getMinutes();
 var s = currentTime.getSeconds();
 if (h == 0){
  h = 24;
   }
   if (h < 10){
    h = "0" + h;
    }
    if (m < 10){
    m = "0" + m;
    }
    if (s < 10){
    s = "0" + s;
    }
 var myClock = document.getElementById('clockDisplay');
 myClock.textContent = h + ":" + m + ":" + s + "";    
 setTimeout ('renderTime()',1000);
 }
 renderTime();
</script>
                                  <!-- Jam Digital --> </span><!-- /.col -->
										</h3>

										<div id="accordion" class="accordion-style1 panel-group">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
															<i class="ace-icon fa fa-angle-down bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;Introduction
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse in" id="collapseOne">
													<div class="panel-body">
													<p>Teknik Perawatan Mesin Industri adalah sesuatu system kegiatan untuk menjaga, memelihara, mempertahankan, mengembangkan dan memaksimalkan daya guna dari segala sarana yang ada di dalam suatu bengkel atau industri sehingga modal/investasi yang ditanam dapat berhasil guna dan berdaya guna tinggi secara ekonomis.	
													<br/></p>
													<p>Tugas utama perawatan adalah untuk melakukan pemeliharaan , perbaikan dari alat-alat, peralatan, mesin dan perlengkapanya serta semua unit yang berhubungan dengan proses produksi atau kegiatan dengan penggunaan  sarana prasarana tersebut
													</p></div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
															<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;About Application
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapseTwo">
													<div class="panel-body">
														 Sistem Informasi Manajemen (SIM) yang menerapkan teknologi informasi sebagai alat bantu mengelola data dan informasi kondisi mesin-mesin yang ada. Sistem Informasi Preventive Maintenance (SIPM) menggabungkan teori preventive maintenance dan sistem database. Proses perancangan software menggunakan metode System Development Life Cycle (SDLC) yang meliputi: plan, analyze, design, implement dan test. SIPM dapat mengelola data dan informasi tentang: mesin, kondisi mesin, teknisi, spare part dan jadwal perawatan dengan mudah, cepat, akurat dan relevan.
														 </div>
												</div>
											</div>

											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
															<i class="ace-icon fa fa-angle-right bigger-110" data-icon-hide="ace-icon fa fa-angle-down" data-icon-show="ace-icon fa fa-angle-right"></i>
															&nbsp;Pricing Application
														</a>
													</h4>
												</div>

												<div class="panel-collapse collapse" id="collapseThree">
													<div class="panel-body">
														We believe you should only have to pay for what you need. For this reason, The Survey System is sold in three editions and a series of optional modules. See the product information pages for detailed descriptions.
														</div>
												</div>
											</div>
										</div>
									</div><!-- /.col -->
								</div><!-- /.row -->
                
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
            

<?php
  
}
?>
