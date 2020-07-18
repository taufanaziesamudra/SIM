<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
			<a class="btn btn-white btn-info btn-bold" href="?halamane=sparepart&act=tambahsparepart">
				<i class="ace-icon glyphicon glyphicon-plus"></i>
				Tambah Sparepart
			</a>
		</div>
		<br/>
		<div class="table-header">
			Tabel Sparepart View
		</div>
		<div>
			<table id="dynamic-table1" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">No</th>
						<th>ID Sparepart</th>
						<th>Nama Sparepart</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach (spareparts() as $r) {
						?>
						<tr>
							<td class="center"><?=$no?></td>
							<td><?=$r->id_sparepart?></td>
							<td><?=$r->nm_sparepart?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="?halamane=sparepart&act=editsparepart&id=<?=$r->id_sparepart?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>
									<a class="red" href="<?=$aksi?>?halamane=sparepart&act=hapus&id=<?=$r->id_sparepart?>">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline pos-rel">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="?halamane=sparepart&act=editsparepart&id=<?=$r->id_sparepart?>" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
														<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
												</a>
											</li>
											<li>
												<a href="<?=$aksi?>?halamane=sparepart&act=hapus&id=<?=$r->id_sparepart?>" class="tooltip-error" data-rel="tooltip" title="Delete">
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
						<?php 
						$no++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>