<?php $r = perbaikan($_GET["id"]) ?>
<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Form Ubah perbaikan</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form method="POST" action="<?=$aksi?>?halamane=perbaikan&act=update">
						<div>
							<label>Kode perbaikan</label>
							<div class="row">
								<div class="col-xs-8 col-sm-2">
									<div class="input-group">
										<input type="text" name="id_perbaikan" class="form-control" placeholder="ID perbaikan" required="required" value="<?=$_GET['id']?>" readonly="yes">
										<span class="input-group-addon">
											<i class="fa fa-key bigger-110"></i>
										</span>
									</div>
								</div>
							</div>
							<hr />
							
							<label for="id-date-picker-1">Tanggal perbaikan</label>
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<div class="input-group">
										<input class="form-control date-picker" id="id-date-picker-2" type="text" name="tgl_buat" data-date-format="yyyy-mm-dd" required="required" value="<?=$r->tgl_buat?>"/>
										<span class="input-group-addon">
											<i class="fa fa-calendar bigger-110"></i>
										</span>
									</div>
								</div>
							</div>
							<hr />
							
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<div class="form-group">
										<label for="form-field-select-3">Pilih divisi</label>
										<div>
											<select name="id_divisi" id="id_divisi" class="form-control">
												<?php
												$tampilX=mysqli_query($konek, "SELECT * FROM mesin WHERE id_mesin='$r->id_mesin'");
												$d=mysqli_fetch_array($tampilX);

												if ($d["id_divisi"]==0){
													echo "<option value='0' selected>- Pilih divisi -</option>";
												}   
												$query2 = "SELECT * FROM divisi ORDER BY nama_divisi";
												$tampil = mysqli_query($konek, $query2);
												while($w=mysqli_fetch_array($tampil)){
													if ($d["id_divisi"]==$w["id_divisi"]){
														echo "<option value='$w[id_divisi]' selected>$w[nama_divisi]</option>";
													}
													else{
														echo "<option value='$w[id_divisi]'>$w[nama_divisi]</option>";
													}
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<hr />
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<div class="form-group">
										<label for="form-field-select-3">Pilih Mesin</label>
										<div>
											<select name="id_mesin" id="id_mesin" class="form-control">
												<?php 
												if ($r->id_mesin==0){
													echo "<option value='0' selected>- Pilih mesin -</option>";
												}else{
													echo "<option value='0'>- Pilih mesin -</option>";
												}
												foreach (mesin() as $m) {
													if ($r->id_mesin == $m->id_mesin){
														echo '<option value="'.$m->id_mesin.'" selected>'.$m->nama_mesin.'</option>';
													}else{
														echo '<option value="'.$m->id_mesin.'">'.$m->nama_mesin.'</option>';
													}
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<hr />
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<div class="form-group">
										<label for="form-field-select-3">Pilih Sparepart</label>
										<div>
											<select name="id_sparepart" id="id_sparepart" class="form-control">
												<?php 
												foreach (spareparts() as $d) {
													?>
													<option value="<?=$d->id_sparepart?>" <?=$d->id_sparepart == $r->id_sparepart ? 'selected' : ''?>><?=$d->nm_sparepart?></option>
													<?php 
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<hr />
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<div class="form-group">
										<label for="form-field-select-3">Pilih Vendor</label>
										<div>
											<select name="id_vendor" id="id_vendor" class="form-control">
												<?php 
												foreach (vendors() as $d) {
													?>
													<option value="<?=$d->id_vendor?>" <?=$d->id_vendor == $r->id_vendor ? 'selected' : ''?>><?=$d->nm_vendor?></option>
													<?php 
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<hr />
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-3">
									<label for="id-date-picker-1">Waktu mulai</label>
									<div class="input-group">
										<input value="<?=$r->time_start?>" class="form-control timepicker" type="text" name="time_start" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-3">
									<label for="id-date-picker-1">Waktu berakhir</label>
									<div class="input-group">
										<input value="<?=$r->time_finish?>" class="form-control timepicker" type="text" name="time_finish" required="required">
									</div>
								</div>
								<div class="col-xs-8 col-sm-6">
									<label for="id-date-picker-1">Kuantiti</label>
									<div class="input-group">
										<input class="form-control" id="id-date-picker-2" type="text" value="<?=$r->quantity?>" name="quantity"  required="required"/>
									</div>
								</div>
							</div>
							<hr>
							<label for="id-date-picker-1">Judul</label>
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<input class="form-control" type="text" name="judul" required="required" value="<?=$r->judul?>"/>
								</div>
							</div>
							<hr />



							<label for="id-date-picker-1">Keterangan</label>
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<input class="form-control" type="text" name="keterangan" required="required" value="<?=$r->keterangan?>"/>
								</div>
							</div>


							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-info" type="submit">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Submit
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset" onclick="self.history.back()">
										<i class="ace-icon fa fa-undo bigger-110"></i>
										Reset
									</button>
								</div>
							</div>
						</div>
					</form>


				</div>
			</div>
		</div>
	</div><!-- /.span -->
</div>