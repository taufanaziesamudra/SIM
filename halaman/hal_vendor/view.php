<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
			<a class="btn btn-white btn-info btn-bold" href="?halamane=vendor&act=tambahvendor">
				<i class="ace-icon glyphicon glyphicon-plus"></i>
				Tambah Vendor
			</a>
		</div>
		<br/>
		<div class="table-header">
			Tabel Vendor View
		</div>
		<div>
			<table id="dynamic-table1" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">No</th>
						<th>ID Vendor</th>
						<th>Nama Vendor</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach (vendors() as $r) {
						?>
						<tr>
							<td class="center"><?=$no?></td>
							<td><?=$r->id_vendor?></td>
							<td><?=$r->nm_vendor?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="green" href="?halamane=vendor&act=editvendor&id=<?=$r->id_vendor?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>
									<a class="red" href="<?=$aksi?>?halamane=vendor&act=hapus&id=<?=$r->id_vendor?>">
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
												<a href="?halamane=vendor&act=editvendor&id=<?=$r->id_vendor?>" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
														<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
												</a>
											</li>
											<li>
												<a href="<?=$aksi?>?halamane=vendor&act=hapus&id=<?=$r->id_vendor?>" class="tooltip-error" data-rel="tooltip" title="Delete">
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