<div class="row">
  <div class="col-xs-12">
    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
      <button class="btn btn-white btn-info btn-bold" onclick="window.location.href='?halamane=perbaikan&act=tambahperbaikan'">
        <i class="ace-icon glyphicon glyphicon-plus"></i>
      Tambah perbaikan</button>
    </div>
    <br/>
    <div class="table-header">
      Tabel perbaikan View
    </div>
    <div>
      <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="center">No</th>
            <th>ID perbaikan</th>
            <th>Tanggal</th>
            <th>Nama user</th>
            <th>Nama Mesin</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>Kuantiti</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach (perbaikan() as $r) {
            ?>
            <tr>
              <td class="center"><?=$no?></td>
              <td><?=$r->id_perbaikan?></td>
              <td><?=$r->tgl_buat?></td>
              <td><?=$r->nama_user?></td>
              <td><?=$r->nama_mesin?></td>
              <td><?=$r->judul?></td>
              <td><?=$r->keterangan?></td>
              <td><?=$r->quantity?></td>
              <td>
                <?php
                if ($r->status=="Open"){
                  ?>
                  <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-xs btn-danger dropdown-toggle">
                      Open
                      <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-danger">
                      <li><a href="<?=$aksi?>?halamane=perbaikan&act=updatestatus&id=<?=$r->id_perbaikan?>&s=Waiting">Waiting</a></li>
                      <li><a href="<?=$aksi?>?halamane=perbaikan&act=updatestatus&id=<?=$r->id_perbaikan?>&s=Closed">Closed</a></li>
                    </ul>
                  </div>
                  <?php
                }
                elseif ($r->status=="Waiting"){
                  ?>
                  <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-xs btn-warning dropdown-toggle">
                      Waiting
                      <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-warning">
                      <li><a href="<?=$aksi?>?halamane=perbaikan&act=updatestatus&id=<?=$r->id_perbaikan?>&s=Open">Open</a></li>
                      <li><a href="<?=$aksi?>?halamane=perbaikan&act=updatestatus&id=<?=$r->id_perbaikan?>&s=Closed">Closed</a></li>
                    </ul>
                  </div>
                  <?php
                }
                elseif ($r->status=="Closed"){
                  ?>
                  <span class="label label-danger">
                    Closed
                  </span>
                  <?php
                }            
                ?>
              </td>
              <td>
                <div class="hidden-sm hidden-xs action-buttons">
                  <a class="green" href="?halamane=perbaikan&act=editperbaikan&id=<?=$r->id_perbaikan?>">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                  </a>
                  <a class="red" href="<?=$aksi?>?halamane=perbaikan&act=hapus&id=<?=$r->id_perbaikan?>">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                  </a>
                  <a class="blue" href="?halamane=perbaikan&act=detail&id=<?=$r->id_perbaikan?>">
                    <i class="ace-icon fa fa-eye bigger-130"></i>
                  </a>
                </div>
                <div class="hidden-md hidden-lg">
                  <div class="inline pos-rel">
                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                      <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                      <li>
                        <a href="?halamane=perbaikan&act=editperbaikan&id=<?=$r->id_perbaikan?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                          <span class="green">
                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="<?=$aksi?>?halamane=perbaikan&act=hapus&id=<?=$r->id_perbaikan?>" class="tooltip-error" data-rel="tooltip" title="Delete">
                          <span class="red">
                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                          </span>
                        </a>
                      </li>
                      <li>
                        <span class="blue">
                          <a href="?halamane=perbaikan&act=detail&id=<?=$r->id_perbaikan?>" class="tooltip-primary" data-rel="tooltip" title="Detail">
                            <i class="ace-icon fa fa-eye bigger-120"></i>
                          </a>    
                        </span>
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