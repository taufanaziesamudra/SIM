<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header">
				<h4 class="widget-title">Form Tambah jadwal</h4>
				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="widget-body">
				<div class="widget-main">
					<form method="POST" action="<?=$aksi?>?halamane=jadwal&act=input">
						<div>
							<label>Kode Jadwal</label>
							<div class="row">
								<div class="col-xs-8 col-sm-2">
									<div class="input-group">
										<input type="text" name="id_jadwal" class="form-control" placeholder="ID jadwal" required="required" value="<?=getKode("perawatan", "BSI-SC");?>" readonly="yes">
										<span class="input-group-addon">
											<i class="fa fa-key bigger-110"></i>
										</span>
									</div>
								</div>
							</div>
							<hr />
							<label for="id-date-picker-1">Tanggal Jadwal</label>
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<div class="input-group">
										<input class="form-control date-picker" id="id-date-picker-2" type="text" name="tgl" data-date-format="yyyy-mm-dd" required="required"/>
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
										<label for="form-field-select-3">Pilih Divisi</label>
										<div>
											<select name="id_divisi" id="id_divisi" class="form-control">
												<option value="0" selected>- Pilih Divisi -</option>
												<?php 
												foreach (divisi() as $d) {
													?>
													<option value="<?=$d->id_divisi?>"><?=$d->nama_divisi?></option>
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
										<label for="form-field-select-3">Pilih Mesin</label>
										<div>
											<select name="id_mesin" id="id_mesin" class="form-control">
												<option value="0" selected>- Pilih mesin -</option>";
												<?php 
												foreach (mesin() as $d) {
													?>
													<option value="<?=$d->id_mesin?>"><?=$d->nama_mesin?></option>
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
										<label for="form-field-select-3">Pilih Sparepart</label>
										<div>
											<select name="id_sparepart" id="id_sparepart" class="form-control">
												<option value="0" selected>- Pilih Sparepart -</option>
												<?php 
												foreach (spareparts() as $d) {
													?>
													<option value="<?=$d->id_sparepart?>"><?=$d->nm_sparepart?></option>
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
												<option value="0" selected>- Pilih Vendor -</option>
												<?php 
												foreach (vendors() as $d) {
													?>
													<option value="<?=$d->id_vendor?>"><?=$d->nm_vendor?></option>
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
										<input class="form-control timepicker" type="text" name="time_start" required="required">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-3">
									<label for="id-date-picker-1">Waktu berakhir</label>
									<div class="input-group">
										<input class="form-control timepicker" type="text" name="time_finish" required="required">
									</div>
								</div>
								<div class="col-xs-8 col-sm-6">
									<label for="id-date-picker-1">Kuantiti</label>
									<div class="input-group">
										<input class="form-control" id="id-date-picker-2" type="text" value="0" name="quantity"  required="required"/>
									</div>
								</div>
							</div>
							<hr />
							<label for="id-date-picker-1">Point Check</label>
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<div class="input-group">
										<div class="radio">
											<label>
												<input name="point_chek" type="radio" class="ace" value="Filter Oil"/>
												<span class="lbl"> Filter Oil</span>
											</label>
										</div>
										<div class="radio">
											<label>
												<input name="point_chek" type="radio" class="ace" value="Filter Pelumas"/>
												<span class="lbl"> Filter Pelumas</span>
											</label>
										</div>
										<div class="radio">
											<label>
												<input name="point_chek" type="radio" class="ace" value="Oil Coller"/>
												<span class="lbl"> Oil Coller</span>
											</label>
										</div>
										<div class="radio">
											<label>
												<input name="point_chek" type="radio" class="ace" value="Pembersih Stainer"/>
												<span class="lbl"> Pembersih Stainer</span>
											</label>
										</div>
									</div>
								</div>
							</div>
							<label for="id-date-picker-1">Tanggal Jadwal</label>
							<div class="row">
								<div class="col-xs-8 col-sm-6">
									<div class="input-group">
										<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="tgl_jadwal" required="required"/>
										<span class="input-group-addon">
											<i class="fa fa-calendar bigger-110"></i>
										</span>
									</div>
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
